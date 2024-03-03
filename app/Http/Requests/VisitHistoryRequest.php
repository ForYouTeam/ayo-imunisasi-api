<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitHistoryRequest extends FormRequest
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
            'children_id' => 'required|integer|min:1',
            'schedule_id' => 'required|integer|min:1',
            'midwife_id' => 'required|integer|min:1',
            'result_note_id' => 'required|integer|min:1',
            'date' => 'required',
            'time' => 'required',
        ];
    }
}
