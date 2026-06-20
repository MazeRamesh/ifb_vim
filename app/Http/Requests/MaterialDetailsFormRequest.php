<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Validation\Rule;

class MaterialDetailsFormRequest extends FormRequest
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
        if($this->method()=="POST")
        {
            $partial_rules=[
            'material_code' => ['string','min:1','required',
            Rule::unique('material_details','material_code')->where(function ($query) {
                $query->where('plant_code','=', $this->request->get('plant_code'));
              })
            ],
            'part_no' => ['string','min:1','required',
                Rule::unique('material_details','part_no')->where(function ($query) {
                $query->where('plant_code','=', $this->request->get('plant_code'));
            })],
            'customer_part_no' => ['string','min:1','required',
                Rule::unique('material_details','customer_part_no')->where(function ($query) {
                $query->where('plant_code','=', $this->request->get('plant_code'));
            })]
        ];
    }
        else
        {
            $partial_rules=[
                'material_code' => ['string','min:1','required',
                Rule::unique('material_details','material_code')->where(function ($query) {
                $query->where('plant_code','=', $this->request->get('plant_code'));
                  })->ignore($this->segment(3))
                ],
                'part_no' => ['string','min:1','required',
                    Rule::unique('material_details','part_no')->where(function ($query) {
                    $query->where('plant_code','=', $this->request->get('plant_code'));
                })->ignore($this->segment(3))],
                'customer_part_no' => ['string','min:1','required',
                    Rule::unique('material_details','customer_part_no')->where(function ($query) {
                    $query->where('plant_code','=', $this->request->get('plant_code'));
                })->ignore($this->segment(3))]
            ];
        }
        $rules = [
            'shop_code' => 'string|min:1|required',
            'shop' => 'string|min:1|required',
            'gate' => 'string|min:1|required',
            'box_qty' => 'string|min:1|required',
            'plant_code' => 'string|min:1|required',
            'hsn_code' => 'string|min:1|required',
            'gst_in' => 'string|min:1|required|regex:/33[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}/',
            'product_desc' => 'string|min:1|required',
        ];

        return array_merge($partial_rules,$rules);
    }

    /**
     * Get the request's data from the request.
     *
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['material_code', 'part_no', 'customer_part_no', 'shop_code', 'shop', 'gate', 'box_qty', 'plant_code', 'hsn_code', 'gst_in', 'product_desc']);



        return $data;
    }

}

