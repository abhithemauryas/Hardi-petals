@extends('admin.layouts.vertical', ['title' => 'Settings'])

@section('css')
@vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')
<?php
    $data = \App\Models\Setting::select(['key','value'])->get();
    $settings = new \stdClass;
    foreach($data as $set) {
        $settings->{$set->key} = $set->value;
    }
?>
<form action="{{ route('admin.updateSettings') }}" method="post">
@csrf
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center gap-1"><iconify-icon icon="solar:settings-bold-duotone" class="text-primary fs-20"></iconify-icon>General Settings</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="d-charge" class="form-label">Delivery Charges</label>
                            <input type="text" name="deliveryCharge" data-name="Delivery charges" class="form-control" id="d-charge" placeholder="e.g. 80 INR" value="{{ $settings?->deliveryCharge??0 }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="layout" class="form-label">Delivery Expected In Days</label>
                            <input type="number" name="delivery" data-name="Delivery days" class="form-control" id="layout" placeholder="e.g. 7 Days" onblur="updateSettings(this)" value="{{ $settings?->delivery??7 }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center gap-1"><iconify-icon icon="solar:chat-square-check-bold-duotone" class="text-primary fs-20"></iconify-icon>Reviews Settings</h4>
            </div>
            <div class="card-body">
                <p>Allow Reviews </p>
                <div class="d-flex gap-2 align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="allowReview" data-name="Review status" value="yes" id="flexRadioDefault3" @if($settings?->allowReview?? false && $settings?->allowReview==='yes') checked @endif >
                        <label class="form-check-label" for="flexRadioDefault3">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="allowReview" data-name="Review status" value="no" id="flexRadioDefault4" @if($settings->allowReview?? false && $settings->allowReview==='no') checked @endif >
                        <label class="form-check-label" for="flexRadioDefault4">
                            No
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center gap-1"><iconify-icon icon="solar:ticket-sale-bold-duotone" class="text-primary fs-20"></iconify-icon>Tax Settings</h4>
            </div>
            <div class="card-body">
                <p>Prices with Tax</p>
                <div class="d-flex gap-2 align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" data-name="Tax status" type="radio" name="withTax" id="flexRadio" value="yes">
                        <label class="form-check-label" for="flexRadio">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" data-name="Tax status" type="radio" name="withTax" id="flexRadio8" value="no">
                        <label class="form-check-label" for="flexRadio8">
                            No
                        </label>
                    </div>
                </div>
                <form>
                    <div class="mb-1 pb-1">
                        <label for="items-tax" class="form-label">Default Tax Rate</label>
                        <input type="text" id="items-tax" data-name="Tax rate" name="taxRate" class="form-control" placeholder="000" value="{{ $settings->taxRate??'18%' }}" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="text-end">
    <a href="#!" class="btn btn-danger">Cancel</a>
    <a href="#!" class="btn btn-success">Save Change</a>
</div>
</form>
<script>
    function updateSettings(elem) {
        const {name, value, dataset} = elem;
        $.ajax({
            url:"{{ route('admin.updateSettings') }}",
            type:"POST",
            data: {_token:"{{ csrf_token() }}", [name]:value},
            success: res => {
                if(res.status) window.notify.success(`${dataset.name} setting updated!`);
            }
        })
    }
    window.addEventListener('DOMContentLoaded', function(){
        $('input[type=radio]').click(function(e){
            updateSettings(this)
        })
        $('input[type=text]').on('blur', function(){
            updateSettings(this)
        })
    })
</script>
@endsection

@section('script-bottom')
@vite(['resources/js/pages/app-ecommerce-product.js'])
@endsection
