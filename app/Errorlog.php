<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Errorlog extends Model
{
    //
    protected $table = 'error_logs';

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
                  'unsigned_file_id',
                  'inv_no',
                  'file_name',
                  'error_code',
                  'error_desc'
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
