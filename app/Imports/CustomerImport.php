<?php

namespace App\Imports;

use App\Models\Customertables;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Importable;

class CustomerImport implements ToModel,WithValidation,SkipsOnFailure,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable,SkipsFailures;
    
    private $headings=array();

    public function __construct(array $headings)
    {
        $this->headings=$headings;
    }

    public function model(array $row)
    {
        return new Customertables([
             'customercode'         => $row[$this->headings[0]],
             'customername'         => $row[$this->headings[1]],
             'customertype'         => $row[$this->headings[2]],
             'customeraddress'      => $row[$this->headings[3]], 
             'consigneeaddress'     => $row[$this->headings[4]],
             'customerGSTINno'      => $row[$this->headings[5]],
             'customerphoneno'      => $row[$this->headings[6]],
             'customermobileno'     => $row[$this->headings[7]],
             'customeremail'        => $row[$this->headings[8]],
             'customercity'         => $row[$this->headings[9]],
             'customerstate'        => $row[$this->headings[10]],
             'customerpanno'        => $row[$this->headings[11]], 
             'customerstatecode'    => $row[$this->headings[12]],
             'vendorcode'           => $row[$this->headings[13]],
             'typeofbusiness'       => $row[$this->headings[14]],
             'customerstaus'        => $row[$this->headings[15]],
             'plantcode'            => $row[$this->headings[16]],
             'shopcode'             => $row[$this->headings[17]],
              'pdsno'               => $row[$this->headings[18]],
             'pdsdate'              => $row[$this->headings[19]],
             'location'             => $row[$this->headings[20]],
             'gateno'               => $row[$this->headings[21]],
        ]);
    }


    public function rules(): array
    {
        return [
            $this->headings[0]  =>'required',
            $this->headings[1]  =>'required',
        ];
    }

}
