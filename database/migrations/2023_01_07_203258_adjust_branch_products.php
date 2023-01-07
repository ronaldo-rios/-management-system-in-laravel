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
        //Creating branches table:
        Schema::create('branches', function(Blueprint $table){
            $table->id();
            $table->string('branch_name', 30);
            $table->timestamps();
        });

        //Creating branches_product table:
        Schema::create('branches_product', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('branches_id');
            $table->unsignedBigInteger('products_id');
            $table->decimal('price', 8, 2);
            $table->integer('min_stock')->default(1);
            $table->integer('max_stock');
            $table->timestamps();

            //constraints foreign key:
            $table->foreign('branches_id')->references('id')->on('branches');
            $table->foreign('products_id')->references('id')->on('products');
            
        });

        //Removing columns on products table:
        Schema::table('products', function(Blueprint $table){
           $table->dropColumn(['price', 'min_stock', 'max_stock']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Add columns on products table:
        Schema::table('products', function(Blueprint $table){
            $table->decimal('price', 8, 2);
            $table->integer('min_stock')->default(1);
            $table->integer('max_stock');
         });

        Schema::dropIfExists('branches_product');
        Schema::dropIfExists('branches');
    }
};
