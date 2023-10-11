<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministreurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administreur', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone',9)->unique();
            $table->string('email')->unique()->nullable();
            $table->string('mot_de_passe');
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
        Schema::dropIfExists('administreur');
    }
}
