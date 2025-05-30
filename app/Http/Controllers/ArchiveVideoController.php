<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;

class ArchiveVideoController extends Controller
{
    public function create() {
        return view('admin.Archive.createVideo');
    }

    public function store(Request $request) {
        $request->validate([
            'video' => 'required|mimes:mp4|max:40960',
            'gambar' => 'required|mimes:png,jpg,jpeg',
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
            'video.required' => 'Video Harap Diisi',
            'Video.mimes' => 'Extension Video Harap mp4',
            'video.max' => 'Ukuran Video Maksimal 40Mb',
            'gambar.required' => 'Gambar Harap Diisi',
            'gambar.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'description.required' => 'Deskripsi Harap Diisi',
            'description.min' => 'Deskripsi Minimal 150 Karakter'
        ]);

        $stone = $request->file('video');
        $stoneName = time() . '_' . $stone->getClientOriginalName();

        $gambar = $request->file('gambar');
        $gambarName = time() . '_' . $gambar->getClientOriginalName();

        $stone->move(public_path("videos"), $stoneName);
        $gambar->move(public_path("img"), $gambarName);

        Archive::create([
            'stone' => $stoneName,
            'gambar' => $gambarName,
            'type' => 'video',
            'description' => $request->input('description'),
        ]);

        return redirect()->route('archive.home.video')->with('success', 'Data telah berhasil disimpan!');
    }

    public function edit(Archive $archive) {
        return view('admin.Archive.updateVideo', compact('archive'));
    }

    public function update(Request $request, Archive $archive) {
        $request->validate([
            'video' => 'mimes:mp4|max:40960',
            'thumbnail' => 'mimes:png,jpg,jpeg',
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

            'Video.mimes' => 'Extension Video Harap mp4',
            'video.max' => 'Ukuran Video Maksimal 40Mb',

            'thumbnail.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'description.required' => 'Deskripsi Harap Diisi',
            'description.min' => 'Deskripsi Minimal 150 Karakter'
        ]);


        $videoName = $archive->stone;
        $thumbnailName = $archive->gambar;

        if ($request->hasFile('video')) {
            $stone = $request->file('video');
            $videoName = time() . '_' . $stone->getClientOriginalName();
            $stone->move(public_path("videos"), $videoName);
            $oldstone = storage_path('videos/' . $archive->stone);
            if (is_file($oldstone)) {
                unlink($oldstone);
            }
        }

        if ($request->hasFile('thumbnail')) {
            $stone = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $stone->getClientOriginalName();
            $stone->move(public_path("img"), $thumbnailName);

            $oldstone = public_path('img/' . $archive->gambar);

            if (is_file($oldstone)) {
                unlink($oldstone);
            }
        }

        $archive->update([
            'stone' => $videoName,
            'gambar' => $thumbnailName,
            'description' => $request->input('description'),
        ]);

        $archive->save();
        return redirect()->route('archive.home.video')->with('success', 'Data telah berhasil diperbarui!');
    }

    public function search(Request $request) {
        $search = $request->search;
        $archives = Archive::where(function($query) use ($search){
            $query->where('description', 'LIKE', "%$search%")
                ->where('type', 'LIKE', 'video');
        })->paginate(10);

        return view('admin.video', compact('archives'));
    }

    public function delete(Archive $archive) {
        $count = Archive::where('type', 'LIKE', 'video')->count();

        if ($count <= 4) {
            return redirect()->route('news.home')->with('success', 'Data gagal dihapus! Tidak boleh kurang dari 4 data!');
        }

        $oldImage = public_path('img/' . $archive->thumbnail);
        $oldVideo = public_path('videos/' . $archive->stone);

        if (is_file($oldImage)) {
            unlink($oldImage);
        }

        if (is_file($oldVideo)) {
            unlink($oldVideo);
        }

        $archive->delete();
        return redirect()->route('archive.home.video')->with('success', 'Data telah berhasil dihapus!');
    }

    private function containsForbiddenContent($value)
    {
        // Get the first 50 characters of the input
        $substring = mb_substr($value, 0, 150);

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
