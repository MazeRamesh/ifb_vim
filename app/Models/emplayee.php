<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class emplayee extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'emplayees';

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
                  'empcode',
                  'empname',
                  'company_id',
                  'empemail',
                  'empmobile',
                  'empaddress',
                  'empcity',
                  'empplace',
                  'empstatus',
                  'company_id',
        'created_at',
        'updated_at',
        'empplant'

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
     * Get the company for this model.
     */
    public function company()
    {
        return $this->belongsTo('App\Models\company','company_id');
    }



}
