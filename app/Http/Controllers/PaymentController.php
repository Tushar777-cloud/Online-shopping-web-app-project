<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function esewaRequest(Request $request, Order $order)
    {
        $tAmt = $order->total;
        $pid = $order->id;
        $scd = config('services.esewa.merchant_id', 'EPAYTEST');
        $su = route('payment.esewa.success', $order);
        $fu = route('payment.esewa.failure', $order);

        return view('payment.esewa', compact('tAmt', 'pid', 'scd', 'su', 'fu'));
    }

    public function esewaSuccess(Request $request, Order $order)
    {
        $url = config('services.esewa.test_mode', true) 
            ? "https://uat.esewa.com.np/epay/transrec" 
            : "https://esewa.com.np/epay/transrec";

        $response = Http::get($url, [
            'amt' => $request->amt,
            'pid' => $request->pid,
            'scd' => config('services.esewa.merchant_id', 'EPAYTEST'),
            'rid' => $request->rid,
        ]);

        if (strpos($response->body(), 'Success') !== false) {
            $order->update(['payment_status' => 'paid', 'status' => 'processing']);
            return redirect()->route('orders.show', $order)->with('success', 'Payment successful!');
        }

        return redirect()->route('orders.show', $order)->with('error', 'Payment verification failed');
    }

    public function esewaFailure(Order $order)
    {
        $order->update(['payment_status' => 'failed']);
        return redirect()->route('cart.index')->with('error', 'Payment failed. Please try again.');
    }
}