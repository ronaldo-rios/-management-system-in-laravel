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
        Schema::create('unit_of_measurement', function (Blueprint $table) {
            $table->id();
            $table->string('unit', 3);
            $table->string('description', 30);
            $table->timestamps();
        });

//Relationship HAS MANY - N:1 - Many to One:

        //Add relashionship constraint with products table:
        Schema::table('products', function(Blueprint $table){
            $table->unsignedBigInteger('unit_id');

            //Add constraint:
            $table->foreign('unit_id')->references('id')->on('unit_of_measurement');
        });

        //Add relashionship constraint with product_details table:
        Schema::table('product_details', function(Blueprint $table){
            $table->unsignedBigInteger('unit_id');

            //Add constraint:
            $table->foreign('unit_id')->references('id')->on('unit_of_measurement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Removing referencial integrity in product_details:
        Schema::table('product_details', function(Blueprint $table){
            //Removing foreign Key:
            $table->dropForeign('product_details_unit_id_foreign');
            //Removing column:
            $table->dropColumn('unit_id');
        });

        //Removing referencial integrity in products:
        Schema::table('products', function(Blueprint $table){
            //Removing foreign Key:
            $table->dropForeign('products_unit_id_foreign');
            //Removing column:
            $table->dropColumn('unit_id');
        });

        Schema::dropIfExists('unit_of_measurement');
    }
};
