<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    {
        $pageTitle = 'Kategori';
        return view("admin.kategori.index",compact('pageTitle'));
    }
}