<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
  
    public function index()
    {
       
        if (\Auth::check()) {
           // $tasks = Task::user()->id;
            $tasks = \Auth::user()->tasks;
           // dd($tasks)->toArray();
            return view('tasks.index', [
                'tasks' => $tasks,
            ]);   
       
        } else {
            return view('welcome');
        }
    }   
        
  public function show($id)
  {
     $task = Task::find($id);
     return view('tasks.show', [
         'task'=> $task,
         ]);
      
  }
  
 public function create()
  {
     $task = new Task;
     return view('tasks.create', [
         'task' => $task,
        ]);
  }

  public function store(Request $request)
  {
       $this->validate($request, [
       'status'=> 'required|max:10',   
       'content'=> 'required|max:255',]);
       
        $task = new Task;
        $task->status = $request->status;
        $task->content = $request->content;
        $task->user_id = \Auth::user()->id;
        $task->save();

        return redirect('/');
   }
    
   public function edit($id)
   {
        $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'status'=> 'required|max:10',  
        'content'=> 'required|max:255',]);
        
        $task = Task::find($id);
        $task->status = $request->status;
        $task->content = $request->content;
       // $task->user_id = \Auth::user()->id;
        $task->save();

        return redirect('/');
    }
    
     public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/');
    }
}