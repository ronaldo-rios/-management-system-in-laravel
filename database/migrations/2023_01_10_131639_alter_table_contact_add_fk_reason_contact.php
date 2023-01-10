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
        Schema::table('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('reason_contacts_id');
        });

        // Executing a query. Atributting reason_contacts to reason_contacts_id:
        DB::statement('update contacts set reason_contacts_id = reason_contact');

        // Creating constraint fk and removing column old reason_contact on contacts table:
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('reason_contacts_id')->references('id')->on('reason_contacts');
            $table->dropColumn('reason_contact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Creating column reason_contact and removing constraint:
        Schema::table('contacts', function (Blueprint $table) {
            $table->integer('reason_contact');
            $table->dropForeign('contacts_reason_contacts_id_foreign');
        });

        DB::statement('update contacts set reason_contact = reason_contacts_id');

        // Removing column to foreign:
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('reason_contacts_id');
        });

    }
};
