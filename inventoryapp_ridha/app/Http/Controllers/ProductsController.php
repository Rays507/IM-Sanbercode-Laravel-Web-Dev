<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProductsController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('admin', except: ['index','show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::get();
        $categories = categories::get();
        return view('products.IndexDataProduct', ['products' => $products], ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();


        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $inputanUser)
    {
        $inputanUser->validate([
            'name' => 'required|min:5',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric'

        ],
        [
            "required"=>"inputan wajib diisi",
            'category_id.required' => 'Silakan pilih kategori produk terlebih dahulu!',
            "min"=>"inputan minimal :min karakter",
            "numeric"=>"inputan harus berupa number",
            "mimes"=>"gambar yang diupload harus .png/.jpg/.jpeg",
            "max"=>"ukuran file gambar max 2048"
        ]);

        $dataGambar = time().'.'.$inputanUser->image->extension();
        $inputanUser->image->move(public_path('image'),$dataGambar);

        $products = new products;

        $products -> name = $inputanUser->input('name');
        $products -> image = $dataGambar;
        $products -> description = $inputanUser->input('description');
        $products -> stock = $inputanUser->input('stock');
        $products -> price = $inputanUser->input('price');
        $products -> category_id = $inputanUser->input('category_id');

        $products->save();

        return redirect('/products')->with('success', 'Data product dengan nama '.$inputanUser->name.' Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cekDetailData = products::find($id);

        return view ('products.detail', ['product' => $cekDetailData]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $getDataById = products::find($id);
        $getDataCategories = categories::get();

        return view ('products.edit', ['product' => $getDataById], ['categories'=>$getDataCategories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $inputanUser, string $id)
    {
        $inputanUser->validate([
            'name' => 'required|min:5',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric'

        ],
        [
            "required"=>"inputan wajib diisi",
            "min"=>"inputan minimal :min karakter",
            "numeric"=>"inputan harus berupa number",
            "mimes"=>"gambar yang diupload harus .png/.jpg/.jpeg",
            "max"=>"ukuran file gambar max 2048"
        ]);

        $product = products::find($id);

        $product -> name = $inputanUser->input('name');
        $product -> description = $inputanUser->input('description');
        $product -> stock = $inputanUser->input('stock');
        $product -> price = $inputanUser->input('price');
        $product -> category_id = $inputanUser->input('category_id');

        if ($inputanUser->hasFile('image')) 
            {
                if($product->image)
                    {
                        if (File::exists(public_path('image/'.$product->image)))
                            {
                                File::delete(public_path('image/'.$product->image));
                            }
                    }

                    $dataGambar = time().'.'.$inputanUser->image->extension();

                    $inputanUser->image->move(public_path('image'),$dataGambar);

                    $product->image = $dataGambar;
            }

        

        $product->save();

        return redirect('/products')->with('success', 'Data products dengan id '.$product->id.' Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = products::find($id);

        if($product->image)
            {
                if (File::exists(public_path('image/'.$product->image)))
                        {
                            File::delete(public_path('image/'.$product->image));
                        };
            }

        $product->delete();

        return redirect('/products')->with('success', 'Data products dengan nama '.$product->name.' Berhasil Dihapus');
    }
}
