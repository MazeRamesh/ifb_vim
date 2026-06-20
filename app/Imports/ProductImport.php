<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Importable;

class ProductImport implements ToModel,WithValidation,SkipsOnFailure,WithHeadingRow
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
        return new Products([
             'productcode'              => $row[$this->headings[0]],
             'productname'              => $row[$this->headings[1]],
             'productpartno'            => $row[$this->headings[2]],
             'productdescription'       => $row[$this->headings[3]], 
             'customerpartno'           => $row[$this->headings[4]],
             'customerpartname'         => $row[$this->headings[5]],
             'customerpartdescription'  => $row[$this->headings[6]],
             'uom_id'                   => $row[$this->headings[7]],
             'productmanufactdate'      => $row[$this->headings[8]],
             'productexpirydate'        => $row[$this->headings[9]],
             'productmrprate'           => $row[$this->headings[10]],
             'productsellingrate'       => $row[$this->headings[11]], 
             'productdealerrate'        => $row[$this->headings[12]],
             'productigstrate'          => $row[$this->headings[13]],
             'productcgstrate'          => $row[$this->headings[14]],
             'productsgstrate'          => $row[$this->headings[15]],
             'producthsncode'           => $row[$this->headings[16]],
             'productstatus'            => $row[$this->headings[17]]
              
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
