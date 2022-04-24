<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
                'provider_name' => 'required|string',
                'hmo_id' => 'required|numeric',
                'encounter_date' => 'required|date_format:Y-m-d',
                'items' => 'required|array|min:1',
                'total' => 'required|numeric'
        ];
    }
}
