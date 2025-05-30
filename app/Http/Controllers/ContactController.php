<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'whatsapp' => 'required|max:255',
            'instagram' => 'required|max:255',
            'facebook' => 'required|max:255',
            'tiktok' => 'required|max:255',
            'description' => [
                'required',
                // 'max:255',
                function ($attribute, $value, $fail) {
                    if ($this->divError($value)) {
                        $fail('Deskripsi tidak dapat diisi tag div.');
                    }
                },
                function ($attribute, $value, $fail) {
                    if ($this->containsForbiddenContent($value)) {
                        $fail('Deskripsi tidak dapat diisi gambar, video, tabel, warna font, atau daftar dalam 150 karakter pertama');
                    }
                }

            ]
        ],
        [
            'whatsapp.required' => 'Link Whatsapp Harap Diisi',
            'whatsapp.max' => 'Link Whatsapp Paling Maksimal 255 Karakter',
            'instagram.required' => 'Link Instagram Harap Diisi',
            'instagram.max' => 'Link Instagram Paling Maksimal 255 Karakter',
            'facebook.required' => 'Link Facebook Harap Diisi',
            'facebook.max' => 'Link Facebook Paling Maksimal 255 Karakter',
            'tiktok.required' => 'Link Tiktok Harap Diisi',
            'tiktok.max' => 'Link Tiktok Paling Maksimal 255 Karakter',

            'description.required' => 'Deskripsi Harap Diisi',
            // 'description.max' => 'Deskripsi Paling Maksimal 255 Karakter',
        ]);

        Contact::create([
            'whatsapp' => $request->input('whatsapp'),
            'instagram' => $request->input('instagram'),
            'facebook' => $request->input('facebook'),
            'tiktok' => $request->input('tiktok'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('contact.home');
    }

    public function edit(Contact $contact) {
        return view('admin.Contact.update', compact('contact'));
    }

    public function update(Request $request, Contact $contact) {

        $request->validate([
            'whatsapp' => 'required|max:255',
            'instagram' => 'required|max:255',
            'facebook' => 'required|max:255',
            'tiktok' => 'required|max:255',
            'description' => [
                'required',
                // 'max:255',
                function ($attribute, $value, $fail) {
                    if ($this->divError($value)) {
                        $fail('Deskripsi tidak dapat diisi tag div.');
                    }
                },
                function ($attribute, $value, $fail) {
                    if ($this->containsForbiddenContent($value)) {
                        $fail('Deskripsi tidak dapat diisi gambar, video, tabel, warna font, atau daftar dalam 150 karakter pertama');
                    }
                }

            ]
        ],
        [

            'whatsapp.required' => 'Link Whatsapp Harap Diisi',
            'whatsapp.max' => 'Link Whatsapp Paling Maksimal 255 Karakter',
            'instagram.required' => 'Link Instagram Harap Diisi',
            'instagram.max' => 'Link Instagram Paling Maksimal 255 Karakter',
            'facebook.required' => 'Link Facebook Harap Diisi',
            'facebook.max' => 'Link Facebook Paling Maksimal 255 Karakter',
            'tiktok.required' => 'Link Tiktok Harap Diisi',
            'tiktok.max' => 'Link Tiktok Paling Maksimal 255 Karakter',

            'description.required' => 'Deskripsi Harap Diisi',
            // 'description.max' => 'Deskripsi Paling Maksimal 255 Karakter',
        ]);

        $contact->update([

            'whatsapp' => $request->input('whatsapp'),
            'instagram' => $request->input('instagram'),
            'facebook' => $request->input('facebook'),
            'tiktok' => $request->input('tiktok'),
            'description' => $request->input('description'),
        ]);

        $contact->save();
        return redirect()->back()->with('success', 'Data telah berhasil diperbarui!');
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
