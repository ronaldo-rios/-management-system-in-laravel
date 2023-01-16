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
        
        // Creating column that will receive FK from providers primary key
        Schema::table('products', function(Blueprint $table) {

            // Insert register of provider to establish a relationship:
            $provider_id = DB::table('providers')->insertGetId([
                'name' => 'Fornecedor Padrão Teste',
                'site' => 'teste.com',
                'UF' => 'RS',
                'email' => 'teste@outlook.com'
            ]);

            // Criation column and constraint:
            $table->unsignedBigInteger('provider_id')->default($provider_id)->after('id');
            $table->foreign('provider_id')->references('id')->on('providers');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign('products_provider_id_foreign');
            $table->dropColumn('provider_id');
        });
        
    }
};
