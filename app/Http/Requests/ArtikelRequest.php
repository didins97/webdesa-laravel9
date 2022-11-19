<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()) {
            case "POST":
                return [
                    'judul_artikel' => 'required|max:255',
                    'isi_artikel' => 'required|min:10',
                    'gambar_artikel' => 'required|image|mimes:png,jpg,jpeg|max:2048'
                ];
            case "PUT":
            case "PATCH":
                return [
                    'judul_artikel' => 'required|max:255',
                    'isi_artikel' => 'required|min:10',
                ];
        }
    }

    public function messages()
    {
        return [
            'judul_artikel.required' => 'Judul artikel wajib diisi',
            'isi_artikel.required' => 'Keterangan artikel wajib diisi',
            'gambar_artikel.required' => 'Gambar wajib diisi',
            'isi_artikel.min' => 'Keterangan artikel harus lebih dari 10'
        ];
    }
}
