<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('trailer');
            $table->date('release');
            $table->float('price');
            $table->integer('sale-of');
            $table->string('platforms');
            $table->string('developer');
            $table->string('publisher');
            $table->string('describe');
            $table->string('image');
            $table->integer('status');
            $table->string('system_minium');
            $table->string('system_requie');
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
        Schema::dropIfExists('products');
    }
}
