@extends('admin.layouts.vertical', ['title' => 'Transformations'])

@section('css')
@vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')
<style>
    .fs-14.mb-1 {line-break:anywhere}
    #dropzone-preview .d-flex.p-2{align-items:center}
    .wrapped-text {
        position: relative;
    }
    .tooltiptext {
        visibility: hidden;
        max-width: 175px;
        width: 20vw;
        background-color: #a36262;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 10px;
        position: absolute;
        z-index: 1;
        right: 0
    }
    .wrapped-text:hover .tooltiptext {
        visibility: visible;
        white-space: break-spaces;
    }
    table img {border-radius: 10px;}

</style>

<form id="save" action="{{ route('admin.transformations.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Before Image</h4>
                </div>
                <div class="card-body">
                    <input type="file" name="before_image" class="d-none img1-" accept="image/*" >
                    <div class="dropzone bg-light-subtle py-5 dz-clickable">
                        <div class="dz-message needsclick" onclick="recall('img1-')">
                            <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                            <h3 class="mt-4">Drop your images here, or <span class="text-primary">click to browse</span></h3>
                            <span class="text-muted fs-13">
                                1600 x 1200 (4:3) recommended. PNG, JPG and GIF files are allowed
                            </span>
                        </div>
                    </div>

                    <div class="list-unstyled mb-0" id="dropzone-preview">
                        <li class="mt-2 row" id="dropzone-preview-list-one"></li>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add After Image</h4>
                </div>
                <div class="card-body">
                    <input type="file" multiple="multiple" name="after_image" class="d-none img2-" accept="image/*" >
                    <div class="dropzone bg-light-subtle py-5 dz-clickable">
                        <div class="dz-message needsclick" onclick="recall('img2-')">
                            <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                            <h3 class="mt-4">Drop your images here, or <span class="text-primary">click to browse</span></h3>
                            <span class="text-muted fs-13">
                                1600 x 1200 (4:3) recommended. PNG, JPG and GIF files are allowed
                            </span>
                        </div>
                    </div>

                    <div class="list-unstyled mb-0" id="dropzone-preview">
                        <li class="mt-2 row" id="dropzone-preview-list-two">
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Description</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-group mb-3">
                                <div id="editor" class="w-100">
                                    <p>Hello World!</p>
                                    <p>Some initial <strong>bold</strong> text</p>
                                    <p><br /></p>
                                </div>
                                <textarea name="description" id="description" class="form-control d-none" placeholder="..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-3 bg-light mb-3 rounded">
        <div class="row justify-content-end g-2">
            <div class="col-lg-2">
                <button type="submit" class="btn btn-primary w-100">Create </button>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="d-flex card-header justify-content-between align-items-center">
                <div>
                    <h4 class="card-title">All Transformations</h4>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover table-centered">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th>Before</th>
                                <th>After</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transformations as $row)
                                <tr>
                                    <td>
                                        <img src="{{ asset("storage/{$row->before_image_path}") }}" alt="" height="100">
                                    </td>
                                    <td>
                                        <img src="{{ asset("storage/{$row->after_image_path}") }}" alt="" height="100">
                                    </td>
                                    <td>
                                        <p class="wrapped-text">
                                            {!! $row->description !!}
                                            <span class='tooltiptext'>{{ $row->description }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-soft-danger btn-sm"
                                        onclick="deleteTransformation('{{ $row->id }}')">
                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @if($transformations->count() === 0)
                                <tr>
                                    <td colspan="4">
                                        <div class="form-check text-center">
                                            <label class="form-check-label" for="customCheck2">No Transformations Yet!</label>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer border-top">
                <nav aria-label="Page navigation example">
                        {{ $transformations->links('pagination::bootstrap-4') }}
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="updateStatus" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card border-0 mb-0">
                        <form action="{{ route('admin.orders.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="order_id">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 table-responsive">
                                        <div class="check-icon text-center">
                                            <h4 class="fw-semibold mt-3">Update Order Status</h4>
                                            <p><span class="text-dark fw-medium">Order Id :</span> <span class="orderNumber"></span></p>
                                        </div>
                                        <hr>
                                        <table class="table align-middle mb-0 table-hover table-centered">
                                            <thead>
                                                <tr>
                                                    <th>Order By</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                </tr>
                                            </thead>
                                            <tbody id="order-table">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <h4>Current Status</h4>
                                        <select class="form-control" name="amount" required data-placeholder="Select Categories">
                                            <option value="">Choose a category</option>
                                            <option value="0">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center border-0 bg-body gap-3 rounded">
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary">Close</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
<script>

    const b64 = [];
    let quill= null;
    function recall(className){
        $(`.${className}`).trigger('click')
    }

    function removeSpecificFile(selector) {
        event.preventDefault()
        const className = selector === 'dropzone-preview-list-one'? 'img1-': 'img2-';
        const input = document.querySelector(`.${className}`)
        let dataTransfer = new DataTransfer();
        input.files=null
        input.value=''
        $(`#${selector}`).children().remove()
    }
    let i = 0;

    function makePreview(ID, b64, name, type) {
        $(`#${ID}`).append('<div class="mt-2 col-12" data-index="'+type+'">\
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
                    <button data-dz-remove type="button" class="btn btn-sm btn-primary" onclick="removeSpecificFile(`'+ID+'`)">Delete</button>\
                </div>\
            </div>\
        </div>')
        i+=1;
    }


    function deleteTransformation(id){
        if(confirm("Are you sure?")) {
            const url = "{{ route('admin.transformations.remove', ['id' => 'XYZ']) }}".replace('XYZ', id)
            const a = document.createElement('a')
            a.href = url;
            a.click()
        }
    }
    window.addEventListener('DOMContentLoaded', function(){

        quill = new Quill('#editor', {
            theme: 'snow'
        });

        $('#save').submit(function(e){

            if(!$('input[name=before_image]').val()) {
                alert("Before image is required!");
                e.preventDefault()
            }
            if(!$('input[name=after_image]').val()) {
                alert("After image is required!");
                e.preventDefault()
            }
            document.getElementById('description').value  = quill.root.innerHTML;

        })

        $('input[name="before_image"]').on('change', function(e){
            let file = e.target.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function() {
                makePreview('dropzone-preview-list-one',reader.result, file.name, 'before');
            }
        });

        $('input[name="after_image"]').on('change', function(e){
            let file = e.target.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function() {
                makePreview('dropzone-preview-list-two',reader.result, file.name, 'after');
            }
        });

    })

</script>
@endsection
