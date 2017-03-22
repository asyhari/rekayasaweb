<?php

namespace App\Http\Requests; 

use Illuminate\Foundation\Http\FormRequest;

class SekolahRequest extends FormRequest
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
            'nama_sekolah' => 'required|string|max:20',
            'alamat_sekolah' => 'required|string',
            'kota' => 'sometimes|string|max:15',
            'kabupaten' => 'sometimes|string|max:15',

        ];
    }
}
