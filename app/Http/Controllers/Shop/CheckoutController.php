<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('shop.co');
    }

    public function store($id)
    {
        return redirect()->route('shop.co');
    }
}
