<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TransportsFormRequest extends FormRequest
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
                'transporterId' => 'string|min:1|nullable',
            'transporterName' => 'string|min:1|nullable',
            'transportertype' => 'string|min:1|nullable',
            'vehicleNo' => 'string|min:1|nullable',
            'vehicleType' => 'string|min:1|nullable',
            'transDocNo' => 'string|min:1|nullable',
            'transMode' => 'string|min:1|nullable',
            'transDistance' => 'string|min:1|nullable',
            'transDocDate' => 'string|min:1|nullable',
            'entrydate' => 'string|min:1|nullable',
            'createdby' => 'string|min:1|nullable',
            'company_id' => 'nullable',
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
        $data = $this->only(['transporterId', 'transporterName', 'transportertype', 'vehicleNo', 'vehicleType', 'transDocNo', 'transMode', 'transDistance', 'transDocDate', 'entrydate', 'createdby', 'company_id']);



        return $data;
    }

}