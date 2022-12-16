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
    //a migration help us create and manage a database table.
    //php artisan make:migration, et on specifie le nom de la migration. le nom doit etre ce que la migration fait, ici, create_tasks_table.  If you would like to generate 
    //a database migration when you generate the model, you may use the --migration or -m option: php artisan make:model Task --migration; php artisan make:model Task -m
    //run ( ) allow to run the migration. php artisan migrate. laravel will run the code that is in the run() function in all the migration files. and creates the tables in
    //those run()
    /*php artisan migrate:refresh gonna rollback and run the new migration  */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->text('titre'); //create a column titre and the type of that column should be string
            $table->text('description');
            $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //allow to undo the migration
    //php artisan migrate:rollback drop all tables that is in each migrations files
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
