@extends('admin.layouts.vertical', ['title' => 'Products'])

@section('css')
@vite(['node_modules/nouislider/dist/nouislider.min.css'])
@endsection

@section('content')
<?php
  $prods = new App\Models\Product();
?>
<style>
    .img-fluid {
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        object-fit: cover;
        width:100%;
        max-height: 320px;
    }
</style>
<div class="row">
    <div class="col-lg-3">
        <div class="card bg-light-subtle">
            <div class="card-header border-0">
                <div class="search-bar me-3 mb-1">
                    <span><i class="bx bx-search-alt"></i></span>
                    <input type="search" class="form-control" id="search" placeholder="Search ..." onkeyup="search(this)">
                </div>
            </div>
        </div>
        <div class="card">
            <form action="{{ route('admin.products.index') }}">
            <div class="card-body border-light">
                <a href="#" class="btn-link d-flex align-items-center text-dark bg-light p-2 rounded fw-medium fs-16 mb-0" data-bs-toggle="collapse" data-bs-target="#categories" aria-expanded="false" aria-controls="other">Categories
                    <i class='bx bx-chevron-down ms-auto fs-20'></i>
                </a>
                <div id="categories" class="collapse show">
                    <div class="categories-list d-flex flex-column gap-2 mt-2">
                        <div class="form-check">
                            <input type="checkbox" name="category[]" value="" class="form-check-input" id="all-categories"
                            @if(request('category') && in_array("", request('category'))) checked @endif>
                            <label class="form-check-label" for="all-categories">All Categories</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="category[]" value="spa" class="form-check-input" id="SPA"
                            @if(request('category') && in_array("spa", request('category'))) checked @endif>
                            <label class="form-check-label" for="SPA">SPA</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="category[]" value="hair care" class="form-check-input" id="Hair-Care"
                            @if(request('category') && in_array("hair care", request('category'))) checked @endif>
                            <label class="form-check-label" for="Hair-Care">Hair Care</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="category[]" value="skin care" class="form-check-input" id="Skin-Care"
                            @if(request('category') && in_array("skin care", request('category'))) checked @endif>
                            <label class="form-check-label" for="Skin-Care">Skin Care</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="category[]" value="treatment" class="form-check-input" id="Treatment"
                            @if(request('category') && in_array("treatment", request('category'))) checked @endif>
                            <label class="form-check-label" for="Treatment">Treatment</label>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="#" class="btn-link d-flex align-items-center text-dark bg-light p-2 rounded fw-medium fs-16 mb-0" data-bs-toggle="collapse" data-bs-target="#price" aria-expanded="false" aria-controls="other">Product Price
                        <i class='bx bx-chevron-down ms-auto fs-20'></i>
                    </a>
                    <div id="price" class="collapse show">
                        <div class="price-list d-flex flex-column gap-2 mt-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="all-price" @if(!request('price')) checked @endif>
                                <label class="form-check-label" for="all-price">All Price</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="price-1" name="price" value="0-200"  @if(request('price') && (request('price')=="0-200")) checked @endif>
                                <label class="form-check-label" for="price-1">Below € 200 ({{$prods->where('price','<','200')->count()}})</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="price-2" name="price" value="200-500" @if(request('price') && (request('price')=="200-500")) checked @endif>
                                <label class="form-check-label" for="price-2">€ 200 - € 500 ({{$prods->whereBetween('price',[200, 500])->count()}})</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="price-3" name="price" value="500-800" @if(request('price') && (request('price')=="500-800")) checked @endif>
                                <label class="form-check-label" for="price-3">€ 500 - € 800 ({{$prods->where('price',[500, 800])->count()}})</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="price-4" name="price" value="800-1000" @if(request('price') && (request('price')=="800-1000")) checked @endif>
                                <label class="form-check-label" for="price-4">€ 800 - € 1000 ({{$prods->where('price',[ 800, 1000])->count()}})</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary w-100">Apply</button>
            </div>
            </form>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="card bg-light-subtle">
            <div class="card-header border-0">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item fw-medium"><a href="javascript: void(0);" class="text-dark">Categories</a></li>
                            <li class="breadcrumb-item active">All Products</li>
                        </ol>
                        <p class="mb-0 text-muted">Showing all <span class="text-dark fw-semibold">
                            {{$products->count()}}
                        </span> items results</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-md-end mt-3 mt-md-0">
                            <button type="button" class="btn btn-outline-secondary me-1 d-none">
                                <i class="bx bx-cog me-1"></i>More Setting
                            </button>
                            <button type="button" class="btn btn-outline-secondary me-1 d-none">
                                <i class="bx bx-filter-alt me-1"></i> Filters
                            </button>
                            <a href="{{route('admin.products.create')}}" class="btn btn-success me-1">
                                <i class="bx bx-plus"></i> New Product
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row products-list">
            @foreach($products as $product)
            <div class="col-md-6 col-xl-3">
                <div class="card" style="border:1px dashed gray">
                    <?php $image = $product->imageGallery? json_decode($product->imageGallery[0])->original :
                    asset('storage/placeholder.png'); ?>
                    <a href="{{route('admin.products.edit',["product"=> $product->id] )}}">
                        <img src="{{ asset($image) }}?dfs" alt="" onerror=`this.src='{{ asset('storage/placeholder.png') }}'` class="img-fluid" >
                    </a>
                    <div class="card-body bg-light-subtle rounded-bottom">
                        <a href="{{route('admin.products.edit',["product"=> $product->id] )}}" class="text-dark fw-medium fs-16">
                            {{wrapText($product->name,20)}}
                        </a>
                        <div class="my-1">
                            <div class="d-flex gap-1 align-items-center">
                                @if($product->reviews->count())
                                <ul class="d-flex text-warning m-0 fs-18  list-unstyled">
                                    <?php
                                        $avg = $product->reviews->sum('rating') / $product->reviews->count();
                                    ?>
                                    @for($i=0; $i < $avg; $i++ )
                                    <li>
                                        <i class="bx bxs-star"></i>
                                    </li>
                                    @endfor
                                    @if($avg % 1 !==0)
                                    <li>
                                        <i class="bx bxs-star-half"></i>
                                    </li>
                                    @endif
                                </ul>
                                <p class="mb-0 fw-medium fs-15 text-dark">{{$product->reviews->sum('rating') / $product->reviews->count() }}
                                    <span class="text-muted fs-13">({{$product->reviews->count()}} Reviews)</span>
                                </p>
                                @endif
                            </div>
                        </div>
                        <h4 class="fw-semibold text-dark mt-2 d-flex align-items-center gap-1">
                            @if($product->discount)
                            <span class="text-muted text-decoration-line-through" style="padding-top:3px">
                            </span>
                            @endif
                            <?php
                                $price = $product->discount? ($product->price -  ($product->discount / 100) * $product->price): $product->price;
                            ?>
                            € {{number_format($price,2)}}
                            <small class="text-muted"> {{ $product->discount ? "($product->discount% Off)": '' }}</small>
                        </h4>
                        <div class="mt-3">
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.products.edit', ['product'=> $product->id ])}}"
                                id="{{ $product->id }}__" class="btn btn-outline-dark border border-secondary-subtle d-flex align-items-center justify-content-center gap-1 w-100">
                                    Edit
                                </a>
                                <a href="{{route('admin.products.remove', ['product' => $product->id ])}}" class="btn btn-orange border border-secondary-subtle d-flex align-items-center justify-content-center gap-1 w-100"
                                onclick="if(!confirm('Are you sure?')){event.preventDefault();event.stopImmediatePropagation();event.stopPropagation()}">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                    <span class="position-absolute top-0 end-0 p-3">
                        <button type="button" class="btn btn-soft-danger avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded-circle">
                            <iconify-icon icon="solar:heart-broken"></iconify-icon>
                        </button>
                    </span>
                </div>
            </div>
            @endforeach
        </div>

        <div class="py-3 border-top">
            <nav aria-label="Page navigation example">
                {{ $products->links('pagination::bootstrap-4') }}
            </nav>
        </div>

    </div>
</div>
<script>
    $(function(){
        $('.categories-list .form-check-input').click(function(e){
            const thisID = this.id
            if(thisID!=='all-categories') {
                $('#all-categories').prop('checked', false);
            } else {
                $('.categories-list .form-check-input').each(function(k,input){
                    input.checked= true
                })
            }
        })
        $('.price-list .form-check-input').click(function(e){
            const thisID = this.id
            if(thisID!=='all-price') {
                $('#all-price').prop('checked',false);
            } else {
                $('.price-list .form-check-input').each(function(k,input){
                    input.checked= true
                })
            }
        })
    })

    function search(el) {
        let cards = document.querySelectorAll('.products-list .card')
        cards.forEach( link => {
            if(link.innerText.toLowerCase().indexOf(el.value.toLowerCase())!== -1) {
                link.classList.remove('d-none')
            } else {
                link.classList.add('d-none')
            }
        })
    }
</script>
@endsection

@section('script-bottom')
@vite(['resources/js/pages/ecommerce-product.js'])
@endsection
