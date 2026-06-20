<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PodetailsFormRequest extends FormRequest
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
                'pono_id' => 'nullable',
            'podate' => 'string|min:1|nullable',
            'productcode_id' => 'nullable',
            'productname' => 'string|min:1|nullable',
            'partno' => 'string|min:1|nullable',
            'productdescription' => 'string|min:1|nullable',
            'uom' => 'string|min:1|nullable',
            'productmanufactdate' => 'min:1|nullable',
            'productexpirydate' => 'min:1|nullable',
            'productmrprate' => 'min:1|nullable',
            'productsellingrate' => 'min:1|nullable',
            'productdealerrate' => 'min:1|nullable',
            'productigstrate' => 'min:1|nullable',
            'productcgstrate' => 'min:1|nullable',
            'productsgstrate' => 'min:1|nullable',
            'productqty' => 'min:1|nullable',
            'producthsncode' => 'string|min:1|nullable',
            'productigstamount' => 'min:1|nullable',
            'productcgstamount' => 'min:1|nullable',
            'productsgstamount' => 'min:1|nullable',
            'netamount' => 'min:1|nullable',
            'taxableamount' => 'min:1|nullable',
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
        $data = $this->only(['pono_id', 'podate', 'productcode_id', 'productname', 'partno', 'productdescription', 'uom', 'productmanufactdate', 'productexpirydate', 'productmrprate', 'productsellingrate', 'productdealerrate', 'productigstrate', 'productcgstrate', 'productsgstrate', 'productqty', 'producthsncode', 'productigstamount', 'productcgstamount', 'productsgstamount', 'netamount', 'taxableamount']);



        return $data;
    }

}