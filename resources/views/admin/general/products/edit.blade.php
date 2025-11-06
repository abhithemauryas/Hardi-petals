@extends('admin.layouts.vertical', ['title' => 'Product Edit'])

@section('css')
    @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')
<style>
    .fs-14.mb-1 {line-break:anywhere}
    #dropzone-preview .d-flex.p-2{align-items:center}
    .draggable.dragging {
        opacity: 0.5;
    }
    .draggable{ cursor: grab; z-index: 100;}
</style>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="update-product">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Product Photo</h4>
                </div>
                <div class="card-body">
                    <input type="file" multiple="multiple" name="images[]" accept="image/*" class="d-none img-">
                    <input type="hidden" name="deleted" value="">
                    <div class="dropzone bg-light-subtle py-5 dz-clickable">
                        <div class="dz-message needsclick" onclick="recall()">
                            <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                            <h3 class="mt-4">Drop your images here, or <span class="text-primary">click to browse</span></h3>
                            <span class="text-muted fs-13">
                                1600 x 1200 (4:3) recommended. PNG, JPG and GIF files are allowed
                            </span>
                        </div>
                    </div>

                    <ul class="list-unstyled mb-0" id="dropzone-preview">
                        <li class="mt-2 row draggers" id="dropzone-preview-list">
                            @foreach ($product->imageGallery as $image)
                                <div class="mt-2 col-4  draggable" data-index="{{$loop->index}}" draggable="true">
                                    <?php
                                        $image = json_decode($image);
                                        $name = explode('/',$image->thumbnail);
                                        $name = $name[count($name)-1];
                                    ?>
                                    <div class="d-flex p-2 border rounded" data-index="{{ $loop->index }}" >
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-lg bg-light rounded">
                                                <img data-dz-thumbnail class="img-fluid rounded d-block h-100" src="{{$image->thumbnail}}?&abz" alt="Image" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="pt-1">
                                                <h5 class="fs-14 mb-1" data-dz-name>{{$name}}</h5>
                                                <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                <strong class="error text-primary" data-dz-errormessage></strong>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ms-3">
                                            <button data-dz-remove class="btn btn-sm btn-primary" onclick="removeSpecificFile('{{ $loop->index }}')">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="product-name" class="form-label">Product Name</label>
                                <input type="text" name="name" value="{{ $product->name }}" id="product-name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="product-categories" class="form-label">Product Categories</label>
                                <select class="form-control" id="product-categories" name="category" required data-choices data-choices-groups >
                                    <option value="">Choose a category</option>
                                    <option {{ $product->category == 'SPA' ? 'selected' : '' }}>SPA</option>
                                    <option {{ $product->category == 'Skin Care' ? 'selected' : '' }}>Skin Care</option>
                                    <option {{ $product->category == 'Hair Care' ? 'selected' : '' }}>Hair Care</option>
                                    <option {{ $product->category == 'Treatment' ? 'selected' : '' }}>Treatment</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <div class="input-group mb-3">
                                    <div id="editor" class="w-100">
                                        {!!$product->description!!}
                                    </div>
                                    <textarea class="form-control d-none" name="description" id="description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="product-stock" class="form-label">Stock</label>
                                <input type="number" name="stock" id="product-stock" class="form-control" value="{{ $product->stock }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pricing Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="product-price" class="form-label">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text fs-20"><i class='bx bx-rupee'></i></span>
                                    <input type="number" name="price" id="product-price" class="form-control" value="{{$product->price}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="product-discount" class="form-label">Discount</label>
                                <div class="input-group">
                                    <span class="input-group-text fs-20"><i class='bx bxs-discount'></i></span>
                                    <input type="number" name="discount" id="product-discount" class="form-control" value="{{ $product->discount }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-3 bg-light mb-3 rounded">
                <div class="row justify-content-end g-2">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary w-100">Update Product</button>
                    </div>
                    <div class="col-lg-2">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary w-100">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('script-bottom')
<script>

    let original = JSON.parse('<?php echo json_encode(array_map(fn($item) => json_decode($item)->thumbnail,$product->imageGallery)) ?>');

    let images = {};
    if(original.length) {
        original.forEach( (ite, index) => {
            images[index]= ite
        })
    }
    const b64 = [];
    function recall(){
        $('.img-').trigger('click')
    }

    function removeSpecificFile(index) {
        const input = document.querySelector('.img-')
        delete images[index];
        const newFileList = Object.values(images)
        let dataTransfer = new DataTransfer();
        input.files=null
        input.value=''
        newFileList.forEach(file => {
            if(typeof file==='object'){
                dataTransfer.items.add(file)
            }
        });
        if(newFileList[0] && typeof newFileList[0]==='object'){
            input.files = dataTransfer.files;
        } else {
            $('input[name="deleted"]').val(index+',')
        }
        $('div[data-index="'+index+'"]').remove()
        event.preventDefault()
    }

    document.querySelector('input[name="images[]"]').addEventListener('change', function(e){

        [...e.target.files].forEach( (file,i) => {
            images[i] = file
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function() {
                makePreview(reader.result, file.name, i);
            }
        })
    })
    let i = 0;
    function makePreview(b64, name, index) {
            $('#dropzone-preview-list').append(`<div class="mt-2 col-4" data-index="${index}">\
                    <div class="d-flex p-2 border rounded">\
                        <div class="flex-shrink-0 me-3">\
                            <div class="avatar-lg bg-light rounded">\
                                <img data-dz-thumbnail class="img-fluid rounded d-block h-100" src="${b64}" alt="Image" />\
                            </div>\
                        </div>\
                        <div class="flex-grow-1">\
                            <div class="pt-1">\
                                <h5 class="fs-14 mb-1" data-dz-name>${name}</h5>\
                                <p class="fs-13 text-muted mb-0" data-dz-size></p>\
                                <strong class="error text-primary" data-dz-errormessage></strong>\
                            </div>\
                        </div>\
                        <div class="flex-shrink-0 ms-3">\
                            <button data-dz-remove class="btn btn-sm btn-primary" onclick="removeSpecificFile(${index})">Delete</button>\
                        </div>\
                    </div>\
                </div>`)
            i+=1;
    }

    let draggedItem = null;

    function initDrag()
    {
        const container = document.querySelector(".draggers");

        container.addEventListener("dragstart", (e) => {
            if (e.target.classList.contains("draggable")) {
                draggedItem = e.target;
                e.target.classList.add("dragging");
            }
        });

        container.addEventListener("dragend", (e) => {
            if (e.target.classList.contains("draggable")) {
                e.target.classList.remove("dragging");
                // draggedItem = null;
            }
        });

        container.addEventListener("dragover", (e) => e.preventDefault());

        [...document.querySelectorAll('.draggers div')].forEach( item => {

            item.addEventListener('drop', (e) => {

                const bounding = draggedItem.getBoundingClientRect();
                const offset = e.clientX - bounding.left;
                const isAfter = offset > bounding.width / 2;

                if (draggedItem !== item) {
                    if (isAfter) {
                        item.after(draggedItem);  // insert after
                    } else {
                        item.before(draggedItem); // insert before
                    }
                }
                e.preventDefault();
                setSequence();

            });

        });

    }

    function setSequence()
    {
        const updatedIndices = [...document.querySelector('.draggers').children].map( item => item.dataset.index );
        let newArr = []
        updatedIndices.forEach( ind => {
            newArr.push(original[ind])
        })
        if(newArr.length !== original.length) return

        $.ajax({
            url:"{{ route('admin.seq', ['product' => $product->id ]) }}",
            type:"POST",
            data:{
                _token:'{{ csrf_token() }}',
                gallery: JSON.stringify(updatedIndices),
            },
            success: res => {
                if(res.status) {
                    return window.notify.success(res.message);
                }
                window.notify.error(res.message)
            }
        });

    }

    window.addEventListener('DOMContentLoaded', ()=> {
        quill = new Quill('#editor', {
            theme: 'snow'
        });
        initDrag();
        $('#update-product').submit(function(e){
            document.getElementById('description').value  = quill.root.innerHTML;
        })
    });

</script>
@endsection
