<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\SelectedNews;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function create() {
        return view('admin.News.create');
    }

    public function store(Request $request) {

        $request->validate([
            'judul' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'penulis' => 'required',
            'tanggal' => 'required|date_format:m/d/Y|before_or_equal:' . date('Y-m-d'),
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($this->containsForbiddenContent($value)) {
                        $fail('Deskripsi tidak dapat diisi gambar, video, tabel, warna font, atau daftar dalam 150 karakter pertama');
                    }
                },
                function ($attribute, $value, $fail) {
                    if ($this->divError($value)) {
                        $fail('Deskripsi tidak dapat diisi tag div.');
                    }
                },
            ]
        ],
        [
            'judul.required' => 'Judul Harap Diisi',
            'image.required' => 'Gambar Harap Diisi',
            'image.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'penulis.required' => 'Penulis Harap Diisi',
            'tanggal.required' => 'Tanggal Harap Diisi',
            'tanggal.date_format' => 'Tanggal Harap Diisi berdasarkan bulan/hari/tahun',
            'tanggal.before_or_equal' => 'Harap Masukkan Tanggal yang Valid',
            'description.required' => 'Deskripsi Harap Diisi'
        ]);

        $image = $request->file('image');
        $imgName = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path("img"), $imgName);

        $tanggal = Carbon::createFromFormat('m/d/Y', $request->tanggal)->format('Y-m-d');

        News::create([
            "image" => $imgName,
            "judul" =>$request->input('judul'),
            "penulis" => $request->input('penulis'),
            "tanggal" => $tanggal,
            "description" =>$request->input('description'),
        ]);

        return redirect()->route('news.home')->with('success', 'Data telah berhasil disimpan!');
    }

    public function delete(News $news) {
        $count = News::count();
        $IdShowns = SelectedNews::pluck('news_id');

        if($IdShowns->contains($news->id)) {
            return redirect()->route('news.home')->with('success', 'Data gagal dihapus! Tidak boleh yang ditampilkan di Homepage!');
        }

        if ($count <= 3) {
            return redirect()->route('news.home')->with('success', 'Data gagal dihapus! Tidak boleh kurang dari 3 data!');
        }

        $oldImage = public_path('img/' . $news->image);
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        $news->delete();
        return redirect()->route('news.home')->with('success', 'Data telah berhasil dihapus!');
    }

    public function edit(News $news) {
        return view('admin.News.update', compact(['news']));
    }

    public function update(Request $request, News $news) {

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($this->containsForbiddenContent($value)) {
                        $fail('Deskripsi tidak dapat diisi gambar, video, tabel, warna font, atau daftar dalam 150 karakter pertama');
                    }
                },
                function ($attribute, $value, $fail) {
                    if ($this->divError($value)) {
                        $fail('Deskripsi tidak dapat diisi tag div.');
                    }
                }
            ]
        ],
        [
            'judul.required' => 'Judul Harap Diisi',
            'image.required' => 'Gambar Harap Diisi',
            'image.mimes' => 'Extension Gambar Harap png, jpg, jpeg',
            'penulis.required' => 'Penulis Harap Diisi',
            'tanggal.required' => 'Tanggal Harap Diisi',
            'tanggal.date_format' => 'Tanggal Harap Diisi berdasarkan bulan/hari/tahun',
            'tanggal.before_or_equal' => 'Harap Masukkan Tanggal yang Valid',
            'description.required' => 'Deskripsi Harap Diisi'
        ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imgName = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path("img"), $imgName);

            if(!is_null($news->image)) {
                $oldImage = public_path('img/' . $news->image);
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }
        }
        else {
            $imgName = $news->image;
        }

        $news->update([
            "image" => $imgName,
            "penulis" => $request->input('penulis'),
            "judul" =>$request->input('judul'),
            "description" =>$request->input('description'),
        ]);

        $news->save();
        return redirect()->route('news.home')->with('success', 'Data telah berhasil diperbarui!');
    }

    public function search(Request $request) {
        $search = $request->search;
        $news = News::where(function($query) use ($search){
            $query->where('judul', 'LIKE', "%$search%");
        })->paginate(10);

        return view('admin.news', compact('news'));
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
