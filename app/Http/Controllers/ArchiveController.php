<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    public function create() {
        return view('admin.Archive.create');
    }

    public function store(Request $request) {
        $request->validate([
            'stone' => 'required|mimes:png,jpg,jpeg|max:40960',
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($this->containsForbiddenContent($value)) {
                        $fail('Deskripsi tidak dapat diisi gambar, video, tabel, warna font, atau daftar dalam 150 karakter pertama');
                    }
                },
                'min:150',
                function ($attribute, $value, $fail) {
                    if ($this->divError($value)) {
                        $fail('Deskripsi tidak dapat diisi tag div.');
                    }
                }
            ]
        ],
        [
            'stone.required' => 'Gambar Harap Diisi',
            'stone.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'stone.max' => 'Ukuran Gambar Maksimal 40Mb',
            'description.required' => 'Deskripsi Harap Diisi',
            'description.min' => 'Deskripsi Minimal 150 Karakter'
        ]);

        $stone = $request->file('stone');
        $stoneName = time() . '_' . $stone->getClientOriginalName();
        $stone->move(public_path("img"), $stoneName);
        $type = 'image';

        Archive::create([
            'stone' => $stoneName,
            'type' => $type,
            'description' => $request->input('description'),
        ]);

        return redirect()->route('archive.home')->with('success', 'Data telah berhasil disimpan!');
    }

    public function delete(Archive $archive) {
        $count = Archive::where('type', 'LIKE', 'image')->count();

        if ($count <= 4) {
            return redirect()->route('news.home')->with('success', 'Data gagal dihapus! Tidak boleh kurang dari 4 data!');
        }

        $oldImage = public_path('img/' . $archive->stone);
        unlink($oldImage);

        $archive->delete();
        return redirect()->route('archive.home')->with('success', 'Data telah berhasil dihapus!');
    }

    public function edit(Archive $archive) {
        return view('admin.Archive.update', compact('archive'));
    }

    public function update(Request $request, Archive $archive) {
        $request->validate([
            'stone' => 'mimes:png,jpg,jpeg|max:40960',
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($this->containsForbiddenContent($value)) {
                        $fail('Deskripsi tidak dapat diisi gambar, video, tabel, warna font, atau daftar dalam 170 karakter pertama');
                    }
                },
                'min:150',
                function ($attribute, $value, $fail) {
                    if ($this->divError($value)) {
                        $fail('Deskripsi tidak dapat diisi tag div.');
                    }
                }
            ]
        ],
        [
            'stone.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'stone.max' => 'Ukuran Gambar Maksimal 40Mb',
            'description.required' => 'Deskripsi Harap Diisi',
            'description.min' => 'Deskripsi Minimal 150 Karakter'
        ]);

        if ($request->hasFile('stone')) {
            $stone = $request->file('stone');
            $stoneName = time() . '_' . $stone->getClientOriginalName();
            $stone->move(public_path("img"), $stoneName);
            $type = 'image';


            $oldImage = public_path('img/' . $archive->stone);
            unlink($oldImage);

            $archive->update([
                'stone' => $stoneName,
                'type' => $type,
                'description' => $request->input('description'),
            ]);

        } else {
            $archive->update([
                'description' => $request->input('description'),
            ]);
        }
        $archive->save();
        return redirect()->route('archive.home')->with('success', 'Data telah berhasil diperbarui!');
    }

    public function search(Request $request) {
        $search = $request->search;
        $archives = Archive::where(function($query) use ($search){
            $query->where('description', 'LIKE', "%$search%")
                ->where('type', 'LIKE', 'image');
        })->paginate(10);

        return view('admin.photo', compact('archives'));
    }

    private function containsForbiddenContent($value)
    {
        // Get the first 50 characters of the input
        $substring = mb_substr($value, 0, 150);

        // Check if any forbidden content exists in the substring
        $forbiddenContent = ['<img', '<video', '<font', '<ol', '<ul', '<tr', '<td', ];
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
