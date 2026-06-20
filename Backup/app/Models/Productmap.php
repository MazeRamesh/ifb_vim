<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productmap extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productmaps';

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
                  'product_id',
                  'customer_id',
                  'product',
                  'customer'
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
     * Get the product for this model.
     */
    public function productmap()
    {
        return $this->belongsTo('App\Models\Products','product_id');
    }

    /**
     * Get the cutomer for this model.
     */
    public function customermap()
    {
        return $this->belongsTo('App\Models\Customertables','customer_id');
    }



}
