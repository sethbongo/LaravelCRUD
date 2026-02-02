<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Task;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controllers\HasMiddleware;


class TaskController extends Controller implements HasMiddleware
{

    public static function middleware(): array
{
    return [
        'checkuser',
    ];
}


    public function savetask(Request $request){
        $incoming = $request->validate([
        'title' => 'required',
        'tasks'=> 'required',
        'date_to_do' => ['required', 'date', 'after_or_equal:today']
        ]
        );
        $incoming['is_done'] = false;
        $incoming['user_id'] = Session::get('user_id');

        Task::create($incoming);
        return redirect()->route('welcome');
    }


    public function getTasks(){
        $tasks = Task::where('user_id', Session::get('user_id'))->get();
        // $user = User::find(Session::get('user_id'));
        // $tasks = $user->tasks();
        // $tasks = Session::get('user_id')->
        return view('todopage', ['tasks'=>$tasks]);

    }
    
    public function taskdelete(Task $task){
        if (Session::get('user_id') == $task['user_id']){
            $task->delete();
        }
        return redirect()->route('welcome');
    }

    public function editTask(Task $task){
        if (Session::get('user_id') != $task['user_id']){
            return redirect()->route('welcome');
        }
        
        $tasks = Task::where('user_id', Session::get('user_id'))->get();
        return view('todopage', ['tasks'=>$tasks, 'editTask'=>$task]);
    }

    public function updateTask(Request $request, Task $task){

        $incoming = $request->validate([
            'title' => ['required', 'max:255'],
            'tasks'=> ['required'],
            'date_to_do' => ['required', 'date', 'after_or_equal:today']
        ]);
        $incoming['is_done'] = false;

        $task->update($incoming);
        return redirect()->route('welcome');
    }


    public function doneTask(Request $request, Task $task){
        if (Session::get('user_id') != $task['user_id']){
            return redirect()->route('welcome');
        }
        
        $task->update(['is_done' => !$task->is_done]);
        
        return redirect()->route('welcome');
    }

}
