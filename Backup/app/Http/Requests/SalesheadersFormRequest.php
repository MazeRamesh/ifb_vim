<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SalesheadersFormRequest extends FormRequest
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
                'salesuniqueno' => 'string|min:1|nullable',
            'invoiceno' => 'string|min:1|nullable',
            'invoicedate' => 'string|min:1|nullable',
            'customercode_id' => 'nullable',
            'vchtypecode_id' => 'nullable',
            'taxableamount' => 'min:1|nullable',
            'igstamount' => 'string|min:1|nullable',
            'cgstamount' => 'string|min:1|nullable',
            'sgstamount' => 'string|min:1|nullable',
            'otheramount' => 'string|min:1|nullable',
            'discountamount' => 'numeric|nullable',
            'taxamount' => 'min:1|nullable',
            'grandtotalamount' => 'min:1|nullable',
            'taxamountword' => 'string|min:1|nullable',
            'grandtotalamountword' => 'string|min:1|nullable',
            'createdby' => 'string|min:1|nullable',
            'createdlocation' => 'string|min:1|nullable',
            'companyid' => 'string|min:1|nullable',
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

        $data = $this->only(['salesuniqueno', 'invoiceno', 'invoicedate', 'customercode_id', 'vchtypecode_id', 'sales_total', 'igstamount', 'cgstamount', 'sgstamount', 'otheramount', 'discountamount', 'totaltaxamount', 'grandtotalamount', 'taxamountword', 'grandtotalamountword', 'createdby', 'createdlocation', 'companyid', 'taxtypes', 'Freight_amt','Packing_amt','taxamounts','taxableamounts','narration',    
                  'productcode_id',
                  'productname',
                  'productpartno',
                  'productdescription',
                  'uom_id',
                  'productmanufactdate',
                  'productexpirydate',
                //  'productmrprate',
                  'productsellingrate',
                 // 'productdealerrate',
                  'productigstrate',
                  'productcgstrate',
                  'productsgstrate',
                  'productqty',
                  'producthsncode',
                  'productigstamount',
                  'productcgstamount',
                  'productsgstamount',
                  'netamount',
                  'taxamount','vehicle_no',
                  'taxableamount','billno',
'invoiceto',
'plantcode',
'shopcode',
'pdsno',
'pdsdate',
'transport',
'ponumber',
'podate','from','plant','tot_qty','plant_code','signstatus']);
         
        return $data;
    }

}