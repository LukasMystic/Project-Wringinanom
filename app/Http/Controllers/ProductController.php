<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SelectedProducts;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function create() {
        $categories = Category::all();
        return view('admin.Ecommerce.create', compact('categories'));
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($this->containsForbiddenContent($value)) {
                        $fail('Deskripsi tidak dapat diisi gambar, video, tabel, warna font, atau daftar dalam 170 karakter pertama');
                    }
                },
                'min:170',
                function ($attribute, $value, $fail) {
                    if ($this->divError($value)) {
                        $fail('Deskripsi tidak dapat diisi tag div.');
                    }
                }
            ],
            'price' => 'required|integer|digits_between:3,11',
        ],
        [
            'name.required' => 'Nama Harap Diisi',
            'name.max' => 'Nama Paling Maksimal 255 Karakter',
            'image.required' => 'Gambar Harap Diisi',
            'image.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'description.required' => 'Deskripsi Harap Diisi',
            'description.min' => 'Deskripsi Paling Minimal 170 Karakter',
            'price.required' => 'Harga Harap Diisi',
            'price.integer' => 'Harap Masukkan Angka',
            'price.digits_between' => 'Harap Masukan Harga Antara 1 dan 3 digit'
        ]);

        $image = $request->file('image');
        $imgName = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path("img"), $imgName);

        Product::create([
            "image" => $imgName,
            "category_id" =>$request->input('category_id'),
            "name" =>$request->input('name'),
            "description" =>$request->input('description'),
            "price" =>$request->input('price'),
        ]);

        return redirect()->route('product.home')->with('success', 'Data telah berhasil disimpan!');
    }

    public function delete(Product $product) {
        $count = Product::count();
        $IdShowns = SelectedProducts::pluck('products_id');

        if($IdShowns->contains($product->id)) {
            return redirect()->route('product.home')->with('success', 'Data gagal dihapus! Tidak boleh yang ditampilkan di Homepage!');
        }

        if($count <= 3) {
            return redirect()->route('product.home')->with('success', 'Data gagal dihapus! Tidak boleh kurang dari 3 data!');
        }

        $oldImage = public_path('img/' . $product->image);
        unlink($oldImage);

        $product->delete();
        return redirect()->route('product.home')->with('success', 'Data telah berhasil dihapus!');
    }

    public function edit(Product $product) {
        $categories = Category::all();
        return view('admin.Ecommerce.update', compact(['product', 'categories']));
    }

    public function update(Request $request, Product $product) {

        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($this->containsForbiddenContent($value)) {
                        $fail('Deskripsi tidak dapat diisi gambar, video, tabel, warna font, atau daftar dalam 170 karakter pertama');
                    }
                },
                'min:170',
                function ($attribute, $value, $fail) {
                    if ($this->divError($value)) {
                        $fail('Deskripsi tidak dapat diisi tag div.');
                    }
                }
            ],
            'price' => 'required|integer|digits_between:3,11'
        ],
        [
            'name.required' => 'Nama Harap Diisi',
            'name.max' => 'Nama Paling Maksimal 255 Karakter',
            'image.required' => 'Gambar Harap Diisi',
            'image.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'description.required' => 'Deskripsi Harap Diisi',
            'description.min' => 'Deskripsi Paling Minimal 170 Karakter',
            'price.required' => 'Harga Harap Diisi',
            'price.integer' => 'Harap Masukkan Angka',
            'price.digits_between' => 'Harap Masukan Harga Antara 1 dan 3 digit'
        ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imgName = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path("img"), $imgName);

            $oldImage = public_path('img/' . $product->image);
            unlink($oldImage);
        }
        else {
            $imgName = $product->image;
        }

        $product->update([
            "image" => $imgName,
            "category_id" =>$request->input('category_id'),
            "name" =>$request->input('name'),
            "description" =>$request->input('description'),
            "price" =>$request->input('price'),
        ]);

        $product->save();
        return redirect()->route('product.home')->with('success', 'Data telah berhasil diperbarui!');
    }

    public function search(Request $request) {
        $categories = Category::all();
        $search = $request->search;
        $products = Product::where(function($query) use ($search){
            $query->where('name', 'LIKE', "%$search%");
        })->paginate(10);

        $products->appends(['search' => $search]);

        return view('admin.eccomerce', compact('products', 'categories'));
    }

    public function category (Category $category) {
        $categories = Category::all();
        $search = $category->name;
        $products = Product::whereHas('category', function($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%");
        })->paginate(10);

        $products->appends(['search' => $search]);

        return view('admin.eccomerce', compact('products', 'categories'));
    }

    private function containsForbiddenContent($value)
    {
        // Get the first 50 characters of the input
        $substring = mb_substr($value, 0, 170);

        // Check if any forbidden content exists in the substring
        $forbiddenContent = ['<img', '<video', '<font', '<ol', '<ul', '<tr', '<td'];
        foreach ($forbiddenContent as $content) {
            if (stripos($substring, $content) !== false) {
                return true;
            }
        }

        return false;
    }

    private function divError($value)
    {
        $forbiddenContent = ['<div'];
        foreach ($forbiddenContent as $content) {
            if (stripos($value, $content) !== false) {
                return true;
            }
        }

        return false;
    }
}
