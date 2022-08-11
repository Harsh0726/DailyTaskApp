<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request){
        

        //task can't be null
        $this->validate($request,[

            'task'=>'required|max:100|min:5',

        ]);

        //dd($request->all());

        $task=new Task;

        //add user input data into task varibale in datatbase
        $task->task=$request->task;
        $task->save();

        $data=Task::all();
        //dd($data);

        return view('task')->with('tasks',$data);

        
        //---move to another view
        //return view('/task');
    }

    public function updateTaskAsCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=1;
        $task->save();

        $data=Task::all();
        //----after save still in same page
        return redirect()->back()->with('tasks',$data); // edit
    }

    public function updateTaskAsNotCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=0;
        $task->save();

        $data=Task::all();

        return redirect()->back()->with('tasks',$data);
    }

    public function deleteTask($id)
    {
        $task=Task::find($id);
        $task->delete();
        return redirect()->back();
    }

    public function updateTaskView($id){
        $task=Task::find($id);

        return view('updatetask')->with('taskdata',$task);
    }

    public function editTask(Request $request){
        // dd($request);
        $id=$request->id;
        $task=$request->task;

        $data=Task::find($id);
        $data->task=$task;
        $data->save();

        $datas=Task::all();
        return view('/task')->with('tasks',$datas);
    }
}
