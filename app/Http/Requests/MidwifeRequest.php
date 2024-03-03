<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MidwifeRequest extends FormRequest
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
        return [
                
            'kk' => 'required|string|max:20',
            'full_name' => 'required|string|max:150',
            'sex' => 'required|string|max:20',
            'born' => 'required|string|max:150',
            'birth' => 'required',
            'address' => 'required|string|max:255',
            'rt_rw' => 'required|string|max:5',
            'kel' => 'required|string|max:150',
            'kec' => 'required|string|max:150',
            'religion' => 'required|string|max:20',
        ];
    }
}
