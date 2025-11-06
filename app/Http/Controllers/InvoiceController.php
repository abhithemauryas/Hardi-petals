<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = Invoice::paginate(15);
        return view('admin.general.invoice.list', compact('invoices'));
    }

    public function downloadInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);
        $pdf = Pdf::loadView('admin.general.invoice.details', compact('order'));
        return $pdf->download("invoice_{$order->invoice_number}.pdf");
    }

    public function detail($id) {
        $order = Invoice::findOrFail($id);
        return view('admin.general.invoice.details', compact('order'));
    }
}
