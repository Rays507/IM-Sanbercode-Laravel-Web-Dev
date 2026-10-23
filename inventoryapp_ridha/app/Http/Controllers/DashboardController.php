<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //funsi untuk menampilkan halaman index
    public function index()
    {
        return view('home');
    }
}
