<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json(Blog::all());
        }
        $blogs = Blog::paginate(24);
        return view('admin.blogs.grid', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'nullable|string|unique:blogs,slug',
                'content' => 'required|string',
            ]);

            $validated['author'] = auth()->guard('admin')->user()->name;
            $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);

            // Handle thumbnail upload
            if ($request->hasFile('thumbnail')) {

                $path = pathinfo($validated['slug'] . Str::random(6), PATHINFO_FILENAME) . '.webp';
                $thumb = "blogs/thumbnails/$path";
                $content = Image::make($request->file('thumbnail'))->encode('webp', 40);
                Storage::disk('public')->put($thumb, $content);
                $validated['thumbnail'] = "storage/$thumb";
            }

            // Handle gallery
            if ($request->hasFile('gallery')) {

                $galleryPaths = [];
                foreach ($request->file('gallery') as $index => $image) {

                    $ogPath = pathinfo(Str::random(6) . $validated['slug'], PATHINFO_FILENAME) . '.webp';
                    $mediumPath = "blogs/original/$ogPath";
                    $medium = Image::make($image)->encode('webp', 80);
                    Storage::disk('public')->put($mediumPath, $medium);
                    $galleryPaths[] = "storage/$mediumPath";
                }

                $validated['gallery'] = $galleryPaths;
            }

            // Tags (convert to JSON array)
            if ($request->filled('tags')) {
                $tags = array_map('trim', explode(',', $request->tags));
                $validated['tags'] = json_encode($tags);
            }
            $validated['published_at'] = $request->published_at ?? now();
            dd($validated);
            Blog::create($validated);

            if ($request->expectsJson()) {
                return response()->json(['status' => true, 'message' => "Blog successfully created!"]);
            }
            return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
        } catch (\Exception $e) {

            dd($e->getMessage());
            return redirect()->back()->withInput()->with('error',  "Failed to add blog: " . $e->getMessage());
        }
    }
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function view(Request $req, Blog $blog)
    {
        if ($req->expectsJson()) {
            return response()->json($blog);
        }
        return view('admin.blogs.detail', compact('blog'));
    }
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'nullable|string',
            'date_time' => 'required|date',
            'party_size' => 'required|integer|min:1',
            'table_id' => 'required|exists:tables,id',
        ]);

        $blog->update($request->all());

        return redirect()->route('admin.blogs.index')->with('success', 'Booking updated successfully!');
    }

    public function show(Blog $blog)
    {
        return view('admin.blogs.detail', compact('blog'));
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
    }
}
