<?php
    $tags = \App\Models\Blog::pluck('tags')->flatten();
?>
<div class="col-lg-3">
    <div class="card bg-light-subtle">
        <div class="card-header border-0">
            <div class="search-bar me-3 mb-1">
                <span><i class="bx bx-search-alt"></i></span>
                <input type="search" class="form-control" id="search" placeholder="Search ...">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body border-light">
            <a href="#" class="btn-link d-flex align-items-center text-dark bg-light p-2 rounded fw-medium fs-16 mb-0" data-bs-toggle="collapse" data-bs-target="#categories" aria-expanded="false" aria-controls="other"> Categories <i class='bx bx-chevron-down ms-auto fs-20'></i>
            </a>
            <div id="categories" class="collapse show">
                <div class="categories-list d-flex flex-column gap-2 mt-2">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="all-categories" checked>
                        <label class="form-check-label" for="all-categories">All Categories</label>
                    </div>

                    @foreach (App\Models\BlogCategory::get(['name','slug']) as $cat)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="{{$cat->slug}}">
                            <label class="form-check-label" for="{{$cat->slug}}">{{$cat->name}}</label>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="mt-4">
                <a href="#" class="btn-link d-flex align-items-center text-dark bg-light p-2 rounded fw-medium fs-16 mb-0" data-bs-toggle="collapse" data-bs-target="#price" aria-expanded="false" aria-controls="other">Tags
                    <i class='bx bx-chevron-down ms-auto fs-20'></i>
                </a>
                <div id="price" class="collapse show">
                    <div class="categories-list d-flex flex-column gap-2 mt-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="all-price">
                            <label class="form-check-label" for="all-price">All </label>
                        </div>
                        @foreach ($tags as $tag)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="{{$tag}}">
                                <label class="form-check-label" for="{{$tag}}">{{$tag}}</label>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="mt-3">
                <a href="#" class="btn-link d-flex align-items-center text-dark bg-light p-2 rounded fw-medium fs-16 mb-0" data-bs-toggle="collapse" data-bs-target="#rating" aria-expanded="false" aria-controls="other">
                    Rating <i class='bx bx-chevron-down ms-auto fs-20'></i>
                </a>

                <div id="rating" class="collapse show">
                    <div class="categories-list d-flex flex-column gap-2 mt-2">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="rating-number" id="rate-1">
                            <label class="form-check-label" for="rate-1">1 <i class="bx bxs-star text-warning"></i> & Above (437)</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="rating-number" id="rate-2">
                            <label class="form-check-label" for="rate-2">2 <i class="bx bxs-star text-warning"></i> & Above (657)</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="rating-number" id="rate-3">
                            <label class="form-check-label" for="rate-3">3 <i class="bx bxs-star text-warning"></i> & Above (1,897)</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="rating-number" id="rate-4">
                            <label class="form-check-label" for="rate-4">4 <i class="bx bxs-star text-warning"></i> & Above (3,571)</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <a href="javascript:void(0)" class="btn btn-primary w-100"> Apply </a>
        </div>
    </div>

</div>
