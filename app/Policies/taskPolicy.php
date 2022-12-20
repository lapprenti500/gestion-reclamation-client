<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class taskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // public function acceptedBy($task_id)
    // {
    //     $accepted_by = DB::table('tasks')->where('id', $task_id)->value('accepted_by');
    //     return Auth::user()->id != $accepted_by;
    // }

    // public function taskDone($task_id)
    // {
        
    //     $accepted_by = DB::table('tasks')->where('id', $task_id)->value('accepted_by');
    //     return Auth::user()->id == $accepted_by;
    // }
}
