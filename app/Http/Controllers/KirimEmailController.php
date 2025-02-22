<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KirimEmailController extends Controller
{
    public function index(){
        $pageTitle='Pesanan';
        return view('admin.pesanan.index',compact('pageTitle'));
    }
}
