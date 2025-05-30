<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function create() {
        return view('admin.Testimony.create');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|mimes:png,jpg,jpeg',
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($this->divError($value)) {
                        $fail('Deskripsi tidak dapat diisi tag div.');
                    }
                },
                'max:550'
            ]
        ],
        [
            'name.required' => 'Harap Nama diisi',
            'name.max' => 'Nama Paling Maksimal 255 Karakter',
            'image.required' => 'Gambar Harap Diisi',
            'image.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'description.required' => 'Deskripsi Harap Diisi',
            'description.max' => 'Deskripsi Maksimal 550 Karakter',
        ]);

        $image = $request->file('image');
        $imgName = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path("img"), $imgName);

        Testimony::create([
            "image" => $imgName,
            "name" =>$request->input('name'),
            "description" =>$request->input('description'),
        ]);

        return redirect()->route('testimony.home')->with('success', 'Data telah berhasil disimpan!');
    }

    public function delete(Testimony $testimony) {
        $count = Testimony::count();

        if($count <= 3) {
            return redirect()->route('testimony.home')->with('success', 'Data gagal dihapus! Tidak boleh kurang dari 3 data!');
        }

        $oldImage = public_path('img/' . $testimony->image);
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        $testimony->delete();
        return redirect()->route('testimony.home')->with('success', 'Data telah berhasil dihapus!');
    }

    public function edit(Testimony $testimony) {
        return view('admin.Testimony.update', compact(['testimony']));
    }

    public function update(Request $request, Testimony $testimony) {

        $request->validate([
            'name' => 'required|max:255',
            'image' => 'mimes:png,jpg,jpeg',
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($this->divError($value)) {
                        $fail('Deskripsi tidak dapat diisi tag div.');
                    }
                },
                'max:550'
            ]
        ],
        [
            'name.required' => 'Harap Nama diisi',
            'name.max' => 'Nama Paling Maksimal 255 Karakter',
            'image.required' => 'Gambar Harap Diisi',
            'image.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'description.required' => 'Deskripsi Harap Diisi',
            'description.max' => 'Deskripsi Maksimal 550 Karakter',
        ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imgName = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path("img"), $imgName);

            if(!is_null($testimony->image)) {
                $oldImage = public_path('img/' . $testimony->image);
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }
        }
        else {
            $imgName = $testimony->image;
        }

        $testimony->update([
            "image" => $imgName,
            "name" =>$request->input('name'),
            "description" =>$request->input('description'),
        ]);

        $testimony->save();
        return redirect()->route('testimony.home')->with('success', 'Data telah berhasil diperbarui!');
    }

    public function search(Request $request) {
        $search = $request->search;
        $testimony = Testimony::where(function($query) use ($search){
            $query->where('name', 'LIKE', "%$search%");
        })->paginate(10);

        return view('admin.testimony', compact('testimony'));
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
