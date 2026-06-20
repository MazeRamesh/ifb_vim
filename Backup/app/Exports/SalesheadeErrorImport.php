<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Model;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;

class SalesheadeErrorImport extends Model implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
       
    // }
     protected $data;
    
    public function __construct(array $data)
    {
        $this->data=$data;
    }
    
    public function array(): array
    {
        return $this->data;
    }
}
