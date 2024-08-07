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
        Schema::table('cocktails', function (Blueprint $table) {
            $table->float('price')->after('glass_type'); // Aggiunge la colonna price dopo glass_type
            $table->string('img')->after('id'); // Aggiunge la colonna img dopo id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cocktails', function (Blueprint $table) {
            $table->dropColumn('price'); // Rimuove la colonna price
            $table->dropColumn('img'); // Rimuove la colonna img
        });
    }
};
