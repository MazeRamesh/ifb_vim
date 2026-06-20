<?php

namespace App\Imports;

use App\Models\DropDowns;
use App\Models\salesheader;
use App\Models\salesdetails;
use Maatwebsite\Excel\Concerns\ToModel;
//use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Importable;
use auth;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Illuminate\Support\Str;


use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class SalesheaderImport implements ToCollection,SkipsOnFailure,WithHeadingRow,WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable,SkipsFailures;

    private $headings=array();
    public $rules=[];
    public $details_raw_values=[];
    public $header_raw_values=[];
    public $details_manual_values=[];
    public $header_manual_values=[];
    public $details_excel_fields=[];
    public $header_excel_fields=[];
    public $errors=[];
    public function __construct(array $headings)
    {
        HeadingRowFormatter::default('excel-header-format');
        $this->headings=$headings;
        $json = Storage::disk('excel_mapping_json')->get('mapped_fields.json');
        $json = json_decode($json, true);
        $this->mapped_fields=$json;
        $rules=[];
        $header_fields=$json['header'];
        $details_fields=$json['details'];
        $arr=$this->returnRules($header_fields);
        $header_raw_values=$arr['raw_values'];
        $header_rules=$arr['rules'];
        $header_manuals=$arr['manuals'];
        $header_excel_fields=$arr['excel_fields'];
        $arr=$this->returnRules($details_fields);
        $details_raw_values=$arr['raw_values'];
        $details_rules=$arr['rules'];
        $details_manuals=$arr['manuals'];
        $details_excel_fields=$arr['excel_fields'];

        $this->rules=array_merge($header_rules,$details_rules);
        $this->details_raw_values=$details_raw_values;
        $this->header_raw_values=$header_raw_values;
        $this->details_manual_values=$details_manuals;
        $this->header_manual_values=$header_manuals;
        $this->details_excel_fields=$details_excel_fields;
        $this->header_excel_fields=$header_excel_fields;
    }

    public function returnRules($fields)
    {
        $raw_values=[];
        $rules=[];
        $manuals=[];
        $excel_fields=[];
        foreach($fields as $key=> $field)
        {
            $rule=explode('|',$field,2);
            if(count($rule)==2)
            {
                if($rule[0]=='raw')
                    $raw_values[$key]=$rule[1];
                else if($rule[0]=='manual')
                {
                    $manuals[$key]=Str::slug($rule[1],'_');
                    $excel_fields[$key]=Str::slug($rule[1],'_');
                }
                else
                {
                    $rules[Str::slug($rule[0],'_')]=$rule[1];
                    $excel_fields[$key]=Str::slug($rule[0],'_');
                }
            }
            elseif($rule[0]=='manual')
            {
                $excel_fields[$key]='';
            }
            elseif($rule[0]!='')
            {
                $excel_fields[$key]=Str::slug($rule[0],'_');
            }
        }
        return compact('raw_values','rules','manuals','excel_fields');
    }

    public function collection(Collection $rows)
    {
        //dd($rows);
        $arr_rows = $rows->toArray();
        $mapped_salesheader=$this->header_excel_fields;
        $mapped_salesdetails=$this->details_excel_fields;
        //dd($mapped_salesheader,$mapped_salesdetails);
        foreach ($arr_rows as $key=>$row) {
            $row=array_filter($row);
            $validator = Validator::make($row, $this->rules);
            if ($validator->fails()) {
                $error_messages=[];
                foreach ($validator->errors()->messages() as $messages) {
                    foreach ($messages as $error) {
                        // accumulating errors:
                        $error_messages[]= $error;
                    }
                }
                $row['remarks']=implode(',',$error_messages);
                $this->errors[]=$row;
                $rows->forget($key);
                // $error_rows=$rows->filter(function($row){
                //     if($row->invoice)
                // });
            }
        }
        // dd($this->errors);
        $rows=$rows->groupBy($mapped_salesheader['invoiceno'])->values();
        // dd($rows);
        // dd($mapped_salesheader['invoiceno'],$rows);
        $headers=[];
        $total_sales_header=collect();
        $total_sales_details=collect();
        foreach($rows as $row)
        {
        $invoice_details=$row;
        $salesheaders=$this->getMappedArray($invoice_details[0],$mapped_salesheader);
        $salesheaders=array_merge($salesheaders,$this->header_raw_values);
        $salesdetails=collect();
        // dd($mapped_salesdetails);
        foreach($invoice_details as $invoice_detail)
        {
            $arr=$this->getMappedArray($invoice_detail,$mapped_salesdetails);
            $arr=array_merge($arr,$this->details_raw_values);
            $salesdetails->push($arr);
        }
        // dd($salesdetails);
        $salesdetail=$salesdetails->reduce(function($carry,$row){
            // dd($row);
            if($carry!=null)
            {
                $row['taxamount']+=$carry['taxamount'];
                $row['productqty']+=$carry['productqty'];
                $row['netamount']+=$carry['taxableamount'];
                $row['taxableamount']+=$carry['taxableamount'];
                $row['productsgstamount']+=$carry['productsgstamount'];
                $row['productcgstamount']+=$carry['productcgstamount'];
		$row['productigstamount'] += $carry['productigstamount'];
                $row['totallinevalue']+=$carry['totallinevalue'];
            }
            $row['taxamount']=sprintf("%.2f",$row['productcgstamount']+$row['productsgstamount']);
            $row['productsellingrate']=sprintf("%.2f",($row['netamount'])/($row['productqty']??1));
            $row['netamount']=sprintf("%.2f",$row['productsellingrate']*$row['productqty']);
            $row['taxableamount']=sprintf("%.2f",$row['taxableamount']);
            $row['productsgstamount']=sprintf("%.2f",$row['productsgstamount']);
            $row['productcgstamount']=sprintf("%.2f",$row['productcgstamount']);
            $row['productigstamount']=sprintf("%.2f",$row['productigstamount']);
            //$row['productigstamount']=sprintf("%.2f",$row['productcgstamount']+$row['productsgstamount']);
            $row['totallinevalue']=sprintf("%.2f",$row['totallinevalue']);
            return $row;
        },null);
         //dd($salesdetail['productigstamount']);
        $salesheaders['igstamount']=$salesdetail['productigstamount'];
        $salesheaders['igstinwords']=$this->getCurrencyInWords($salesheaders['igstamount']);

        $salesheaders['sgstamount']=$salesdetail['productsgstamount'];
        $salesheaders['sgstinwords']=$this->getCurrencyInWords($salesheaders['sgstamount']);

        // $salesheaders['vehicle_no']=$salesheaders['vehicle_no'];
        // $salesheaders['ewaybillno']=$salesheaders['ewaybillno'];
// dd($salesheaders);
        $salesheaders['cgstamount']=$salesdetail['productcgstamount'];
        $salesheaders['cgstinwords']=$this->getCurrencyInWords($salesheaders['cgstamount']);
        $salesheaders['taxableamounts']=$salesdetail['taxableamount'];
        $salesheaders['sales_total']=$salesdetail['netamount'];
	if ($salesdetail['productigstamount'] == 0.00) {
                $salesheaders['totaltaxamount'] = $salesheaders['cgstamount'] + $salesheaders['sgstamount'];
            } else {
                $salesheaders['totaltaxamount'] = $salesdetail['productigstamount'];
            }
        $salesheaders['grandtotalamount']=$salesdetail['totallinevalue'];
        $salesheaders['taxamountword']=$this->getCurrencyInWords($salesheaders['totaltaxamount']);
        $salesheaders['grandtotalamountword']=$this->getCurrencyInWords($salesheaders['grandtotalamount']);
        $salesheaders['taxtypes']='intrastate';
        $salesheaders['createdby']=auth()->user()->name;
        $salesheaders['tot_qty']=$salesdetail['productqty'];
        $salesheaders['details']=[$salesdetail];
        $total_sales_header->push($salesheaders);
        $total_sales_details->push($salesdetail);
    }
    //  dd($total_sales_header,$total_sales_details);
        $chucking=DropDowns::where('fieldsname','INVOICE_PAGINATE')->first()->optionvalue??4;
        session()->put('o_sales_header',$total_sales_header);
        $total_sales_header=$total_sales_header->chunk($chucking);
        session()->put('sales_header',$total_sales_header);
        session()->put('sales_details',$total_sales_details);
        return $headers;
    }
    public function getErrors()
    {
        return $this->errors;
    }
    public function rules():array
    {
        return $this->validation_array;
    }
    public function getMappedArray($fields,$o_mapped_fields)
    {
        $data=[];
        $mapped_fields = array();
        foreach ($o_mapped_fields as $choice => $group) {//group for same cell to diff column
            $mapped_fields[$group][] = $choice;
        }
        // $mapped_fields=array_flip($mapped_fields);
        // dd($mapped_fields);
        $arranged_fields=['data'=>[]];
        foreach($fields as $key => $field)
        {
            if(isset($mapped_fields[$key]))
            {
                foreach($mapped_fields[$key] as $value)//get value from group
                    $arranged_fields[$value]=$field;
            }
            else if($field!=null)
                $arranged_fields['data'][$key]=$field;
        }
        // dd($arranged_fields);
        return $arranged_fields;
    }

public function getCurrencyInWords($amount)
{
    $number=sprintf("%.2f",$amount);
    $no = floor($number);
    $point = round($number - $no, 2) * 100;
    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = array();
    $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_1)
    {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += ($divider == 10) ? 1 : 2;
        if ($number)
        {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
        }
        else
        {
            $str[] = null;
        }
    }
    $str = array_reverse($str);
    $result = implode('', $str);
    if($point>0)
    {
        $points = ($point) ?
        "." . $words[$point / 10] . " " .
        $words[$point = $point % 10] : '';
    }
    else
    {
        $points="Zero";
    }
    return $result . "Rupees  " . $points . " Paise";
        // $amount=sprintf("%.2f",$amount);
        // $arrayoftaxs= explode('.',$amount,2);
        // $currencyinrss= $this->numberformat->format($arrayoftaxs[0]);
        // $currencyinpss= $this->numberformat->format($arrayoftaxs[1]);
        // if($currencyinpss!='zero')
        //     $currencyinrss.=' and '.$currencyinpss.' paisa';
        // return ucwords($currencyinrss.' only');
}

    //public function getCurrencyInWords($amount)
    //{
      //  $amount=sprintf("%.2f",$amount);
        //$arrayoftaxs= explode('.',$amount,2);
        //$currencyinrss= $this->numberformat->format($arrayoftaxs[0]);
        //$currencyinpss= $this->numberformat->format($arrayoftaxs[1]);
        //if($currencyinpss!='zero')
        //    $currencyinrss.=' and '.$currencyinpss.' paisa';
        //return ucwords($currencyinrss.' only');
    //}
}
