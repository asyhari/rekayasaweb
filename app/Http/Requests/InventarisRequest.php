<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarisRequest extends FormRequest
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
            'id_barang' => 'required|string|size:8',
            'nama_barang' => 'required|string',
            'tipe_barang' => 'required|string|max:15',
            'jml_barang' => 'required|max:15',
        ];
    }
}
