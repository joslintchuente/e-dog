<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('designation')->default('inconnue');
            $table->string('origine')->nullable();
            $table->string('image')->nullable(); // chemin d'acces?+nom_image
            $table->integer('poids_moyen')->default(40); // en Kg
            $table->integer('taille_moyenne')->default(100); // en cm
            $table->enum('aggressivite',['1','2','3','4','5','6','7','8','9','10'])->default('4');
            $table->enum('docilite',['1','2','3','4','5','6','7','8','9','10'])->default('4');
            $table->integer('esperance_vie')->default(5);
            $table->text('commentaire')->nullable();
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
        Schema::dropIfExists('race');
    }
}
