<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'date' => 'required',
            'time' => 'required|',
            'number' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'date.required' => '日にちを選択してください',
            'time.required' => '時間を選択してください',
            'number.required' => '人数を選択してください',
        ];
    }
}