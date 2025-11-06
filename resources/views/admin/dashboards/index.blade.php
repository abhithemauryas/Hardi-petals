@extends('admin.layouts.vertical', ['title' => 'Dashboard'])

@section('content')
    <div class="row">
        <div class="col-xxl-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-md bg-soft-primary rounded">
                                        <iconify-icon icon="solar:cart-5-bold-duotone"
                                                      class="avatar-title fs-32 text-primary"></iconify-icon>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-6 text-end">
                                    <p class="text-muted mb-0 text-truncate">Total Orders</p>
                                    <h3 class="text-dark mt-1 mb-0">{{\App\Models\Order::count()}}</h3>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card body -->
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-success"> <i class="bx bxs-up-arrow fs-12"></i> 2.3%</span>
                                    <span class="text-muted ms-1 fs-12">Last Week</span>
                                </div>
                                <a href="#!" class="text-reset fw-semibold fs-12">View More</a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                 <!-- end col -->

            </div> <!-- end row -->
        </div> <!-- end col -->

    </div> <!-- end row -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">
                            Recent Orders
                        </h4>

                    </div>
                </div>
                <!-- end card body -->
                <div class="table-responsive table-centered">
                    <table class="table mb-0">
                        <thead class="bg-light bg-opacity-50">
                        <tr>
                            <th class="ps-3">
                                Order ID.
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Customer Name
                            </th>
                            <th>
                                Email ID
                            </th>
                            <th>
                                Phone No.
                            </th>
                            <th>
                                Address
                            </th>
                            <th>
                                Payment Type
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                        </thead>
                        <!-- end thead-->
                        <tbody>
                        @foreach (App\Models\Order::limit(10)->get() as $order)
                            <tr>
                                <td>
                                    {{$order->orderNumber}}
                                </td>
                                <td>{{ date('M d, Y', strtotime($order->created_at)) }}</td>
                                <td>
                                    <a href="#!" class="link-primary fw-medium">{{$order->name}}</a>
                                </td>
                                <td> {{$order->email}}</td>
                                <td> {{$order->phone}}</td>
                                <td> {{$order->address}}</td>
                                <td> COD </td>
                                <?php
                                    $stage = $order->stage;
                                    $className = "";
                                    switch ($stage) {
                                        case 0:
                                            $className = "danger";
                                            $stage = "cancelled";
                                            break;
                                        case 1:
                                            $className = "info";
                                            $stage = "pending";
                                            break;
                                        case 2:
                                            $className = "info";
                                            $stage = "confirmed";
                                            break;
                                        case 3:
                                            $className = "primary";
                                            $stage = "packed";
                                            break;
                                        case 4:
                                            $className = "primary";
                                            $stage = "out for delivery";
                                            break;
                                        case 5:
                                            $className = "success";
                                            $stage = "delivered";
                                            break;
                                        case 6:
                                            $className = "secondary";
                                            $stage = "return pending";
                                            break;
                                        case 7:
                                            $className = "secondary";
                                            $stage = "refunded";
                                            break;
                                    }
                                ?>
                                <td> <span class="badge border border-{{$className}} text-{{$className}} px-2 py-1 fs-13">{{$stage}}</span></td>
                            </tr>
                            @endforeach
                            @if(App\Models\Order::count()===0)
                            <tr>
                                <td colspan="8">
                                    <div class="form-check text-center">
                                        <label class="form-check-label" for="customCheck2">No recent orders!</label>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                        <!-- end tbody -->
                    </table>
                    <!-- end table -->
                </div>
                <!-- table responsive -->

                <div class="card-footer border-top">

                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
@endsection
