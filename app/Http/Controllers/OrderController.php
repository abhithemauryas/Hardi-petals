<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\OrderPlaced;
use App\Notifications\OrderStatusChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        // dd($request->all());
        try {
            logger("Incoming request: ". json_encode($request->all()));
            $order = new Order();
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->city = $request->city;
            $order->landmark = $request->landmark;
            $order->address = $request->address;
            $order->postal = $request->postal;
            $order->total = $request->total?? 0;
            $order->payment_mode = $request->payment;
            $order->orderData = json_decode($request->cart_json, true);
            $order->delivery_charge = $request->deliveryCharge?? 0;
            $order->save();
            if($request->user()) {
                User::where('id', $request->user()->id)->update([
                    'full_address' => $request->address,
                    'city' => $request->city,
                ]);
            }
            // send email optional for order confirmation;
            // reduce stock from the product ordered (maybe not yet because its not delivered);

            // $users = User::all();
            $products = implode(PHP_EOL, collect($request->orderItems)->pluck('name')->toArray());

            Notification::route('mail', env('ADMIN_EMAIL'))->notify(new OrderPlaced("New order from {$request->name}.", "{$request->name} has made an order for the below products ".PHP_EOL." $products."));

            // $invoice = new Invoice();
            // $invoice->name = $request->name;
            // $invoice->phone = $request->phone;
            // $invoice->email = $request->email;
            // $invoice->city = $request->city;
            // $invoice->address = $request->deliveryaddress;
            // $invoice->total = $request->total;
            // $invoice->payment_mode = $request->payment_method;
            // $invoice->orderData = $request->orderItems;
            // $invoice->order_id = $order->id;
            // $invoice->save();

            return [
                'status'=> true,
                'message' => "Order placed successfully",
                'orderDetails' => [
                    'order' => $order,
                    'delivery' => Setting::whereKey('delivery')->first('value')?->value
                ]
            ];

        } catch (\Throwable $e) {
            logger($e->getMessage());
        }

        return ['status'=> false];
    }

    public function index(Request $request)
    {
        $orders = Order::paginate(15);
        return view("admin.general.orders.list", compact('orders'));
    }

    public function update(Request $request) {
        try {
            $order = Order::whereId($request->order_id);
            if($order->exists()){
                $order->update([
                    'stage' => $request->amount
                ]);
                $order = $order->first(['orderData','name', 'email','orderNumber']);

                $products = collect($order->orderData)->pluck('id');
                $names = Product::whereIn('id', $products)->pluck('name');

                Notification::route("mail", $order->email)->notify(new OrderStatusChange(
                    $names->toArray(),
                    $request->amount,
                    $order->orderNumber,
                    $order->name
                ));
            }

            return back()->with('success', "Order status updated successfully!");

        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function delete($id) {
        try {
            $order = Order::whereId($id);
            if($order->exists()){
                $order->delete();
                return ['status' => true, 'message' => "Order deleted successfully!"];
            }
        } catch (\Throwable $th) {
            logger("Failed to remove the order: ".$th->getMessage());
        }
        return ['status' => false];
    }

    public function orders(Request $request)
    {
        $orders = Order::where('email', $request->user()->email)->orWhere('phone', $request->user()->phone)->get();
        return response()->json([
            'status' => true,
            'orders' => OrderResource::collection($orders)
        ]);
    }

    

}
