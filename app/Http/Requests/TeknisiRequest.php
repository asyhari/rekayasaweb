<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeknisiRequest extends FormRequest
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
            $nit_rules      = 'required|string|size:7|unique:teknisi,nit,'.$this->get('id');
            $telepon_rules  = 'required|numeric|digits_between:10,15|unique:telepon,nomor_telepon, '.$this->get('id').',id_teknisi';
        }
        else{
            $nit_rules      = 'required|string|size:7|unique:teknisi,nit';
            $telepon_rules  = 'required|numeric|digits_between:10,15|unique:telepon,nomor_telepon';
        }

        return [
            'nit'           => $nit_rules,
            'nama_teknisi'  => 'required|string|max:30',
            'tgl_lahir'     => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telepon' => $telepon_rules,
            'alamat'        => 'required|string|max:50',   
            'foto'          => 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png',
        ];
    }
}
