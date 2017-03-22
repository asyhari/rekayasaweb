<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Barang_rusakRequest extends FormRequest
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
            $kode_rules     = 'required|string|unique:barang_rusak,kode_br';
           
        }

        return [
            'kode_br'                    => $kode_rules,
            'id_sekolah'                 => 'required|string|max:30',
            'tgl_rusak'                  => 'required|date', 
            'teknisi_barang_rusak'       => 'required',      
        ];
    }
}
