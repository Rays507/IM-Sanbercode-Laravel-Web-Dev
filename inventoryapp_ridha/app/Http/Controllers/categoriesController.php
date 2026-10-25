<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;//untuk menangkap data yang dikirimkan melalui form categories
use Illuminate\Support\Facades\DB;//untuk mengakses database inventoryapp
use carbon\Carbon;//untuk mengambil data tanggal dan waktu sekarang

class categoriesController extends Controller
{
    

    public function create()
    {
        return view('categories.formAddData');
    }

    public function categories(request $postRequest)
    {
        //validasi data inputan
        $postRequest->validate([
            'name' => ['required', 'min:5'],//validasi inputan name harus diisi dan minimal 5 karakter
            'description' => ['required']//validasi inputan description harus diisi
        ],
        [
            "required"=>"inputan wajib diisi",//kata error jika validasi inputan tidak terisi
            "min"=>"inputan :attribute minimal :min karakter"//kata error jika validasi inputan tidak memenuhi minimal 5 karakter
        ]);
        //getData Inputan
        $dataPostInputan = $postRequest->all();
        //Detailkan data inputan
        $dataNameCategories = $dataPostInputan['name'];
        $dataDescriptionCategories = $dataPostInputan['description'];
        $dataWaktuSekarang = Carbon::now();//get waktu sekarang

        //inputkan data ke dalam database
        DB::table('categories')->insert([
            'name' => $dataNameCategories,
            'description' => $dataDescriptionCategories,
            'created_at' => $dataWaktuSekarang,
            'updated_at' => $dataWaktuSekarang
        ]);

        return redirect('/categories')->with('success', 'Data Categories Berhasil Ditambahkan');
    }

    //kelas untuk show data categories
    public function showDataCategories()
    {
        $dataTableCategories = DB::table('categories')->get();//get data di table categories
        return view('categories.showDataCategories', ["categories" => $dataTableCategories]);//kirim data table categories ke view showDataCategories
    }

    //kelas untuk get data id categories
    public function getDataIDCategories($id)
    {
        $dataTableIDCategories = DB::table('categories')->find($id);//cari data ID di table categories
        
        return view('categories.detailDataCategories', ["dataIDDetailCategories" => $dataTableIDCategories]);
    }

    public function getDataIDCategoriesForEdit($id)
    {
        $dataTableIDCategories = DB::table('categories')->find($id);
        return view('categories.editDataCategories', ["dataIDDetailCategoriesForEdit" => $dataTableIDCategories]);
    }

    public function updateDataByIdCategories(request $postRequest,$id)
    {
        
            $postRequest->validate([
            'name' => ['required', 'min:5'],//validasi inputan name harus diisi dan minimal 5 karakter
            'description' => ['required']//validasi inputan description harus diisi
        ],
        [
            "required"=>"inputan wajib diisi",//kata error jika validasi inputan tidak terisi
            "min"=>"inputan :attribute minimal :min karakter"//kata error jika validasi inputan tidak memenuhi minimal 5 karakter
        ]);
        //getData Inputan
        $dataPostInputan = $postRequest->all();
        //Detailkan data inputan
        $dataNameCategories = $dataPostInputan['name'];
        $dataDescriptionCategories = $dataPostInputan['description'];
        $dataWaktuSekarang = Carbon::now();//get waktu sekarang

        //inputkan data untuk di update ke dalam database
        DB::table('categories')
        ->where('id',$id)
        ->update([
            'name' => $dataNameCategories,
            'description' => $dataDescriptionCategories,
            'updated_at' => $dataWaktuSekarang
        ]);


        return redirect('/categories')->with('success', 'Data Categories dengan nama '.$dataNameCategories.' Berhasil Diupdate');
    }

    public function deleteDataByIdCategories($id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->delete();
        return redirect('/categories')->with('success', 'Data Categories Berhasil Dihapus');

    }
    
}
