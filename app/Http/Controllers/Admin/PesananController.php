<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    public function kemas()
    {
        $pageTitle="Pesanan";
        return view('admin.pesanan.dikemas.index', compact('pageTitle'));

    }


}
