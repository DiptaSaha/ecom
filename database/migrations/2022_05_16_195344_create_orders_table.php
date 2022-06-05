<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->text('shipping_address')->nullable();        
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->text('message')->nullable();
            $table->integer('product_finalPrice')->nullable();
            $table->integer('pricewithcoupon')->nullable();
            $table->integer('is_paid')->nullable();
            $table->integer('payment_id')->nullable()->comment("1 for Bkash, 2 for Nagad,3 for Rocket, 4 for COD ");
            $table->string('transection_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
