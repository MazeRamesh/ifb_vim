<?php

namespace App\Imports;

use App\Models\MaterialDetail as ModelsMaterialDetail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MaterialDetail implements ToCollection,WithValidation,SkipsOnFailure,WithHeadingRow
{
    use Importable,SkipsFailures;
    /**
    * @param Collection $collection
    */
    public $current_row=[];
    public $errors=[];
    public function collection(Collection $rows)
    {
        $arr_rows = $rows->toArray();
        foreach ($arr_rows as $key=>$row) {
            $this->current_row=$row;
            $validator = Validator::make($row, $this->rules());
            if ($validator->fails()) {
                $error_messages=[];
                foreach ($validator->errors()->messages() as $messages) {
                    foreach ($messages as $error) {
                        $error_messages[]= $error;
                    }
                }
                $row['maze_remarks']=implode(',',$error_messages);
                $this->errors[]=$row;
                $rows->forget($key);
            }
            else
            {
                $row=array_filter($row);
                ModelsMaterialDetail::create($row);
            }
        }
        return $rows;
    }
    public function rules(): array
    {
        $rules=[
            'material_code' => ['required',
            Rule::unique('material_details','material_code')->where(function ($query) {
                if(isset($this->current_row['plant_code']))
                    $query->where('plant_code','=', $this->current_row['plant_code']);
              })
              ,'not_in:0'
            ],
            'part_no' => ['required',
                Rule::unique('material_details','part_no')->where(function ($query) {
                if(isset($this->current_row['plant_code']))
                    $query->where('plant_code','=', $this->current_row['plant_code']);
            },'not_in:0')],
            'customer_part_no' => ['required',
                Rule::unique('material_details','customer_part_no')->where(function ($query) {
                if(isset($this->current_row['plant_code']))
                    $query->where('plant_code','=', $this->current_row['plant_code']);
            }),'not_in:0'],
            'shop_code' => 'required',
            'shop' => 'required',
            'gate' => 'required',
            'box_qty' => 'required|numeric',
            'plant_code' => 'required',
            'hsn_code' => 'required',
            'gst_in' => 'required|regex:/33[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}/',
            'product_desc' => 'required',
        ];
        return $rules;
    }
    public function getErrors()
    {
        return $this->errors;
    }
}
