<?php

namespace App\Http\Controllers;

use App\Models\Task;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    //plutot que d'utiliser la fonction getallusers dans plusieurs endroits, on peut creer une propriete qui contient tous les utilisateurs
    //nous allons nous servir du constructeur de la classe pour definir la propriete
    public function __construct()
    {
        //nous allons affecter a la propriete users que nous venons de definr 
        $this->users = User::getAllUsers();
    }
    
    public function tasksPage(){
        // return all tasks in the database
        $tasks = DB::table('tasks')->simplePaginate(10);

        //avant qu'on return les taches, on va prendre le nombre de tache au total qu'on a
        //la variable $task est une liste, on peut utiliser count pour avoir le nbre
        //d'element au total qui est aussi le nombre de tache
        // $totalTasks =  $tasks->count();
        // return view('tasksPage', ['tasks'=>$tasks], ['totalTasks'=>$totalTasks]);

        $users = $this->users;
        
        //on recupere les taches specifiques au status
        $completedTask = DB::table('tasks')->where('status', 'Traitée')->get()->count();
        $waitingTask = DB::table('tasks')->where('status', 'En attente')->get()->count();
        $rejectedTask = DB::table('tasks')->where('status', 'Rejetée')->get()->count();
        //et on passe ca a la view

         //1st parameter : the template that we want to use
        //2nd parameter : data that we want to pass to our view
        //the key is going to be used in the index to access all the tasks
        return view('tasksPage', ['tasks'=>$tasks,'users'=>$users, 'completedTask'=>$completedTask,'waitingTask'=>$waitingTask, 'rejectedTask'=>$rejectedTask]);
        //we can also call the with function
        //return view('index')->with('tasks', $tasks);
    }

    public function createTaskForm(){
        //just return the template createTaskForm
        return view('createTaskForm');
    }

    /*
    *display the task that are in status'en attente'
    */
    public function waitingTask(){
        $users = $this->users;
        $tasks = Task::where('status', 'En attente')->simplePaginate(10);
        $completedTask = DB::table('tasks')->where('status', 'Traitée')->get()->count();
        $waitingTask = DB::table('tasks')->where('status', 'En attente')->get()->count();
        $rejectedTask = DB::table('tasks')->where('status', 'Rejetée')->get()->count();
        return view('tasksPage', compact('tasks', 'users', 'completedTask', 'waitingTask', 'rejectedTask'));

    }

    /*
    *display the task that are in status'rejetee'
    */
    public function rejectedTask(){
        $users = $this->users;
        $tasks = Task::where('status', 'Rejetée')->simplePaginate(10);
        $completedTask = DB::table('tasks')->where('status', 'Traitée')->get()->count();
        $waitingTask = DB::table('tasks')->where('status', 'En attente')->get()->count();
        $rejectedTask = DB::table('tasks')->where('status', 'Rejetée')->get()->count();
        return view('tasksPage', compact('tasks', 'users', 'completedTask', 'waitingTask', 'rejectedTask'));


    }

    /*
    *display the task that are in status'traitee'
    */
    public function completedTask(){
        $users = $this->users;
        $tasks = Task::where('status', 'Traitée')->simplePaginate(10);
        $completedTask = DB::table('tasks')->where('status', 'Traitée')->get()->count();
        $waitingTask = DB::table('tasks')->where('status', 'En attente')->get()->count();
        $rejectedTask = DB::table('tasks')->where('status', 'Rejetée')->get()->count();
        return view('tasksPage', compact('tasks', 'users', 'completedTask', 'waitingTask', 'rejectedTask'));


    }

    /*
    *display the task that are in status'e cours de '
    */
    public function inProgressTask(){
        $users = $this->users;
        $tasks = Task::where('status', 'En cours de traitement')->simplePaginate(10);
        $completedTask = DB::table('tasks')->where('status', 'Traitée')->get()->count();
        $waitingTask = DB::table('tasks')->where('status', 'En attente')->get()->count();
        $rejectedTask = DB::table('tasks')->where('status', 'Rejetée')->get()->count();
        return view('tasksPage', compact('tasks', 'users', 'completedTask', 'waitingTask', 'rejectedTask'));


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

    return \redirect('/tasksPage');}

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

        return \redirect('/tasksPage');

    }

    //permet de supprimer une tache
    // public function deleteTask (Request $request, $id){//la variable vient de la page edittask quand une tache est rejetee
    //     DB::delete('tasks')->where('id', $id)->delete();
    //     return back(); //permet d'afficher a la page que nous trouvons mais de facon actualisee
    // }

    //vous amene a la page des users
    public function userAdmin(){
        // $users = DB::table('users')->get();
        return view('userAdmin');
    }














}
