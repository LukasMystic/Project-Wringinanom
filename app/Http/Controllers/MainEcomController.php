<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class MainEcomController extends Controller
{
    public function search(Request $request) {
        $search = $request->search;
        $contacts = Contact::first();

        $categories = Category::with(['products' => function ($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%");
        }])->has('products')->get();

        return view('FrontEnd.e_commerce', compact('categories', 'contacts'));
    }
}
