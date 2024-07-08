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
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->string('kf_customer_Id');
            $table->string('customer_name');
            $table->string('lot_no');
            $table->string('awb');
            $table->string('carrier');
            $table->string('broker');
            $table->string('supplier');
            $table->string('shipper');
            $table->string('temp');
            $table->integer('qty');
            $table->decimal('weight', 10, 2);
            $table->string('driver')->nullable();
            $table->date('eta_date')->nullable();
            $table->time('eta_time')->nullable();
            $table->date('arrival_date')->nullable();
            $table->time('arrival_time')->nullable();
            $table->string('consignee');
            $table->string('product');
            $table->string('url');
            $table->boolean('reGel')->default(false);
            $table->boolean('reIce')->default(false);
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
        Schema::dropIfExists('lots');
    }
};
