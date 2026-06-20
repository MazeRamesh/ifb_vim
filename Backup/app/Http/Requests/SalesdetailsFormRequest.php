<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SalesdetailsFormRequest extends FormRequest
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
                'invoiceno_id' => 'nullable',
            'invoicedate' => 'string|min:1|nullable',
            'productcode_id' => 'nullable',
            'productname' => 'string|min:1|nullable',
            'productpartno' => 'string|min:1|nullable',
            'productdescription' => 'string|min:1|nullable',
            'uom_id' => 'string|min:1|nullable',
            'productmanufactdate' => 'string|min:1|nullable',
            'productexpirydate' => 'string|min:1|nullable',
            'productmrprate' => 'string|min:1|nullable',
            'productsellingrate' => 'string|min:1|nullable',
            'productdealerrate' => 'string|min:1|nullable',
            'productigstrate' => 'string|min:1|nullable',
            'productcgstrate' => 'string|min:1|nullable',
            'productsgstrate' => 'string|min:1|nullable',
            'productqty' => 'string|min:1|nullable',
            'producthsncode' => 'string|min:1|nullable',
            'productigstamount' => 'string|min:1|nullable',
            'productcgstamount' => 'string|min:1|nullable',
            'productsgstamount' => 'string|min:1|nullable',
            'netamount' => 'string|min:1|nullable',
            'taxableamount' => 'string|min:1|nullable',
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
        $data = $this->only(['invoiceno_id', 'invoicedate', 'productcode_id', 'productname', 'productpartno', 'productdescription', 'uom_id', 'productmanufactdate', 'productexpirydate', 'productmrprate', 'productsellingrate', 'productdealerrate', 'productigstrate', 'productcgstrate', 'productsgstrate', 'productqty', 'producthsncode', 'productigstamount', 'productcgstamount', 'productsgstamount', 'netamount', 'taxableamount',
'ponumber',
'podate','totallinevalue']);

        return $data;
    }

}