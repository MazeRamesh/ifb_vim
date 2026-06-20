<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CustomertablesFormRequest extends FormRequest
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
            'customercode' => 'string|min:1|nullable',
            'customername' => 'string|min:1|nullable',
            'customertype' => 'string|min:1|nullable',
            'customeraddress' => 'string|min:1|nullable',
            'consigneeaddress' => 'string|min:1|nullable',
            'customerGSTINno' => 'string|min:1|nullable',
            'customerphoneno' => 'string|min:1|nullable',
            'customermobileno' => 'string|min:1|nullable',
            'customeremail' => 'nullable',
            'customercity' => 'string|min:1|nullable',
            'customerstate' => 'string|min:1|nullable',
            'customerstaus' => 'string|min:1|nullable',
    
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
        $data = $this->only(['customercode','customername','customertype','customeraddress','consigneeaddress','customerGSTINno','customerphoneno','customermobileno','customeremail','customercity','customerstate','customerstaus','customerstatecode',
'vendorcode','plantcode',
'shopcode',
'pdsno',
'pdsdate',
'typeofbusiness',
'customerpanno','location','gateno']);
        if($data['customertype']=="Others")
        {
            // $data['plantcode']=null;
            // $data['shopcode']=null;
            $data['pdsno']=null;
            $data['pdsdate']=null;
        }
        return $data;
    }

}