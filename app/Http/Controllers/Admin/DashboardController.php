<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $pageTitle = 'Dashboard';
        return view("admin.dashboard.index",compact('pageTitle'));
        // return view(view: "admin.dashboard.index");

    }
}