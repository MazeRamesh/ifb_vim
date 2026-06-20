<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialDetail extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'material_details';

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
                  'material_code',
                  'part_no',
                  'customer_part_no',
                  'shop_code',
                  'shop',
                  'gate',
                  'box_qty',
                  'plant_code',
                  'hsn_code',
                  'gst_in',
                  'product_desc'
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
    



}
