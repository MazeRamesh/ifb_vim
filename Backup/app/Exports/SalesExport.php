<?php

namespace App\Exports;

use App\Models\salesheaders;
use App\Models\salesdetails;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;

class SalesExport implements FromCollection ,WithHeadings ,WithMapping ,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use RegistersEventListeners;

    public static $merge=[];
    private $invoice_id=array();
    public function __construct(array $invoice_id)
    {
        $this->invoice_id=$invoice_id;
        // dd($this->invoice_id);
    }
    // public static function afterSheet(AfterSheet $event)
    // {
    //     foreach (SalesReportExport::$merge as $key => $value) {
    //     $event->sheet->getDelegate()->mergeCells('I'.$value['from'].':I'.$value['to']);
    //      }
    // }
    public function map($row): array
    {
        return [
            $row->invoiceno_id,
            $row->invoicedate,
            $row->salesdetailsreport->customercode_id,
            $row->productcode_id,
            $row->productdescription,
            $row->HASNorSACcode,
            $row->ponumber,
            $row->podate,
            $row->productsellingrate,
            $row->productdealerrate,
            $row->productigstrate,
            $row->productcgstrate,
            $row->productsgstrate,
            $row->productqty,
            $row->productigstamount,
            $row->productcgstamount,
            $row->productsgstamount,
            $row->netamount,
            $row->totallinevalue,
            $row->sap_materialcode,
            $row->salesdetailsreport->igstamount,
            $row->salesdetailsreport->ssgstamount,
            $row->salesdetailsreport->cgstamount,
            $row->salesdetailsreport->tot_qty,
            $row->salesdetailsreport->sales_total,
            $row->salesdetailsreport->plant,
            $row->salesdetailsreport->customerBillingGSTINno,
            $row->salesdetailsreport->sap_orderno,
            $row->salesdetailsreport->customerBillingName1,
            $row->salesdetailsreport->customerPlace,
            $row->salesdetailsreport->customerPincode,
            $row->salesdetailsreport->statePlaceofSupply,
            $row->salesdetailsreport->stateCodeandName,
            $row->salesdetailsreport->plantAddressName1,
            $row->salesdetailsreport->plantPhone,
            $row->salesdetailsreport->plantMail,
            $row->salesdetailsreport->plantGSTIN,
            $row->salesdetailsreport->sap_orderdate

            // Date::dateTimeToExcel($row->created_at),
        ];
    }
    public function headings(): array
    {
        return [
            'Invoice No',
            'Invoice Date',
            'Customer Code',
            'Product Code',
            'Product Description',
            'HASN or SAC Code',
            'PO Number',
            'PO Date',
            'Product Selling Rate',
            'Product Dealer Rate',
            'Product IGST Rate',
            'Product CGST Rate',
            'Product SGST Rate',
            'Product Quantity',
            'Product IGST Amount',
            'Product CGST Amount',
            'Product SGST Amount',
            'Net Amount',
            'Total Line Value',
            'SAP Material Code',
            'Total IGST Amount',
            'Total SGST Amount',
            'Total CGST Amount',
            'Total Quantity',
            'Sales Total',
            'Plant',
            'GSTIN No',
            'SAP Order No',
            'Customer Billing Name',
            'Customer Place',
            'Pin Code',
            'State Code',
            'State Name',
            'Palnt Address',
            'Plant Phone',
            'Plant Mail',
            'Plant GSTIN',
            'SAP Order Date',

        ];
    }
    public function collection()
    {
        // SalesReportExport::$merge=[];
        
        $details=salesdetails::whereIn('id',$this->invoice_id)->with('salesdetailsreport')->select('invoiceno_id','invoicedate','ponumber','podate','productcode_id','productdescription','productsellingrate','productdealerrate','productigstrate','productcgstrate','productsgstrate','productqty','productigstamount','productcgstamount','productsgstamount','netamount','totallinevalue','HASNorSACcode','sap_materialcode')->get();
        $groups=$details->groupBy(' ');
        // dd($details);
        // $from=2;
        // foreach ($groups as $key => $value) 
        // {   
        //     $to=($value->count()+$from)-1;
        //     SalesReportExport::$merge[]=['from'=>$from,'to'=>$to];
        //     $from=$to+1;

        // }
        return $details;
        
    }
    // public function collection()
    // {
    //     return salesheaders::all();
    // }
}
