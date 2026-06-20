<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UomsFormRequest extends FormRequest
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
            'uomcode' => 'string|min:1|nullable',
            'uomname' => 'string|min:1|nullable',
            'uomshortname' => 'string|min:1|nullable',
    
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
        $data = $this->only(['uomcode','uomname','uomshortname']);

        return $data;
    }

}