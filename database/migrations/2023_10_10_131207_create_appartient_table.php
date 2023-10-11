<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartient', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('id_organisation');
            $table->integer('id_utilisateur');
            //$table->foreignId('id')->constrained(table: 'utilisateur', indexName: 'id_utilisateur');
            //$table->foreignId('id')->constrained(table: 'organisateur', indexName: 'id_organisation');
            $table->timestampTz('created_at', $precision = 0);
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appartient');
    }
}
