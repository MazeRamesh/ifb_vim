<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quotations';

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
                  'quotation_number',
                  'quotation_date',
                  'quotation_company_code',
                  'quotation_customer_code',
                  'project_name',
                  'description',
                  'reference',
                  'quotation_product_code',
                  'item_description',
                  'item_price',
                  'item_sgst',
                  'item_cgst',
                  'item_igst',
                  'item_subtotal',
                  'item_taxtotal',
                  'quotation_amount',
                  'quotation_amount_inwords'
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
     * Set the quotation_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setQuotationDateAttribute($value)
    {
        $this->attributes['quotation_date'] = !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value) : null;
    }

    /**
     * Get quotation_date in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getQuotationDateAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y', $value);

    }

}
