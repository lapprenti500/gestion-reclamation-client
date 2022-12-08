<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index(){
        // return all tasks in the database 
        $tasks = DB::table('tasks')->get();
        
         //1st parameter : the template that we want to use
        //2nd parameter : data that we want to pass to our view
        //the key is going to be used in the index to access all the tasks
        return view('index', ['tasks'=>$tasks]);
        //we can also call the with function
        //return view('index')->with('tasks', $tasks);
    }

    public function createTaskForm(){
        //just return the template createTaskForm
        return view('createTaskForm');
    }

    //va recuperer toutes les valeurs ajoutee dans la balise input. request nous permet d'acceder aux donnees du formulaire
    //the input name must match the name in the names of input createaskform
   public function createNewTask(Request $request){
    $titre = $request->input('titre');
    $description = $request->input('description');
    $status = $request->input('status');

    //insert gonna insert a new row in the database 
    DB::table('tasks')->insert([
        'titre'=>$titre,
        'description'=>$description,
        'status'=>$status,
    ]);

    return \redirect('/');}

    public function editTaskForm(Request $request, $id){
        //where allow us to spcify the task that we want : la tache avec la clef id et la valeur $id
        $task = DB::table('tasks')->where('id', $id)->get();
        return view('editTaskForm', ['task'=>$task] );
    }


    public function editTask(Request $request){
        // request nous permet d'acceder aux donnees du formulaire
        //recuperer toutes les donnees entrees en input
        $id = $request->input('id'); // recupere l'id a modifier
        $titre = $request->input('titre');
        $description = $request->input('description');
        $status = $request->input('status');

        //update the row not with insert but with updae(), et on specifie la tache a mettre a jour. 
        //the id can be accessed fom the form editTaskForm
        DB::table('tasks')->where('id', $id)->update([
            'titre'=>$titre,
            'description'=>$description,
            'status'=>$status
        ]);

        return \redirect('/');


    }
    














}
