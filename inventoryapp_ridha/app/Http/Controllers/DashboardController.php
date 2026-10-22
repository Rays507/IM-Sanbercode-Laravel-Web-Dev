<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //funsi untuk menampilkan halaman home
    public function home()
    {
        return view('home');
    }
}
