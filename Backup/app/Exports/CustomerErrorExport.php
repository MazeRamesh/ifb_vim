<?php

namespace App\Exports;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerErrorExport extends Model implements FromArray,WithHeadings
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
    public function headings():array
    {
        return array_keys($this->data[0]);
    }
}
