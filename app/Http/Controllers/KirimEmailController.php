<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KirimEmailController extends Controller
{
    public function index(){
        $pageTitle='Pesanan';
        return view('admin.pesanan.index',compact('pageTitle'));

    }

    public function sendOrderConfirmation()
    {
        // Get the currently logged-in user
        $user = auth()->user();

        // Send the email
        Mail::to($user->email)->send(new OrderConfirmation());

        // Optionally, you can redirect back or to a success page
        return redirect()->route('shop.home')->with('success', 'Email konfirmasi pesanan telah dikirim.');

    }
}
