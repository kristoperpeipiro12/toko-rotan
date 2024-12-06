<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function index(){
        $pageTitle= 'Produk';
        return view('admin.kategori.index',compact('pageTitle'));
   }
}