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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            /* $table->string('img');*/
           $table->string('article');
           $table->text('nomenclature');
           $table->bigInteger('price')->unsigned();
           $table->bigInteger('count')->unsigned();
           $table->bigInteger('stock_id')->unsigned();

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
};
