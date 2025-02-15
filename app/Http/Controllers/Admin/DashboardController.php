<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk_Varian;

class DashboardController extends Controller
{
    public function index()
    {
        $pageTitle = 'Dashboard';
        $stok = Produk_Varian::sum('stok');
        return view("admin.dashboard.index",compact('pageTitle','stok'));
        // return view(view: "admin.dashboard.index");

    }
}
