<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationsAdditionnellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations_additionnelles', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('id_utilisateur');
            //$table->foreignId('id')->constrained(table: 'utilisateur', indexName: 'id_utilisateur');
            $table->enum('metier',[
                'Dresseur',
                'Vétérinaire',
                'Comportementaliste',
                'Éducateur canin',
                'Garde',
                'Éleveur',
            ]);
            $table->text('description',255)->nullable();
            $table->enum('certifie',['oui','non'])->default('non');
            $table->integer('experience')->default(1); // experience dans le domaine en annee
            $table->string('diplome')->nullable(); // photo du diplome si possible
            $table->enum('chenil',['oui','non'])->default('non'); // option pour eleveur
            $table->geometry('lieu_chenil')->nullable(); // option pour eleveur
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
        Schema::dropIfExists('informations_additionnelles');
    }
}
