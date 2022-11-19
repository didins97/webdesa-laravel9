<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PotensiRequest extends FormRequest
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
                    'nama' => 'required|max:255',
                    'keterangan' => 'required|min:10',
                    'galleries_foto' => 'required',
                    'thumbnail' => 'required|image|mimes:png,jpg,jpeg|max:2048'
                ];
            case "PUT":
            case "PATCH":
                return [
                    'nama' => 'required|max:255',
                    'keterangan' => 'required|min:10',
                ];
        }
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama wajib diisi',
            'keterangan.required' => 'Keterangan wajib diisi',
            'thumbnail.required' => 'Gambar wajib diisi',
            'galleries_foto.required' => 'galeri wajib diisi',
            'keterangan.min' => 'Keterangan harus lebih dari 10'
        ];
    }
}
