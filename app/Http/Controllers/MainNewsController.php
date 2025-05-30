<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\News;
use Illuminate\Http\Request;

class MainNewsController extends Controller
{
    public function search(Request $request) {
        $search = $request->search;
        $contacts = Contact::first();
        $news = News::where(function($query) use ($search){
            $query->where('judul', 'LIKE', "%$search%");
        })->get();

        return view('FrontEnd.news', compact('news', 'contacts'));
    }

    public function artikel(News $news) {
        $contacts = Contact::first();
        return view('FrontEnd.artikel', compact('news', 'contacts'));
    }
}
