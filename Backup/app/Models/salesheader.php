<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salesheader extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'salesheaders';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'salesuniqueno',
        'invoiceno',
        'invoicedate',
        'customercode_id',
        'vchtypecode_id',
        'invoiceto',
        'plantcode',
        'shopcode',
        'pdsno',
        'pdsdate',
        'transport',
        'transporter_name',
        'ponumber',
        'podate',
        'taxableamountss',
        'igstamount',
        'cgstamount',
        'sgstamount',
        'taxamounts',
        'taxableamounts',
        'Freight_amt',
        'Packing_amt',
        'otheramount',
        'discountamount',
        'taxamountss',
        'tot_qty',
        'sales_total',
        'totaltaxamount',
        'grandtotalamount',
        'taxamountword',
        'grandtotalamountword',
        'createdby',
        'createdlocation',
        'narration',
        'companyid',
        'taxtypes',
        'ewaybillno',
        'ewaybilldate',
        'validUpto',
        'message',
        'requestId',
        'from',
        'pdfstatus',
        'plant',
        'customerBillingGSTINno',
        'vendorCode',
        'sap_orderno',
        'customerBillingName1',
        'customerBillingName2',
        'customerBillingName3',
        'customerPlace',
        'customerPincode',
        'statePlaceofSupply',
        'stateCodeandName',
        'plantAddressName1',
        'plantAddressName2',
        'plantAddressPlace',
        'plantPhone',
        'plantFax',
        'plantMail',
        'plantGSTIN',
        'sap_orderdate',
        'plant_code',
        'signstatus',
        'podateinword',
        'location',
        'gateno',
        'ContainerType',
        'NoofContainers',
        'StuffQty',
        'HMILPlant',
        'selectcompany',
        'plantname',
        'companyAddress1',
        'companyAddress2',
        'companyAddress3',
        'companyAddress4',
        'companyAddress5',
        'companyGSTIN',
        'companyStateCode',
        'companyStateName',
        'customerStateCode',
        'customerStateName',
        'prepared_by','vehicle_no',
        'checked_by',
        'data',
        'total_cess',
        'irn_reference_no',
        'tcs_amount','billno'
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
     * Get the customercode for this model.
     */
   /* public function customercode()
    {
        return $this->belongsTo('App\Models\Customercode','customercode_id');
    }

    *
     * Get the vchtypecode for this model.

    public function vchtypecode()
    {
        return $this->belongsTo('App\Models\Vchtypecode','vchtypecode_id');
    }
*/

    public function InvoicenoList()
    {
       return $this->hasMany('App\Models\salesdetails','invoiceno_id','invoiceno');
    }
    public function customer(){
      return $this->belongsTo('App\Models\Customertables','customercode_id','customercode');
    }
    public function purchaseorder(){
     return $this->belongsTo('App\Models\poheader','ponumber','pono');
    }
}
