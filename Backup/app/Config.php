<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
    protected $fillable = 
        [
        'ewaybillserialkey',
        'ewaybillserialnewkey',
        'ewaybilltotalcount',
        'ewaybillremainingcount',
        'ewaybilltodaycount',
        'ewaybillactivationdate',
        'ewaybillexpirydate',
        'ewaybillremainingdays',
        'ewaybillusername',
        'ewaybilluserpassword',
        ];
}
