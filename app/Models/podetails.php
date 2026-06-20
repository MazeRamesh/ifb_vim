<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class podetails extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'podetails';

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
                  'pono_id',
                  'podate',
                  'productcode_id',
                  'productname',
                  'partno',
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
                  'netamount',
                  'taxableamount',
                  'status',
        'created_at',
        'updated_at'
              ];
    protected $appends=['originalsellingrate'];
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
     * Get the pono for this model.
     */
    public function pono()
    {
        return $this->belongsTo('App\Models\Pono','pono_id');
    }

    /**
     * Get the productcode for this model.
     */
    public function productcode()
    {
        return $this->belongsTo('App\Models\Productcode','productcode_id');
    }

public function getOriginalSellingRateAttribute(){
    return $this->attributes['productsellingrate'];
}

}
