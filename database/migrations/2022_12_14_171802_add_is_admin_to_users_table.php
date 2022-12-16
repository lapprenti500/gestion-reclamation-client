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
        //la fonction up permet de mdifier la table users
        Schema::table('users', function (Blueprint $table) {
            //ajouter a la table users la colonne isAdmin de type boolean, don la valeur par defaut est false et se place apres emailverifedat
            $table->boolean('is_admin')->default(false)->after('email_verified_at');
            $table->timestamp('approved_at')->nullable()->after('created_at');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //laravel utilise le systeme de migration, on doit systematiquemenet quand on ajoute des elements dans une table en prevoir la supression pour revenir en arriere a l'etat 
        //initial avant l'ajout des nouvelles tables
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('is_admin');
            $table->removeColumn('approved_at');
        });
    }
};
