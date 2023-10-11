<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionnel', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->enum('metier',[
                'Dresseur',
                'Vétérinaire',
                'Comportementaliste',
                'Éducateur canin',
                'Garde',
                'Éleveur',
            ]);
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
        Schema::dropIfExists('professionnel');
    }
}
