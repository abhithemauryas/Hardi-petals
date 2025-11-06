@extends('admin.layouts.vertical', ['title' => 'Invoice Details'])

@section('content')

<style>
    @media print {
        .card-body {
            margin-top: 5em!important;
        }
    }
</style>
<?php
$tax = App\Models\Setting::whereKey('taxRate')->first('value')?->value;
?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <!-- Logo & title -->
                <div class="clearfix pb-3 bg-info-subtle p-lg-3 p-2 m-n2 rounded position-relative">
                    <div class="float-sm-start">
                        <div class="auth-logo">
                            <img class="logo-dark me-1" src="{{asset('images/logo-sm.png')}}" alt="logo-dark" height="35" />
                        </div>
                        <div class="mt-4">
                            <h4>XS Admin.</h4>
                            <address class="mt-3 mb-0">
                                J 15/92-A,<br>
                                Tata Company Varanasi 221001, India<br>
                                <abbr title="Phone">Phone:</abbr> +91 63880 47817
                            </address>
                        </div>
                    </div>
                    <div class="float-sm-end">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0 text-dark fw-semibold"> Invoice : </p>
                                        </td>
                                        <td class="text-end text-dark fw-semibold px-0 py-1">#INV-{{$order->id}}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0">Issue Date: </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0 py-1">23 April 2024</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0">Due Date : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0 py-1">26 April 2024</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0">Amount : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0 py-1">{{number_format($order->total,2)}} ₹</td>
                                    </tr>
                                    <tr>
                                        <?php $stat = $order->payment_status==="unpaid"? "primary": "success" ?>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0">Status : </p>
                                        </td>
                                        <td class="text-end px-0 py-1"><span class="badge bg-{{$stat}} text-white  px-2 py-1 fs-13">{{ucfirst($order->payment_status)}}</span></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="position-absolute top-100 start-50 translate-middle">
                        <img src="/images/check-2.png" alt="" class="img-fluid">
                    </div>
                </div>

                <div class="clearfix pb-3 mt-4">
                    <div class="float-sm-start">
                        <div class="">
                            <h4 class="card-title">Issue From :</h4>
                            <div class="mt-3">
                                <h4>XS Admin</h4>
                                <p class="mb-2">J 15/92-A, Tata Company Varanasi, 221001</p>
                                <p class="mb-2"><span class="text-decoration-underline">Phone :</span> +91 63880 47817</p>
                                <p class="mb-2"><span class="text-decoration-underline">Email :</span> xytilesstudioprofessional@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="float-sm-end">
                        <div class="">
                            <h4 class="card-title">Issue For :</h4>
                            <div class="mt-3">
                                <h4>{{$order->name}}</h4>
                                <p class="mb-2">{{$order->address}}</p>
                                <p class="mb-2"><span class="text-decoration-underline">Phone :</span> +91 {{ $order->phone }}</p>
                                <p class="mb-2"><span class="text-decoration-underline">Email :</span> {{$order->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive table-borderless text-nowrap table-centered">
                            <table class="table mb-0">
                                <thead class="bg-light bg-opacity-50">
                                    <tr>
                                        <th class="border-0 py-2">Product Name</th>
                                        <th class="border-0 py-2">Quantity</th>
                                        <th class="border-0 py-2">Price</th>
                                        <th class="border-0 py-2">Tax</th>
                                        <th class="text-end border-0 py-2">Total</th>
                                    </tr>
                                </thead> <!-- end thead -->
                                <tbody>
                                @foreach ($order->orderData as $row)
                                    <?php $product = App\Models\Product::findOrFail($row->id);
                                    $image = json_decode($product->imageGallery[0])->thumbnail;
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="rounded bg-light avatar d-flex align-items-center justify-content-center">
                                                    <img src="{{$image}}?fdg" alt="" class="avatar">
                                                </div>
                                                <div>
                                                    <a href="#!" class="text-dark fw-medium fs-15">{{$product->name}}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$row->quantity??1}}</td>
                                        <td>{{number_format($row->price,2)}} ₹</td>
                                        <?php
                                            $taxedAmt = $tax ? $row->price * ($tax / 100): 0.00;
                                        ?>
                                        <td>{{ number_format($taxedAmt,2) }} ₹</td>
                                        <td class="text-end">{{number_format($row->price,2)}} ₹</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-lg-5 col-6">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr class="">
                                        <td class="text-end p-0 pe-5 py-2">
                                            <p class="mb-0"> Sub Total : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium  py-2">{{number_format($order->total,2)}} ₹</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end p-0 pe-5 py-2">
                                            <p class="mb-0">Estimated Tax (15.5%) : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium  py-2">$20.00</td>
                                    </tr>
                                    <tr class="border-top">
                                        <td class="text-end p-0 pe-5 py-2">
                                            <p class="mb-0 text-dark fw-semibold">Grand Amount : </p>
                                        </td>
                                        <td class="text-end text-dark fw-semibold  py-2">{{number_format($order->total, 2)}} ₹</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-icon p-2" role="alert">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm rounded bg-danger d-flex justify-content-center align-items-center fs-18 me-2 flex-shrink-0">
                                    <i class="bx bx-info-circle text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 mb-1">
                    <div class="text-end d-print-none">
                        <a href="javascript:window.print()" class="btn btn-info width-xl">Print</a>
                        <a href="javascript:void(0);" class="btn btn-outline-primary width-xl">Submit</a>
                    </div>
                </div>

            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection
