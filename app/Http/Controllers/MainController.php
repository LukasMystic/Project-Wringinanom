<?php

namespace App\Http\Controllers;

use App\Models\Adventure;
use App\Models\Archive;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Edukasi;
use App\Models\News;
use App\Models\Product;
use App\Models\River;
use App\Models\SelectedNews;
use App\Models\SelectedProducts;
use App\Models\Testimony;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard() {
        $selectedProducts = SelectedProducts::pluck('products_id')->toArray();
        $selectedNews = SelectedNews::pluck('news_id')->toArray();
        $contacts = Contact::first();

        $news = News::whereIn('id', $selectedNews)->get();
        $products = Product::whereIn('id', $selectedProducts)->get();

        return view('FrontEnd.homepage', compact('news', 'products', 'contacts'));
    }

    public function news() {
        $news = News::all();
        $contacts = Contact::first();
        return  view('FrontEnd.news', compact('news', 'contacts'));
    }

    public function archive(Request $request) {
        $firstVideo = Archive::where('type', 'LIKE', 'video')->latest()->first();
        $firstImage = Archive::where('type', 'LIKE', 'image')->latest()->first();

        $archives = Archive::orderBy('created_at', 'desc')->paginate(40);
        $contacts = Contact::first();

        return  view('FrontEnd.archive', compact('archives', 'firstVideo', 'firstImage', 'contacts'));
    }

    public function contact() {
        $contacts = Contact::first();
        $testimonies = Testimony::all();
        return view('FrontEnd.contact_us', compact('contacts', 'testimonies'));
    }

    public function river() {
        $rivers = River::all();
        $count = $rivers->count();
        $contacts = Contact::first();
        return view('FrontEnd.package_river', compact('rivers', 'count', 'contacts'));
    }

    public function adventure() {
        $adventures = Adventure::all();
        $count = $adventures->count();
        $contacts = Contact::first();
        return view('FrontEnd.package_adventure', compact('adventures', 'count', 'contacts'));
    }

    public function education() {
        $educations = Edukasi::all();
        $count = $educations->count();
        $contacts = Contact::first();
        return view('FrontEnd.package_edukasi', compact('educations', 'count', 'contacts'));
    }

    public function ecommerce() {
        $categories = Category::withCount('products')->get();
        $contacts = Contact::first();
        return view('FrontEnd.e_commerce', compact('categories', 'contacts'));
    }
}
