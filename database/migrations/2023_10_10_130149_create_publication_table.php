<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('id_utilisateur');
            //$table->foreignId('id')->constrained(table: 'utilisateur', indexName: 'id_utilisateur');
            $table->text('libelle')->nullable();
            $table->enum('sujet',['vente','dressage','saillie','croisement','import/export','alimentation','entretien','sante','divers'])->default('divers');
            $table->multiLineString('images')->nullable();
            $table->timestampTz('created_at', $precision = 0);
            $table->timestampTz('updated_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication');
    }
}
