<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class EmplayeesFormRequest extends FormRequest
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
                'empcode' => 'string|min:1|nullable',
            'empname' => 'string|min:1|nullable',
            'company_id' => 'nullable',
            'empemail' => 'nullable',
            'empmobile' => 'string|min:1|nullable',
            'empaddress' => 'string|min:1|nullable',
            'empcity' => 'string|min:1|nullable',
            'empplace' => 'string|min:1|nullable',
            'empstatus' => 'string|min:1|nullable',
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
        $data = $this->only(['empcode', 'empname', 'company_id', 'empemail', 'empmobile', 'empaddress', 'empcity', 'empplace', 'empstatus','empplant']);



        return $data;
    }

}