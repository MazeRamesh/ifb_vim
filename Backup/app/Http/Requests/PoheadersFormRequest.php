<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PoheadersFormRequest extends FormRequest
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
                'pouniqueno' => 'string|min:1|nullable',
            'pono' => 'string|min:1|nullable',
            'podate' => 'min:1|nullable',
            'customercode_id' => 'nullable',
            'vchtypecode_id' => 'nullable',
            'taxtypes' => 'string|min:1|nullable',
            'taxableamount' => 'min:1|nullable',
            'igstamount' => 'min:1|nullable',
            'cgstamount' => 'min:1|nullable',
            'sgstamount' => 'min:1|nullable',
            'otheramount' => 'min:1|nullable',
            'discountamount' => 'nullable',
            'taxamount' => 'min:1|nullable',
            'grandtotalamount' => 'min:1|nullable',
            'taxamountword' => 'string|min:1|nullable',
            'grandtotalamountword' => 'string|min:1|nullable',
            'createdby' => 'string|min:1|nullable',
            'createdlocation' => 'string|min:1|nullable',
            'companyid' => 'string|min:1|nullable',
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
        $data = $this->only(['pouniqueno', 'pono', 'podate', 'customercode_id', 'vchtypecode_id', 'taxtypes','igstamount', 'cgstamount', 'sgstamount', 'otheramount', 'discountamount', 'taxamounts','taxableamounts', 'grandtotalamount', 'taxamountword', 'grandtotalamountword', 'createdby', 'createdlocation', 'companyid','Freight_amt','Packing_amt',
                            'productcode_id', 'productname', 'partno', 'productdescription', 'uom_id', 'productmanufactdate', 'productexpirydate', 'productmrprate', 'productsellingrate', 'productdealerrate', 'productigstrate', 'productcgstrate', 'productsgstrate', 'productqty', 'producthsncode', 'productigstamount', 'productcgstamount', 'productsgstamount', 'netamount','taxamount','taxableamount']);



        return $data;
    }

}