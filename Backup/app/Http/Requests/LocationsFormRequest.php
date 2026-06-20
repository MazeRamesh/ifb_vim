<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class LocationsFormRequest extends FormRequest
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
            'locationcode' => 'string|min:1|nullable',
            'locationname' => 'string|min:1|nullable',
            'locationDescription' => 'string|min:1|nullable',
    
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
        $data = $this->only(['locationcode','locationname','locationDescription','shopcode']);

        return $data;
    }

}