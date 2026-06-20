<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class VchtypesFormRequest extends FormRequest
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
        $rules = [
            'vchtypecode' => 'string|min:1|nullable',
            'vchtypename' => 'string|min:1|nullable',
            'vchtypedescription' => 'string|min:1|nullable',
            'vchtypeunder' => 'string|min:1|nullable',
            'status' => 'string|min:1|nullable',
    
        ];

        return $rules;
    }
    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['vchtypecode','vchtypename','vchtypedescription','vchtypeunder','status']);

        return $data;
    }

}