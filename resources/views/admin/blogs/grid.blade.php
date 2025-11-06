@extends('admin.layouts.vertical', ['title' => 'Blogs'])

@section('css')
@vite(['node_modules/nouislider/dist/nouislider.min.css'])
@endsection

@section('content')

<div class="row">

    @include('admin.blogs.filters')

    <div class="col-lg-9">
        <div class="card bg-light-subtle">
            <div class="card-header border-0">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item fw-medium"><a href="javascript: void(0);" class="text-dark">Categories</a></li>
                            <li class="breadcrumb-item active">All Blogs</li>
                        </ol>
                        <p class="mb-0 text-muted">Showing all <span class="text-dark fw-semibold">{{$blogs->count()}}</span> items</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-md-end mt-3 mt-md-0">
                            <button type="button" class="btn d-none btn-outline-secondary me-1">
                                <i class="bx bx-filter-alt me-1"></i> Filters
                            </button>
                            <a href="{{ route('admin.blogs.create')}}" class="btn btn-soft-success me-1">
                                <i class="bx bx-plus"></i> New Blog
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <img src="{{ asset("storage/$blog->thumbnail") }}" alt="" class="img-fluid ">
                        <div class="card-body bg-light-subtle rounded-bottom">
                            <a href="{{ route('admin.blogs.view', ['blog'=> $blog->id ])}}" class="text-dark fw-medium fs-16">{{$blog->title}}</a>
                            <div class="my-1 d-none">
                                <div class="d-flex gap-2 align-items-center">
                                    <p class="mb-0 fw-medium fs-15 text-dark">4.5 <span class="text-muted fs-13">(55 Review)</span></p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex gap-2">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-soft-primary border border-primary-subtle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-dots-horizontal-rounded'></i></a>
                                        <div class="dropdown-menu">
                                            <a href="#!" class="dropdown-item">Archive</a>
                                            <a href="{{url("admin/blogs/edit/$blog->id")}}" class="dropdown-item">Edit</a>
                                            <a href="#!" class="dropdown-item">Overview</a>
                                            <a href="#!" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                    <a href="{{ url("admin/blogs/view/$blog->id")}}" class="btn btn-outline-dark border border-secondary-subtle d-flex align-items-center justify-content-center gap-1 w-100"><i class='bx bx-cart align-middle'></i> View </a>
                                </div>
                            </div>
                        </div>
                        <span class="position-absolute top-0 end-0 p-3">
                            <button type="button" class="btn btn-soft-danger avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded-circle"><iconify-icon icon="solar:heart-broken"></iconify-icon></button>
                        </span>
                    </div>
                </div>
            @endforeach
            @if(!$blogs->count())
                <div class="text-center">
                    <h1 class="p-3 text-center">No blogs yet!</h1>
                    <a href="{{ route('admin.blogs.create') }}" class="btn col-5 align-self-center btn-secondary">Create a blog</a>
                </div>
            @endif
        </div>

        <div class="py-3 border-top">
            <nav aria-label="Page navigation example">
                {{ $blogs->links("pagination::bootstrap-4") }}
                <ul class="pagination justify-content-end mb-0 d-none">
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                </ul>
            </nav>
        </div>

    </div>
</div>

@endsection

@section('script-bottom')
@vite(['resources/js/pages/ecommerce-product.js'])
@endsection
