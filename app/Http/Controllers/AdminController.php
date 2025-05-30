<?php

namespace App\Http\Controllers;

use App\Models\Adventure;
use App\Models\Archive;
use App\Models\Category;
use App\Models\Edukasi;
use App\Models\News;
use App\Models\Product;
use App\Models\River;
use App\Models\SelectedNews;
use App\Models\SelectedProducts;
use App\Models\Testimony;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ecommerce()
    {
        $products = Product::paginate(10);
        $categories = Category::all();
        return view('admin.eccomerce', compact('products', 'categories'));
    }

    public function news()
    {
        $news = News::paginate(10);
        return view('admin.news', compact('news'));
    }

    public function aboutUs()
    {
        return view('admin.aboutUs');
    }

    public function river()
    {
        $river = River::paginate(10);
        return view('admin.river', compact('river'));
    }

    public function adventure()
    {
        $adventure = Adventure::paginate(10);
        return view('admin.adventure', compact('adventure'));
    }

    public function edukasi()
    {
        $edukasi = Edukasi::paginate(10);
        return view('admin.edukasi', compact('edukasi'));
    }

    public function contact()
    {
        return view('admin.contact');
    }

    public function archive()
    {
        $archives = Archive::where('type', 'LIKE', 'image')->paginate(10);
        return view('admin.photo', compact('archives'));
    }

    public function viewCategory() {
        $categories = Category::paginate(10);
        return view ('admin.category', compact('categories'));
    }

    public function testimony()
    {
        $testimony = Testimony::paginate(10);
        return view('admin.testimony', compact('testimony'));
    }

    public function dashboard() {
        $news = News::all();
        return view('admin.HomepageNews', compact('news'));
    }

    public function homepageProduct() {
        $products = Product::all();
        return view('admin.HomepageProduct', compact('products'));
    }


    public function video() {
        $archives = Archive::where('type', 'LIKE', 'video')->paginate(10);
        return view('admin.video', compact('archives'));
    }

    public function storeNews(Request $request) {

        $selectedNews = $request->input('selectedNews', []);

        if (count($selectedNews) !== 3) {
            return redirect()->back()->with('notif', 'Harus memilih 3 berita!');
        }

        foreach ($selectedNews as $key => $newsId) {
            $existingSelectedNews = SelectedNews::find($key + 1);

            if ($existingSelectedNews) {
                $existingSelectedNews->update(['news_id' => $newsId]);
            } else {
                SelectedNews::create(['news_id' => $newsId]);
            }
        }

        return redirect()->back()->with('notif', 'Data berhasil diperbarui!');
    }

    public function storeProducts(Request $request) {

        $selectedProducts = $request->input('selectedProducts', []);

        if (count($selectedProducts) !== 2) {
            return redirect()->back()->with('notif', 'Harus memilih 2 produk!');
        }

        foreach ($selectedProducts as $key => $productsId) {
            $existingSelectedProducts = SelectedProducts::find($key + 1);

            if ($existingSelectedProducts) {
                $existingSelectedProducts->update(['products_id' => $productsId]);
            } else {
                SelectedProducts::create(['products_id' => $productsId]);
            }
        }

        return redirect()->back()->with('notif', 'Data berhasil diperbarui!');
    }
}
