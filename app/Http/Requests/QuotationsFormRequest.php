<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class QuotationsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
                'quotation_number' => 'numeric|nullable',
            'quotation_date' => 'date_format:j/n/Y|nullable',
            'quotation_company_code' => 'string|min:1|nullable',
            'quotation_customer_code' => 'string|min:1|nullable',
            'project_name' => 'string|min:1|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'reference' => 'string|min:1|nullable',
            'quotation_product_code' => 'string|min:1|nullable',
            'item_description' => 'string|min:1|nullable',
            'item_price' => 'string|min:1|nullable',
            'item_sgst' => 'string|min:1|nullable',
            'item_cgst' => 'string|min:1|nullable',
            'item_igst' => 'string|min:1|nullable',
            'item_subtotal' => 'string|min:1|nullable',
            'item_taxtotal' => 'string|min:1|nullable',
            'quotation_amount' => 'string|min:1|nullable',
            'quotation_amount_inwords' => 'string|min:1|nullable',
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
        $data = $this->only(['quotation_number', 'quotation_date', 'quotation_company_code', 'quotation_customer_code', 'project_name', 'description', 'reference', 'quotation_product_code', 'item_description', 'item_price', 'item_sgst', 'item_cgst', 'item_igst', 'item_subtotal', 'item_taxtotal', 'quotation_amount', 'quotation_amount_inwords']);

        return $data;
    }

}