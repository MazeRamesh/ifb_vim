<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clientcompany extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clientcompanies';

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
                  'cmpcode',
                  'cmpname',
                  'cmpmailingname',
                  'cmpaddress',
                  'cmpgstino',
                  'cmpcountry',
                  'cmpstate',
                  'cmpcity',
                  'cmpemail',
                  'cmpphoneno',
                  'cmpmobileno',
                  'cmpwebsite',
                  'cmplogo'
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
