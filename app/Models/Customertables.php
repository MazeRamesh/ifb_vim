<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customertables extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customertables';

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
                  'customercode',
                  'customername',
                  'customertype',
                  'customeraddress',
                  'consigneeaddress',
                  'customerGSTINno',
                  'customerphoneno',
                  'customermobileno',
                  'customeremail',
                  'plantcode',
                  'shopcode',
                  'pdsno',
                  'pdsdate',
                  'customercity',
                  'customerstate',
                  'customerstaus',
                  'created_at',
                  'updated_at',
                  'customerstatecode',
                  'vendorcode',
                  'typeofbusiness',
                  'customerpanno', 
                  'location',
                  'gateno',       
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


}
