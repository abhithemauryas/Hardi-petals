@extends('admin.layouts.vertical', ['title' => 'Orders List'])

@section('content')

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2">Payment Refund</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">{{$orders->where('stage', 7)->count()}}</p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:chat-round-money-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2">Order Cancel</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">{{$orders->where('stage', 0)->count()}}</p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:cart-cross-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2">Order Shipped</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">{{$orders->where('stage', 4)->count()}}</p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:box-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2">Order Delivering</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">{{$orders->where('stage', 1)->count()}}</p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:tram-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2">Pending Payment</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">{{$orders->where('payment_status','unpaid')->count()}}</p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:clock-circle-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2">Delivered</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">{{$orders->where('stage', 5)->count()}}</p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:clipboard-check-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2">In Progress</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">{{$orders->where('stage', 1)->count()}}</p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:inbox-line-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="d-flex card-header justify-content-between align-items-center">
                <div>
                    <h4 class="card-title">All Order List</h4>
                </div>
                <div class="dropdown d-none">
                    <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light rounded" data-bs-toggle="dropdown" aria-expanded="false">
                        This Month
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#!" class="dropdown-item">Download</a>
                        <a href="#!" class="dropdown-item">Export</a>
                        <a href="#!" class="dropdown-item">Import</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover table-centered">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th>Order ID</th>
                                <th>Created at</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                                <th>Items</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr data-id="{{ $order->id }}">
                                <td>
                                    {{$order->orderNumber}}
                                </td>
                                <td>{{ date('M d, Y', strtotime($order->created_at)) }}</td>
                                <td>
                                    <a href="#!" class="link-primary fw-medium">{{$order->name}}</a>
                                </td>
                                <td> ₹ {{$order->total}}</td>
                                <td> {{$order->payment_mode}}</td>
                                <td> <span class="badge bg-light text-dark  px-2 py-1 fs-13">Unpaid</span></td>
                                <td>{{ count($order->orderData) }}</td>
                                <?php
                                    $stage = $order->stage;
                                    $className = "";
                                    switch ($stage) {
                                        case 0:
                                            $className = "danger";
                                            $stage = "Cancelled";
                                            break;
                                        case 1:
                                            $className = "info";
                                            $stage = "Pending";
                                            break;
                                        case 2:
                                            $className = "info";
                                            $stage = "Confirmed";
                                            break;
                                        case 3:
                                            $className = "primary";
                                            $stage = "Packed";
                                            break;
                                        case 4:
                                            $className = "primary";
                                            $stage = "Out for delivery";
                                            break;
                                        case 5:
                                            $className = "success";
                                            $stage = "Delivered";
                                            break;
                                        case 6:
                                            $className = "secondary";
                                            $stage = "Return pending";
                                            break;
                                        case 7:
                                            $className = "secondary";
                                            $stage = "Refunded";
                                            break;
                                    }
                                ?>
                                <td> <span class="badge border border-{{$className}} text-{{$className}} px-2 py-1 fs-13">{{$stage}}</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="javascript:void(0)" class="btn btn-light btn-sm" onclick="viewProducts(this)" data-orderNumber="{{ $order->orderNumber }}" data-order="{{ json_encode($order->orderData) }}" >
                                            <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                        </a>
                                        <a href="javascript:void(0)" onclick="updateStatus(this)" data-orderNumber="{{ $order->orderNumber }}" data-order="{{ json_encode($order) }}"
                                            class="btn btn-soft-primary btn-sm">
                                            <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-soft-danger btn-sm" data-orderId="{{ $order->id }}" onclick="deleteOrder(this)">
                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @if(App\Models\Order::count()===0)
                                <tr>
                                    <td colspan="8">
                                        <div class="form-check text-center">
                                            <label class="form-check-label" for="customCheck2">No Orders Yet!</label>
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
                    {{ $orders->links('pagination::bootstrap-4') }}
                </nav>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="videocall" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card border-0 mb-0">
                        <div class="card-body">
                            <form class="">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 table-responsive">
                                        <div class="check-icon text-center">
                                            <h4 class="fw-semibold mt-3">Order Items</h4>
                                            <p><span class="text-dark fw-medium">Order Id :</span> <span class="orderNumber">#0758267/90</span></p>
                                        </div>
                                        <hr>
                                        <table class="table align-middle mb-0 table-hover table-centered">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Image</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody id="contents">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer d-flex align-items-center border-0 bg-body gap-3 rounded">
                            <a href="javascript: void(0);" data-bs-dismiss="modal" class="btn btn-primary">Close</a>
                        </div>
                    </div>
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
                                            <option value="1">Pending</option>
                                            <option value="2">Confirmed</option>
                                            <option value="3">Packed</option>
                                            <option value="4">Out for delivery</option>
                                            <option value="5">Delivered</option>
                                            <option value="6">Return Pending</option>
                                            <option value="7">Refunded</option>
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

<button class="d-none" data-bs-toggle="modal" data-bs-target="#videocall" type="button" id="recall"></button>
<button class="d-none" data-bs-toggle="modal" data-bs-target="#updateStatus" type="button" id="updateStat"></button>

<script>
    <?php
        $products = App\Models\Product::without('reviews')->get(['id','name','imageGallery' ]);
        $map = new stdClass;
        $names = new stdClass;
        foreach($products as $item) {
            $map->{$item->id} = $item->imageGallery? json_decode($item->imageGallery[0])->medium : asset('storage/placeholder.png');
            $names->{$item->id} = $item->name;
        }
    ?>
    var products = JSON.parse(`<?php echo json_encode($map) ?>`);
    var names = JSON.parse(`<?php echo json_encode($names) ?>`);
    function viewProducts( elem ) {
        const order = JSON.parse(elem.dataset.order);
        $('.orderNumber').text(elem.dataset.ordernumber)
        let htm = order.map( line => `<tr><td>${names[line.id]}</td><td><img height="50" src="${products[line.id]}"/></td><td>₹${line.price}</td></tr>`);
        $('tbody#contents').html(htm.toString())
        $('#recall').click()
    }
// 1 for  , 2 for , 3 for , 4 for , 5  , 0 for , 6 for , 7 for
    const status = {
        0: "Cancelled",
        1: "Pending",
        2: "Confirmed",
        3: "Packed",
        4: "Out-for-delivery",
        5: "Delivered",
        6: "Return pending",
        7: "Refunded"
    }

    function updateStatus(elem) {
        const order = JSON.parse(elem.dataset.order);
        const {stage} = order
        $('.orderNumber').text(elem.dataset.ordernumber)
        $('#order-table').html(`<tr><td>${order.name}</td><td>${order.email}</td><td>${order.address}</td></tr>`)
        $('.cStatus').text(status[stage])
        $('input[name=order_id]').val(order.id)
        $('select[name=amount] option[value="'+order.stage+'"]').prop('selected', 'selected')
        $('#updateStat').click()
    }

    function deleteOrder( elem ) {
        if(confirm("Are you sure?")) {
            const id = elem.dataset.orderid
            const url = "{{ route('admin.orders.remove', ['id' => 'XYZ']) }}".replace('XYZ', id)
            $.ajax({
                url ,
                success: res => {
                    if(res.status) {
                        // document.querySelector('tr[data-id="'+id+'"]').remove()
                        window.location.reload()
                    }
                }
            })
        }
    }
</script>

@endsection

