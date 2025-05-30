<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory() {
        return view('admin.Ecommerce.createCategory');
    }

    public function storeCategory(Request $request) {
        $request->validate([
            'category' => 'required|max:255'
        ],
        [
            'category.required' => 'Kategori Harap Diisi',
            'category.max' => 'Nama Kategori Maksimal 255 Karakter'
        ]);

        $category = new Category();
        $category->name = $request->input('category');
        $category->save();

        return redirect()->route('category.home')->with('success', 'Data telah berhasil disimpan!');
    }

    public function edit(Category $category) {
        return view('admin.Ecommerce.updateCategory', compact('category'));
    }

    public function update(Request $request, Category $category) {

        $request->validate([
            'category' => 'required|max:255'
        ],
        [
            'category.required' => 'Kategori Harap Diisi',
            'category.max' => 'Nama Kategori Maksimal 255 Karakter'
        ]);

        $category->update([
            "name" => $request->input('category')
        ]);

        return redirect()->route('category.home')->with('success', 'Data telah berhasil diperbarui!');
    }

    public function delete(Category $category) {

        $count = Category::count();

        if($count <= 1) {
            return redirect()->route('category.home')->with('success', 'Data gagal dihapus! Tidak boleh kurang dari 1 data!');
        }

        $category->delete();
        return redirect()->route('category.home')->with('success', 'Data telah berhasil dihapus!');
    }
}
