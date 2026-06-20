<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCustomerMapping extends Model
{
	protected $table="products_customer_mappings";
	
    protected $fillable=['product_id','customer_id','productsellingrate'];

}
