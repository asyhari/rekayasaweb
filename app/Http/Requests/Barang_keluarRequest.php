<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Barang_keluarRequest extends FormRequest 
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
        //Cek apakah CREATE/UPDATE
        if($this->method()  == 'PATCH'){
            $kode_rules     = 'required|string';
            
        }
        else{
            $kode_rules     = 'required|string|unique:barang_keluar,kode';
           
        }

        return [
            'kode'          => $kode_rules,
            'id_sekolah'    => 'required|string|max:30',
            'tgl_keluar'    => 'required|date',
            
        ];
    }
}
