<?php

namespace App\Imports;

use App\Models\salesdetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Importable;

class SalesdetailsImport implements ToModel,WithValidation,SkipsOnFailure,WithHeadingRow
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
        return new salesdetails([
             'invoiceno_id'         => $row[$this->headings[0]],
             'invoicedate'          => $row[$this->headings[1]],
             'ponumber'             => $row[$this->headings[9]],
             'podate'               => $row[$this->headings[10]], 
             'productcode_id'       => $row[$this->headings[26]],
             'productname'          => $row[$this->headings[27]],
             'productpartno'        => $row[$this->headings[28]],
             'productdescription'   => $row[$this->headings[29]],
             'uom_id'               => $row[$this->headings[30]],
             'productsellingrate'   => $row[$this->headings[31]],
             'productqty'           => $row[$this->headings[35]],
             'producthsncode'       => $row[$this->headings[36]], 
             'productigstamount'    => $row[$this->headings[32]],
             'productcgstamount'    => $row[$this->headings[33]],
             'productsgstamount'    => $row[$this->headings[34]],
             'netamount'            => $row[$this->headings[38]],
             'taxamount'            => $row[$this->headings[37]],
             'taxableamount'        => $row[$this->headings[39]],
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
