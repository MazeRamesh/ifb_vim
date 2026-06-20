<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_details', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('material_code')->nullable();
            $table->string('part_no')->nullable();
            $table->string('customer_part_no')->nullable();
            $table->string('shop_code')->nullable();
            $table->string('shop')->nullable();
            $table->string('gate')->nullable();
            $table->integer('box_qty')->unsigned()->nullable();
            $table->string('plant_code')->nullable();
            $table->string('hsn_code')->nullable();
            $table->string('gst_in')->nullable();
            $table->string('product_desc')->nullable();
            $table->unique(['part_no','plant_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('material_details');
    }
}
