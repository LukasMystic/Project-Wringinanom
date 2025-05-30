<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Http\Request;

class EdukasiController extends Controller
{
    public function create() {
        return view('admin.Edukasi.create');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|mimes:png,jpg,jpeg',
            'price' => 'required|digits_between:3,11',
            'people' => 'required|integer|digits_between:1,3',
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($this->divError($value)) {
                        $fail('Deskripsi tidak dapat diisi tag div.');
                    }
                }
            ]
        ],
        [
            'name.required' => 'Harap Nama diisi',
            'name.max' => 'Nama Paling Maksimal 255 Karakter',
            'image.required' => 'Gambar Harap Diisi',
            'image.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'price.required' => 'Harga Harap Diiis',
            'price.digits_between' => 'Harga Diantara 3 dan 11 digit',
            'people.required' => 'Jumlah Orang Harap Diisi',
            'people.integer' => 'Harap Masukan Angka',
            'people.digits_between' => 'Harap Masukan Antara 1 dan 3 digit',
            'description.required' => 'Deskripsi Harap Diisi'
        ]);

        $image = $request->file('image');
        $imgName = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path("img"), $imgName);

        Edukasi::create([
            "image" => $imgName,
            "name" =>$request->input('name'),
            'price' => $request->input('price'),
            'people' => $request->input('people'),
            "description" =>$request->input('description'),
        ]);

        return redirect()->route('edukasi.home')->with('success', 'Data telah berhasil disimpan!');
    }

    public function delete(Edukasi $edukasi) {
        $count = Edukasi::count();

        if ($count <= 3) {
            return redirect()->route('news.home')->with('success', 'Data gagal dihapus! Tidak boleh kurang dari 3 data!');
        }

        $oldImage = public_path('img/' . $edukasi->image);
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        $edukasi->delete();
        return redirect()->route('edukasi.home')->with('success', 'Data telah berhasil dihapus!');
    }

    public function edit(Edukasi $edukasi) {
        return view('admin.Edukasi.update', compact(['edukasi']));
    }

    public function update(Request $request, Edukasi $edukasi) {

        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'price' => 'required|digits_between:3,11',
            'people' => 'required|integer|digits_between:1,3',
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($this->divError($value)) {
                        $fail('Deskripsi tidak dapat diisi tag div.');
                    }
                }
            ]
        ],
        [
            'name.required' => 'Harap Nama diisi',
            'name.max' => 'Nama Paling Maksimal 255 Karakter',
            'image.required' => 'Gambar Harap Diisi',
            'image.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'price.required' => 'Harga Harap Diiis',
            'price.digits_between' => 'Harga Diantara 3 dan 11 digit',
            'people.required' => 'Jumlah Orang Harap Diisi',
            'people.integer' => 'Harap Masukan Angka',
            'people.digits_between' => 'Harap Masukan Harga Antara 1 dan 3 digit',
            'description.required' => 'Deskripsi Harap Diisi'
        ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imgName = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path("img"), $imgName);

            if(!is_null($edukasi->image)) {
                $oldImage = public_path('img/' . $edukasi->image);
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }
        }
        else {
            $imgName = $edukasi->image;
        }

        $edukasi->update([
            "image" => $imgName,
            "name" =>$request->input('name'),
            'price' => $request->input('price'),
            'people' => $request->input('people'),
            "description" =>$request->input('description'),
        ]);

        $edukasi->save();
        return redirect()->route('edukasi.home')->with('success', 'Data telah berhasil diperbarui!');
    }

    public function search(Request $request) {
        $search = $request->search;
        $edukasi = Edukasi::where(function($query) use ($search){
            $query->where('name', 'LIKE', "%$search%");
        })->paginate(10);

        return view('admin.edukasi', compact('edukasi'));
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
