<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class poheader extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'poheaders';

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
                  'pouniqueno',
                  'pono',
                  'podate',
                  'customercode_id',
                  'vchtypecode_id',
                  'taxtypes',
                  'taxableamounts',
                  'igstamount',
                  'cgstamount',
                  'sgstamount',
                  'otheramount',
                  'discountamount',
                  'taxamounts',
                  'grandtotalamount',
                  'taxamountword',
                  'grandtotalamountword',
                  'createdby',
                  'createdlocation',
                  'companyid',
                  'Freight_amt',
                  'Packing_amt',
                  'status',
        'created_at',
        'updated_at'
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
    public function customercode()
    {
        return $this->belongsTo('App\Models\Customertables','customercode_id');
    }

    /**
     * Get the vchtypecode for this model.
     */
    public function vchtypecode()
    {
        return $this->belongsTo('App\Models\Vchtypes','vchtypecode_id');
    }
    
    public function podetail()
    {
        return $this->hasMany('App\Models\podetails','pono_id','pono');
    }
    



}
