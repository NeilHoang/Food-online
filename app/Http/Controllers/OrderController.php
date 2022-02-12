<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class OrderController extends Controller
{
    function index()
    {
        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.customer_id')
            ->join('payments', 'orders.order_id', '=', 'payments.order_id')
            ->select('orders.*', 'customers.username', 'payment_type', 'payment_status')
            ->get();
        return view('backend.order.index', compact('orders'));
    }

    function create()
    {
        return view('backend.order.create');
    }

    function view($order_id)
    {
        $orders = Order::find($order_id);
        $customers = Customer::find($orders->customer_id);
        $shipping = Shipping::find($orders->shipping_id);
        $payments = Payment::where('order_id', $orders->order_id)->first();
        $orderDetails = OrderDetail::where('order_id', $orders->order_id)->first();
        return view('backend.order.show_order', compact('orders', 'customers', 'shipping', 'payments', 'orderDetails'));
    }

    function destroy($order_id){
        $orders = Order::find($order_id);
        $orders->delete();
        return back()->with('msg','Order Delete successfully');
    }

    function viewInvoiced($order_id){

        $orders = Order::find($order_id);
        $customers = Customer::find($orders->customer_id);
        $shipping = Shipping::find($orders->shipping_id);
        $orderDetails = OrderDetail::where('order_id', $orders->order_id)->first();
        return view('backend.order.show_order_invoiced', compact('orders', 'customers', 'shipping', 'orderDetails'));
    }

    function downloadInvoiced($order_id){
        $orders = Order::find($order_id);
        $customers = Customer::find($orders->customer_id);
        $shipping = Shipping::find($orders->shipping_id);
        $orderDetails = OrderDetail::where('order_id', $orders->order_id)->first();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('backend.order.downloadInvoiced',compact('orders', 'customers', 'shipping', 'orderDetails'));

        return $pdf->download('OrderInvoiced.pdf',);
    }
}
