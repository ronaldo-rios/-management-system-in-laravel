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
        //Add columns on providers table:
        Schema::table('providers', function(Blueprint $table){
            $table->string('site', 50)->after('name')->nullable();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Add columns on providers table:
        Schema::table('providers', function(Blueprint $table){
            $table->dropColumn('site');
         });
    }
};
