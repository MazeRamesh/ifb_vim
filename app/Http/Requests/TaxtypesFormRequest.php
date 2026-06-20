<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TaxtypesFormRequest extends FormRequest
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
            'taxcode' => 'string|min:1|nullable',
            'taxname' => 'string|min:1|nullable',
            'taxtypes' => 'string|min:1|nullable',
    
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
        $data = $this->only(['taxcode','taxname','taxtypes']);

        return $data;
    }

}