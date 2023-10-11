<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone',9)->unique();
            $table->string('email')->unique()->nullable();
            $table->string('mot_de_passe');
            $table->string('photo')->nullable();
            $table->enum('ville', 
                [
                'Yaoundé', 
                'Douala',
                'Bafoussam',
                'Bamenda',
                'Limbe',
                'Edea',
                'Dschang',
                'Maroua',
                'Ngaoundéré',
                'Kribi',
                'Bertoua',
                'Garoua',
                'Nkongsamba',
                'Bafang',
                'Batouri',
                'Ebolowa',
                'Foumban',
                'Meiganga',
                'Mokolo',
                'Sangmélima',
                'Tiko',
                'Mbouda',
                'Yagoua',
                'Abong-Mbang',
                'Nkoteng',
                'Mbandjock',
                'Kumba',
                'Buea',
                'Nkambe',
                'Kousseri',
                'Obala',
                'Bafia',
                'Tchollir',
                'Banyo',
                'Fontem',
                'Guider',
                'Melong',
                'Lolodorf',
                'Loum',
                'Manjo',
                'Mbalmayo',
                'Mbanga',
                'Nanga-Eboko',
                'Ngambe',
                'Ntui',
                'Penja',
                'Tibati',
                'Wum',
                'Yokadouma',
                'Ambam',
                'Mfou'
                ]
            );
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
        Schema::dropIfExists('utilisateur');
    }
}
