@extends('admin.layouts.vertical', ['title' => 'Create Blog'])

@section('css')
@vite([
    'node_modules/choices.js/public/assets/styles/choices.min.css',
    'node_modules/quill/dist/quill.bubble.css',
    'node_modules/quill/dist/quill.snow.css',
    'node_modules/flatpickr/dist/flatpickr.min.css',
])
<style>
    .fs-14.mb-1 {line-break:anywhere}
    ul.list-unstyled .d-flex{align-items:center}
</style>
@endsection
<?php
    $tags = App\Models\Blog::pluck('tags')->flatten()->unique();
?>
@section('content')
<form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validate(this)" id="save">
    <div class="row">
        <div class="col-xl-12 col-lg-8">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card" style="min-height:350px">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Thumbnail Image</h4>
                        </div>
                        <div class="card-body">
                            <input class="thumb- d-none" type="file" data-select=".thumb-" name="thumbnail" id="thumbnail" accept="image/*">
                            <div class="dropzone bg-light-subtle">
                                <div class="dz-message needsclick" onclick="recall('thumb-')">
                                    <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                                    <h3 class="mt-4"><span class="text-primary">click to browse</span></h3>
                                    <span class="text-muted fs-13">
                                        1600 x 1200 (4:3) recommended. PNG, JPG and GIF files are allowed
                                    </span>
                                </div>
                            </div>
                            <ul class="list-unstyled mb-0" id="dropzone-preview-thumb"></ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Gallery</h4>
                        </div>
                        <div class="card-body">
                            <input type="file" name="gallery[]" data-select=".gallery-" accept="image/*" class="d-none gallery-" multiple>
                            <div class="dropzone bg-light-subtle ">
                                <div class="dz-message needsclick" onclick="recall('gallery-')">
                                    <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                                    <h3 class="mt-4">Drop your images here, or <span class="text-primary">click to browse</span></h3>
                                    <span class="text-muted fs-13">
                                        1600 x 1200 (4:3) recommended. PNG, JPG and GIF files are allowed
                                    </span>
                                </div>
                            </div>

                            <ul class="list-unstyled mb-0" id="dropzone-preview"></ul>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Blog Details -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Blog Details</h4>
            </div>
            <div class="card-body">

                    @csrf

                    <div class="row">
                        <div class="col-lg-8 mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Enter blog title" >
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" id="slug" name="slug" class="form-control" placeholder="auto-generated if left blank">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select id="category_id" name="category_id" class="form-control" data-choices data-placeholder="Select Category">
                                <option value="">Select</option>
                                @foreach(App\Models\BlogCategory::get(['id','name']) as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control" data-choices>
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="except" class="form-label">Summary</label>
                            <div id="bubble-editor" placeholder="Short summary for preview..."></div>
                            <textarea id="except" name="summary" class="d-none"></textarea>
                        </div>

                        <div class="col-lg-12 mt-3 mb-5">
                            <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                            <div id="snow-editor" placeholder="Write the full blog content here..." style="min-height:120px"></div>
                            <textarea id="content" name="content" class="d-none"></textarea>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <label for="tags" class="form-label">Tags</label>
                            <input type="text" id="tags" name="tags" class="form-control" placeholder="Type and press enter" data-choices data-choices-text-unique-true data-choices-removeItem>
                            <div class="row choices__list choices__list--multiple d-flex">
                                @foreach ($tags as $tag)
                                    <div class="choices__item choices__item--selectable" onclick="fill(this)" style="width: auto" value="{{ $tag }}">{{ $tag }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-3">
                            <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" id="is_available" name="is_available" checked>
                                    <label class="form-check-label" for="is_available">Allow comments</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="datetime-datepicker" class="form-label">Publish Date (Optional)</label>
                            <input type="text" id="datetime-datepicker" name="published_at" class="form-control" placeholder="Select date/time">
                        </div>
                    </div>

                    <!-- SEO Section -->
                    <div class="border-top pt-3 mt-3">
                        <h5 class="mb-3">SEO Meta Data</h5>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" id="meta_title" name="meta_title" class="form-control" placeholder="SEO title for Google">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input id="meta_keywords" name="meta_keywords" class="form-control" placeholder="Meta keywords...">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea id="meta_description" name="meta_description" rows="3" class="form-control" placeholder="SEO description..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 bg-light rounded mt-3">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-primary w-100">Create Blog</button>
                            </div>
                            <div class="col-lg-2">
                                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary w-100">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('script-bottom')
@vite([
    'resources/js/pages/ecommerce-product-details.js',
    'resources/js/components/form-flatepicker.js',
    'resources/js/components/form-quilljs.js'
])
<script>
    // Auto slug generation from title
    document.querySelector('#title').addEventListener('input', e => {
        const title = e.target.value;
        document.querySelector('#slug').value = title.toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/(^-|-$)+/g, '');
    });

    const images = {};
    const b64 = [];

    function recall(className){
        $(`.${className}`).trigger('click')
    }

    function removeSpecificFile(index, selector) {
        const input = document.querySelector(selector)
        delete images[index];
        const newFileList = Object.values(images)
        let dataTransfer = new DataTransfer();
        input.files = null
        input.value = ''
        newFileList.forEach(file => dataTransfer.items.add(file));
        input.files = dataTransfer.files;
        event.preventDefault();
        $('div[data-index="'+index+'"]').remove();
    }

    window.addEventListener('DOMContentLoaded', function(){
        $('input[name="gallery[]"], input[name=thumbnail]').on('change', function(e){
            let files = e.target.files;
            let selector = e.target.dataset.select;
            [...files].forEach( (file,i) => {
                images[i] = file
                var reader = new FileReader();
                reader.readAsDataURL(file,i);
                reader.onload = function() {
                    makePreview(reader.result, file.name, i, selector);
                }
            })
        });
        $('input[name=_token], input[type=search]').addClass('exception');

        $('#save').submit(function(e){

            if(!$('input[name=thumbnail]').val()) {
                notify.warning("Thumbnail is required!");
                e.preventDefault()
            }
            if(!$('input[name="gallery[]"]').val()) {
                notify.warning("gallery images are required!");
                e.preventDefault()
            }

            document.getElementById('content').value = window.snow.root.innerHTML;
            document.getElementById('summary').value = window.bubble.root.innerHTML;

        })

    });

    let i = 0;
    function makePreview(b64, name,index, selector) {
        console.log(selector)
        let target = $(selector).parent('div').find('ul.list-unstyled')

        if(selector==='.thumb-') {
            target.html('<div class="mt-2 col-auto" data-index="'+index+'">\
                <div class="d-flex p-2 border rounded">\
                    <div class="flex-shrink-0 me-3">\
                        <div class="avatar-lg bg-light rounded">\
                            <img data-dz-thumbnail class="img-fluid rounded d-block h-100" src="'+b64+'" alt="Image" />\
                        </div>\
                    </div>\
                    <div class="flex-grow-1">\
                        <div class="pt-1">\
                            <h5 class="fs-14 mb-1" data-dz-name>'+name+'</h5>\
                            <p class="fs-13 text-muted mb-0" data-dz-size></p>\
                            <strong class="error text-primary" data-dz-errormessage></strong>\
                        </div>\
                    </div>\
                    <div class="flex-shrink-0 ms-3">\
                        <button data-dz-remove class="btn btn-sm btn-primary" onclick="removeSpecificFile('+index+', `'+ selector+'`)">Delete</button>\
                    </div>\
                </div>\
            </div>');
        } else {
            target.append('<div class="mt-2 col-auto" data-index="'+index+'">\
                <div class="d-flex border rounded">\
                    <div class="flex-shrink-0 me-3">\
                        <div class="avatar-lg bg-light rounded">\
                            <img data-dz-thumbnail class="img-fluid rounded d-block h-100" src="'+b64+'" alt="Image" />\
                        </div>\
                    </div>\
                    <div class="flex-grow-1">\
                        <div class="pt-1">\
                            <h5 class="fs-14 mb-1" data-dz-name>'+name+'</h5>\
                            <p class="fs-13 text-muted mb-0" data-dz-size></p>\
                            <strong class="error text-primary" data-dz-errormessage></strong>\
                        </div>\
                    </div>\
                    <div class="flex-shrink-0 ms-3">\
                        <button data-dz-remove class="btn btn-sm btn-primary" onclick="removeSpecificFile('+index+', `'+ selector+'`)">Delete</button>\
                    </div>\
                </div>\
            </div>');
        }
        i+=1;
    }

    function validate(form){
        const inputs = form.querySelectorAll('input:not(.exception), select:not(.exception)')
        let dirty = false;
        inputs.forEach( input => {
            if(!input.value) {
                dirty = input.name;
                return false;
            }
        });
        if(dirty) {
            notify.warning(`${capitalFirst(dirty)} is required!`);
            return false;
        }
        return true;
    }

    function fill(el) {
        const name = el.innerText;
        const elem = document.getElementById('tags')
        el.value = elem.value + name;
        $(elem).trigger('change')
    }
</script>
@endsection
