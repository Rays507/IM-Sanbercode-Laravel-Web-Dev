<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\User;
use App\Models\Users;
use App\Models\Transaction;
use carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == "admin")
            {
                $showDataTransaksi = Transaction::with(['user', 'product'])->get();
            }else{
                $showDataTransaksi = Transaction::with(['user', 'product'])->where('user_id', $user->id)->get();
            }
        
            return view('transaction.showTransaction', ['transactions' => $showDataTransaksi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Products::get();
        // $userCount = Users::count();

        return view('transaction.createTransaction', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $inputanUser)
    {
        
        $inputanUser->validate([
            'amount' => 'required|numeric',
            'notes' => 'required',
            'product_id' => 'required|numeric',
            'type' => 'required'

        ],
        [
            "required"=>"inputan wajib diisi",
            "product_id.required" => 'Silakan pilih produk terlebih dahulu!',
            "type.required" => 'Silakan pilih type produk terlebih dahulu!',
            "numeric"=>"inputan harus berupa number"
        ]);

        $transaction = new transaction;

        //buat variable dengan data yang penting
        //variable penampung inputan type
        $type = $inputanUser->input('type');
        //variable penampung inputan id_produk dari data produk yang terpilih
        $idProdukSelected = $inputanUser->input('product_id');
        //variable penampung inputan stock
        $stokInputan = $inputanUser->input('amount');
        //variable penampung data id user yang sedanga aktif
        $dataIdNow = Auth::id();

        $transaction -> type = $type;
        $transaction -> product_id = $idProdukSelected;
        $transaction -> user_id = $dataIdNow;
        $transaction -> amount = $stokInputan;
        $transaction -> notes = $inputanUser->input('notes');

        $transaction->save();
        
        //saat klik submit maka akan men-triger untuk update data pada table produk->stock

        $dataProdukByIdSelected = Products::find($idProdukSelected);
        //variable penampung data stock yang diambil table products->stock
        $stockProductNow = $dataProdukByIdSelected->stock;

        //if in maka tambah(increment) if out maka kurang(decrement)
        if ($type === "In")
            {
                $dataProdukByIdSelected->increment('stock', $stokInputan);

            }elseif($type === "Out" && $stokInputan <= $stockProductNow)
                //jika stok inputan lebih kecil dari stok sekarang maka kurangi
            {
                $dataProdukByIdSelected->decrement('stock', $stokInputan);
            }else {
                return redirect()->back()
                    ->withErrors(['amount' => 'Stok yang OUT melebihi stok yang ada'])
                    ->withInput();
            }

            return redirect('/transaction')->with('success', 'Transaksi berhasil disimpan dan stok produk berhasil di update');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataTableCTransaction = DB::table('transaction')->get();//get data di table categories
        return view('categories.showTransaction', ["categories" => $dataTableCTransaction]);//kirim data table categories ke view showDataCategories
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
