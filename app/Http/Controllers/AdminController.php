<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Logika untuk halaman dashboard admin
        return view('admin.dashboard');
    }
}
