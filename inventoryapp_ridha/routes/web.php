<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\profilesController;
use App\Http\Controllers\authController;
use App\Http\Middleware\IsAdmin;


//perintah rounte untuk menamngkap fungsi home yang ada di dalam kelas DashboardController untuk menampilkan halaman home
route::get('/', [DashboardController::class, 'index'])->middleware('auth');

//perintah rounte untuk menangkap fungsi register yang ada di dalam kelas FormController untuk menampilkan halaman register
route::get('/register', [FormController::class, 'register']);

//perintah rounte untuk menangkap fungsi welcome dengan metode "POST" yang ada di dalam kelas FormConttroller untuk menampilkan halaman welcome
route::post('/welcome', [FormController::class, 'welcome']);

route::middleware(['auth',IsAdmin::class])->group(function()
{
    //CRUD table categories
//Create
route::post('/categories', [categoriesController::class, 'categories']);
route::get('/categories/create', [categoriesController::class, 'create']);

//read table
route::get('/categories', [categoriesController::class, 'showDataCategories']);
route::get('/categories/{id}', [categoriesController::class, 'getDataIDCategories']);//panggil fungsi get Data ID Category

//update row
route::get('categories/{id}/editDataCategories',[categoriesController::class, 'getDataIDCategoriesForEdit']);
route::put('categories/{id}', [categoriesController::class, 'updateDataByIdCategories']);

//Delete row
route::delete('/categories/{id}',[categoriesController::class, 'deleteDataByIdCategories']);
});




//CRUD table products
route::resource('/products',ProductsController::class);

//CRUD table users
route::resource('/users',usersController::class);

//CRUD table profile
route::resource('/profile',profileController::class);

route::middleware(['guest'])->group(function ()
{
    //auth
//page login
route::get('/login',[authController::class, 'formLogin']);
route::post('/login',[authController::class, 'login'])->name('login');
//page register
route::get('/createAccount',[authController::class, 'createAccount']);
route::post('/createAccount',[authController::class, 'signup']);
});

//logout
route::post('/logout',[authController::class, 'logout']);
