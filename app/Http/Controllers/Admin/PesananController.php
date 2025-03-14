<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;

class PesananController extends Controller
{
    public function index()
    {
        $pageTitle = "Pesanan";
        $checkout = Checkout::where('status', 'diproses')->get();
        return view('admin.pesanan.index', compact('pageTitle', 'checkout'));
    }



}
