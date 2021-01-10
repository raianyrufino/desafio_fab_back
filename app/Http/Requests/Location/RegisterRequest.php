<?php

namespace App\Http\Requests\Location;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
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
            'zip_code' => 'required', 
            'country' => 'required', 
            'city' => 'required', 
            'state' => 'required',  
        ];
    }

    public function messages ()
    {
        return [
            'required' => 'The attribute field :attribute is required.',
        ];
    }
}
