<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App
 * @property string $title
*/
class Role extends Model
{
   protected $table = 'roles';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['name','display_name','description'];

     protected $dates = [];

        public function company()
    {
        return $this->belongsTo('App\Models\company','company_id');
    }
    // public function MappedUsers()
    // {
    //    return $this->hasMany('App\User','role_id','id');
    // }


}

