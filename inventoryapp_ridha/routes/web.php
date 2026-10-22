<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;


//perintah rounte untuk menamngkap fungsi home yang ada di dalam kelas DashboardController untuk menampilkan halaman home
route::get('/', [DashboardController::class, 'home']);

//perintah rounte untuk menangkap fungsi register yang ada di dalam kelas FormController untuk menampilkan halaman register
route::get('/register', [FormController::class, 'register']);

//perintah rounte untuk menangkap fungsi welcome dengan metode "GET" yang ada di dalam kelas FormConttroller untuk menampilkan halaman welcome
route::get('/welcome', [FormController::class, 'welcome']);

//perintah rounte untuk menangkap fungsi welcome dengan metode "POST" yang ada di dalam kelas FormConttroller untuk menampilkan halaman welcome
route::post('/ambilDataRegister', [FormController::class, 'ambilDataRegister']);
