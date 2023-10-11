<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('id_utilisateur'); // clé venant de la table utilisateur
            //$table->foreignId('id')->constrained(table: 'utilisateur', indexName: 'id_utilisateur');
            $table->text('image',255)->nullable(); // contiendra le chemin d'acces au fichier image
            $table->string('denomination')->unique();
            $table->string('domaine',255);
            $table->text('details',255)->nullable();
            $table->integer('abonnes')->default(0);
            $table->integer('membres')->default(0);
            $table->geometry('localisation')->nullable();
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
        Schema::dropIfExists('organisation');
    }
}
