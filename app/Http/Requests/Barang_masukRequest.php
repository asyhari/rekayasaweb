<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Barang_masukRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id_inventaris' =>'required', //harus sama semua dengan tabel DB jika tidak , tidak dapat save data
            'tgl_masuk'     =>'required|date',         
            'jml_bm'        =>'required|int|max:30',           
        ];
    }
}
