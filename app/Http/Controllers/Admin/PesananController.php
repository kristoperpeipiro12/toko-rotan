<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    public function kemas()
    {
        $pageTitle="Pesanan Dikemas";
        return view('admin.pesanan.dikemas.index', compact('pageTitle'));

    }
     public function kirim()
    {
        $pageTitle = "Pesanan Dikirim";
        return view('admin.pesanan.dikirim.index', compact('pageTitle'));

    }
     public function konfirmasi()
    {
        $pageTitle = "Pesanan Konfirmasi";
        return view("admin.pesanan.konfirmasi.index", compact('pageTitle'));

    }
     public function selesai()
    {
        $pageTitle = "Pesanan Selesai";
        return view("admin.pesanan.selesai.index",compact('pageTitle'));

    }
}