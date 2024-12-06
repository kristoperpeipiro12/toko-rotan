<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DataWilayahController extends Controller
{
    public function index()
    {
        $pageTitle = "Data Wilayah";
        return view("admin.datawilayah.index",compact('pageTitle'));
    }
    public function create(){
        $pageTitle = "Tambah - Data Wilayah";
        return view("admin.datawilayah.create",compact('pageTitle'));
    }
}