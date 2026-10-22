<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //fungsi untuk menampilkan halaman register
    public function register()
    {
        return view('register');
    }

    //fungsi untuk menampilkan halaman welcome
    public function welcome()
    {
        return view('welcome');
    }

    // fungsi untuk menangkap data yang dikirimkan melalui form register dan menampilkannya di halaman welcome.php
    public function ambilDataRegister(request $postRequest)
    {   
        //cek semua data yang dikirimkan melalui form register ke halaman welcome
        // return $postRequest->all();
        //tangkap semua data di $dataPostRequest yang dikirimkan melalui form register
        $dataPostRequest = $postRequest->all();

        //potong data dari $dataPostRequest dan dibuatkan deklarasi variable untuk menampung data yang diinginkan
        $dataFirstName = $dataPostRequest['Firstname'];
        $dataLastName = $dataPostRequest['Lastname'];

        //tampilkan di halaman web welcome.php dan sematkan juga key dan nilainya
        return view('welcome', [
            'dataFirstName' => $dataFirstName,
            'dataLastName' => $dataLastName
        ]);
    }
}
