@extends('admin.layouts.vertical', ['title' => 'Invoices List'])

@section('content')

<!-- Start here.... -->
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2 d-flex align-items-center gap-2">Total Invoice</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">{{$invoices->count()}}</p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:bill-list-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2 d-flex align-items-center gap-2">Pending Invoice</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">{{$invoices->where('payment_status', 'unpaid')->count()}}</p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:bill-cross-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2 d-flex align-items-center gap-2">Paid Invoice</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">{{$invoices->where('payment_status', '!=', 'unpaid')->count()}}</p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:bill-check-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2 d-flex align-items-center gap-2">Inactive Invoice</h4>
                        <p class="text-muted fw-medium fs-22 mb-0">0</p>
                    </div>
                    <div>
                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                            <iconify-icon icon="solar:bill-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
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
                    <h4 class="card-title">All Invoices List</h4>
                </div>
                <div class="dropdown d-none">
                    <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light rounded" data-bs-toggle="dropdown" aria-expanded="false">
                        This Month
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="#!" class="dropdown-item">Download</a>
                        <!-- item-->
                        <a href="#!" class="dropdown-item">Export</a>
                        <!-- item-->
                        <a href="#!" class="dropdown-item">Import</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover table-centered">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1"></label>
                                    </div>
                                </th>
                                <th>Invoice ID</th>
                                <th>Billing Name</th>
                                <th>Order Date</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td><input type="checkbox" data-id="{{ $invoice->id }}"></td>
                                    <td>{{ $invoice->id }}</td>
                                    <td>{{ $invoice->name }}</td>
                                    <td>{{ date('d M, Y', strtotime($invoice->created_at)) }}</td>
                                    <td>{{ $invoice->total }}</td>
                                    <td>{{ $invoice->payment_mode }}</td>
                                    <?php
                                        $className = $invoice->payment_status === 'unpaid'? "primary" : "info";
                                        $stage = $className==='primary'? 'Pending': "Completed";
                                    ?>
                                    <td><span class="badge bg-{{$className}}-subtle text-{{$className}} py-1 px-2">{{$stage}}</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.invoice.detail',['id' => $invoice->id ]) }}" class="btn btn-light btn-sm">
                                                <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <!-- <a href="javascript:void(0)" onclick="updateStatus(this)" class="btn btn-soft-primary btn-sm">
                                                <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @if(App\Models\Invoice::count()===0)
                            <tr>
                                <td colspan="8">
                                    <div class="form-check text-center">
                                        <label class="form-check-label" for="customCheck2">No Invoices Yet!</label>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
            <div class="card-footer border-top ">
                <nav aria-label="Page navigation example">
                    {{ $invoices->links('pagination::bootstrap-4') }}
                </nav>
            </div>
        </div>
    </div>

</div>

@endsection
