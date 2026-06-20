<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salesdetails extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'salesdetails';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $appends=['originalsellingrate'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invoiceno_id',
        'invoicedate',
        'ponumber',
        'podate',
        'productcode_id',
        'productname',
        'productpartno',
        'productdescription',
        'uom_id',
        'productmanufactdate',
        'productexpirydate',
        'productmrprate',
        'productsellingrate',
        'productdealerrate',
        'productigstrate',
        'productcgstrate',
        'productsgstrate',
        'productqty',
        'producthsncode',
        'productigstamount',
        'productcgstamount',
        'productsgstamount',
        'taxamount',
        'netamount',
        'taxableamount',
        'totallinevalue',
        'customerPartno',
        'ugstAmount',
        'cgst_per',
        'sgst_per',
        'igst_per',
        'ugst_per',
        'cess',
        'HASNorSACcode',
        'sap_materialcode',
        'po_itemNo',
        'VoucherInvoiceNumber_id',
        'ItemNumber',
        'podateinword',
        'HMILPartNo',
        'ITWPartNo',
        'TarriffNo',
        'ItemServiceDescription',
        'NoOfCases',
        'MaterialCost',
        'TaxAmountInWord',
        'ConsPartCost',
        'AssessableValue',
        'ToolCost',
        'ConsMatlCost',
        'data',
        'packing_amt'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the invoiceno for this model.
     */
    /*public function invoiceno()
    {
        return $this->belongsTo('App\Models\Invoiceno','invoiceno_id');
    }

    *
     * Get the productcode for this model.

    public function productcode()
    {
        return $this->belongsTo('App\Models\Productcode','productcode_id');
    }*/
public function getOriginalSellingRateAttribute(){
    return $this->attributes['productsellingrate'];
}
public function purchaseorder(){
     return $this->belongsTo('App\Models\poheader','ponumber','pono');
    }

public function salesdetailsreport()
    {
       return $this->belongsTo('App\Models\salesheader','invoiceno_id','invoiceno');
    }
}
