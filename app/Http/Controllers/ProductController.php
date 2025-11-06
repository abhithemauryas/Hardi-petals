<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Notifications\ReviewAdded;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products =new Product;
        if($request->category){
            $products = $products->whereIn('category', $request->category);
        }
        if($request->price) {
            $products = $products->whereBetween('price', explode('-', $request->price));
        }
        $products = $products->orderBy('id', "DESC")->paginate(12);
        return view('admin.general.products.grid', compact('products'));
    }

    public function products(){
        return ProductResource::collection(Product::orderBy('updated_at', 'DESC')->get());
    }

    public function new(Request $request) {
        return ProductResource::collection(Product::where('created_at','>=', Carbon::now()->subDays(15))
        ->limit(15)
        ->get());
    }
    public function trending(Request $request){
        $products = new Product();
        if($request->category) {
            $products = $products->where('category', $request->category);
        }
        return ProductResource::collection($products->orderBy('ordered','desc')->get());
    }

    public function product(Product $product) {
        return new ProductResource($product->with('reviews')->first());
    }

    public function edit(Product $product) {
        return view('admin.general.products.edit', compact('product'));
    }

    public function store(Request $request)
    {
        $lastID = Product::latest()->first()?->id;
        $product = new Product();
        $product->name = $request->name;
        $product->category = $request->product_category;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount??0;
        $product->isStocked = $request->status ?? 1;
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $fileName = pathinfo(Str::random(6).$index, PATHINFO_FILENAME) . '.webp';

                $originalPath = "products/original/$lastID/$fileName";
                $mediumPath = "products/medium/$lastID/$fileName";
                $thumbnailPath = "products/thumbnails/$lastID/$fileName";

                // Convert and save images in WebP format
                Storage::disk('public')->put($originalPath, Image::make($image)->encode('webp', 90)); // Original quality

                $medium = Image::make($image)->resize(237, 370)->encode('webp', 80);
                Storage::disk('public')->put($mediumPath, $medium);

                $thumbnail = Image::make($image)->encode('webp', 70);
                Storage::disk('public')->put($thumbnailPath, $thumbnail);

                // $path = $image->store('products', 'public');
                $images[] = json_encode([
                    'original' => asset("storage/$originalPath"),
                    'medium' => asset("storage/$mediumPath"),
                    'thumbnail' => asset("storage/$thumbnailPath"),
                ]);
            }
            $product->imageGallery = $images;
        }
        $product->imageGallery = $images;

        $product->save();
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');

    }

    public function remove(Product $product)
    {
        try {
            if($product->delete()){
                return back()->with('success', 'Product removed successfully!');
            } else {
                return back()->with('error','Something went wrong!');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->isStocked = $request->status ?? 1;
        $product->isNew = $product->created_at > Carbon::now()->subDays(30);
        $product->filteritems = $request->filteritems ?? $product->filteritems; // Keep old value if not provided
        $images = $product->imageGallery??[];
        if($request->deleted) {
            $deleteImages = array_filter(explode(',', $request->deleted),fn($i)=> $i!=='');
            foreach ($deleteImages as $index) {
                $thisImg = $images[$index];
                foreach(array_values((array)json_decode($thisImg)) as $img) {
                    $img = explode('storage/',$img)[1];
                    Storage::disk('public')->delete($img);
                }
                unset($images[$index]);
            }
            $images = array_values($images); // preserve keys
            $product->imageGallery = $images;
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $fileName = pathinfo(Str::random(6).$index, PATHINFO_FILENAME) . '.webp';

                $originalPath = "products/original/{$product->id}/$fileName";
                $mediumPath = "products/medium/{$product->id}/$fileName";
                $thumbnailPath = "products/thumbnails/{$product->id}/$fileName";

                // Convert and save images in WebP format
                Storage::disk('public')->put($originalPath, Image::make($image)->encode('webp', 90)); // Original quality

                $medium = Image::make($image)->resize(600, 600)->encode('webp', 80);
                Storage::disk('public')->put($mediumPath, $medium);

                $thumbnail = Image::make($image)->resize(150, 100)->encode('webp', 70);
                Storage::disk('public')->put($thumbnailPath, $thumbnail);

                $images[] = json_encode([
                    'original' => asset("storage/$originalPath"),
                    'medium' => asset("storage/$mediumPath"),
                    'thumbnail' => asset("storage/$thumbnailPath"),
                ]);
            }
            $product->imageGallery = $images;
        }
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function addReview(Request $request, Product $product)
    {
        try
        {
            $review = Review::where('info','like',"%$request->email%")->where('product_id', $product->id);
            if(!$review->exists()) {
                $review = $review->create([
                    'info' => [
                        'name' => $request->name,
                        'email' => $request->email
                    ],
                    'content' => $request->content,
                    'rating' => $request->rating,
                    'product_id' => $product->id
                ]);
                $subject = "{$request->name} rated {$request->rating}-star for product {$product->name}.";
                $body = "{$request->name} added a review of rating {$request->rating}-star for product {$product->name}.".PHP_EOL."Says \"{$request->content}\".";

                Notification::route('mail', env('ADMIN_EMAIL'))
                ->notify(new ReviewAdded($subject,$body));

            } else {
                return [
                    'status' => false,
                    'message' => "You have already added review for this product!",
                    'reviews' => null
                ];
            }
            return ['status' => true, 'message' => "Review added successfully!", 'reviews' => Review::where('product_id', $product->id)->get() ];

        } catch (\Throwable $th) {
            logger("Exception while adding a product-review: ".$th->getMessage());
            return response()->json(['status' => false, 'message' => 'Something went wrong!', 'review'=> null ]);
        }
    }

    // update the sequence of photos stored in imageGallery
    public function updateSequence(Request $request, Product $product)
    {
        $reordered = array_map(fn($i) => $product->imageGallery[$i], json_decode($request->gallery));
        $product->imageGallery = $reordered;
        $product->save();

        return [
            'status'  => true,
            'message' => "Image gallery updated!",
            'gallery' => json_decode($request->gallery),
            'product' => $product->imageGallery,
            'reordered' => $reordered
        ];
    }

    public function productBySlug($category,$slug){

        $catSlug= str_replace("-", " ", $category);
        $name= str_replace("-", " ", $slug);

        $product = Product::where('category', $catSlug)
        ->where('name', $name)
        ->with('reviews')
        ->first();

        return [
            'status' => $product? true: false,
            'message' => $product? "Found": "Not found",
            'product' => new ProductResource($product)
        ];
    }
    public function bySlug($slug)
    {

        $name = str_replace("-", " ", $slug);
        $product = Product::where('name', $name)
        ->with('reviews')
        ->first();

        return [
            'status' => $product? true: false,
            'message' => $product? "Found": "Not found",
            'product' => new ProductResource($product)
        ];

    }

    public function wishlist(Request $request)
    {
        $wishlist = Wishlist::where('user_id', $request->user()->id)->get(['product'])->pluck('product');
        $products = ProductResource::collection(Product::whereIn('id', $wishlist->toArray())->get());
        return response()->json(['items' => $products]);
    }

    public function clearWishlist(Request $request)
    {
        Wishlist::where('user_id', $request->user()->id)->delete();
        return response()->json(['status'=> true, 'items'=> []]);
    }


    public function addToWishlist(Request $request, Product $product){

        $added = Wishlist::updateOrCreate(
            ['product' => $product->id, 'user_id' => $request->user()->id ],
            ['user_id' => $request->user()->id ]
        );
        return response()->json([ "status" => true, 'Added' => $added ]);


    }
public function publicProducts()
{
    $products = \App\Models\Product::paginate(8);
    return view('shop-grid', compact('products'));
}

public function show($id)
{
    $product = Product::findOrFail($id);

    $newArrivals = Product::where('id', '!=', $id)
        ->orderBy('created_at', 'DESC')
        ->take(3)
        ->get();

    return view('03_product', compact('product', 'newArrivals'));
}
public function sort(Request $request)
{
    $order = $request->order;

    $query = Product::query();

    switch ($order) {
        case 'latest':
            $query->orderBy('created_at', 'DESC');
            break;

        case 'price_low_high':
            $query->orderBy('price', 'ASC');
            break;

        case 'price_high_low':
            $query->orderBy('price', 'DESC');
            break;

        case 'rating':
            $query->orderBy('rating', 'DESC'); // if rating exists
            break;

        default:
            $query->orderBy('created_at', 'ASC');
    }

    $products = $query->get();

    return view('partials.product-card', compact('products'))->render();
}




}

