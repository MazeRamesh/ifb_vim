<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
                  'productcode',
                  'productname',
                  'productpartno',
                  'productdescription',
                  'uom_id',
                  'customerpartno',
                  'customerpartname',
                  'customerpartdescription',
                  'productmanufactdate',
                  'productexpirydate',
                  'productmrprate',
                  'productsellingrate',
                  'productdealerrate',
                  'productigstrate',
                  'productcgstrate',
                  'productsgstrate',
                  'productqty',
                  'productclosingqty',
                  'productstatus',
                  'producthsncode',
                  
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
     * Get the uom for this model.
     */
    public function uom()
    {
        return $this->belongsTo('App\Models\Uom','uom_id');
    }



}
