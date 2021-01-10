<?php

namespace App\Http\Requests\Flight;

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
            'origin_id' => 'required', 
            'destiny_id' => 'required', 
            'date_hour' => 'required|date_format:d/m/Y H:i:s',  
        ];
    }

    public function messages ()
    {
        return [
            'required' => 'The attribute field :attribute is required.',
        ];
    }
}
