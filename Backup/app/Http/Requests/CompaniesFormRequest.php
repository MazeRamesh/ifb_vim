<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CompaniesFormRequest extends FormRequest
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
                'cmpcode' => 'string|min:1|nullable',
            'cmpname' => 'string|min:1|nullable',
            'cmpmailingname' => 'string|min:1|nullable',
            'cmpaddress' => 'string|min:1|nullable',
            'cmpgstino' => 'string|min:1|nullable',
            'cmpcountry' => 'nullable',
            'cmpstate' => 'string|min:1|nullable',
            'cmpcity' => 'string|min:1|nullable',
            'cmpemail' => 'nullable',
            'cmpphoneno' => 'string|min:1|nullable',
            'cmpmobileno' => 'string|min:1|nullable',
            'cmpwebsite' => 'string|min:1|nullable',
            'cmplogo' => 'string|min:1|nullable',
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
        $data = $this->only(['cmpcode', 'cmpname', 'cmpmailingname', 'companylocation','cmpaddress', 'cmpgstino', 'cmpcountry', 'cmpstate', 'cmpcity', 'cmpemail', 'cmpphoneno', 'cmpmobileno', 'cmpwebsite', 'cmplogo','statecode','panno','plantname','plantcode','cmp_uuid']);



        return $data;
    }

}