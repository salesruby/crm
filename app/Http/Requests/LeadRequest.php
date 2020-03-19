<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'user_id' => 'required',
            'phone' => 'required|max:20',
            'company_name' => 'required',
            'designation' => 'required',
            'next_dated_step' => 'required',
            'product_ids' => 'required|array'
        ];
    }
}
