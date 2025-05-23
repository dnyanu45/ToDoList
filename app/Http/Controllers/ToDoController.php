<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ToDoController extends Controller
{
    public function add_task(){
        $userId = Auth::id();

        // dd($userId);
        return view('add_task', compact('userId'));
    }

    
    public function store(Request $request){
        
        $rules = [
            'taskname' => 'required',
            'taskdesc' => 'required',
            'taskdate' => 'required|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $task = new Task();
        $task->user_id = $request->user_id;
        $task->taskname = $request->taskname;
        $task->taskdesc = $request->taskdesc;
        $task->taskdate = $request->taskdate;
        $task->timeto = $request->timeto;
        $task->timetill = $request->timetill;
        $task->status = $request->status;
        $task->priority = $request->priority;
        $task->save();
        return redirect()->route('display-task')->with('success', "Task {$task->id} added successfully");
        
    }

    public function display_taks(){ 
        $user = auth()->id();
        $task = Task::where('user_id', $user)->orderBy('taskdate')->paginate(2);

        $groupedTask = $task->getCollection()->groupBy(function($task){
            return Carbon::parse($task->taskdate)->format('Y-m-d');
        });
        return view('display_task', compact('task', 'groupedTask'));
    }

    public function edittask_page($id){ 
        $task = Task::findOrFail($id);
        return view('edit_task', compact('task'));
    }

    public function edit_task(Request $request, $id){
        $task = Task::findOrFail($id);
        $rules = [
            'taskname' => 'required',
            'taskdesc' => 'required',
            'taskdate' => 'required|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $task = new Task();
        $task->taskname = $request->taskname;
        $task->taskdesc = $request->taskdesc;
        $task->taskdate = $request->taskdate;
        $task->timeto = $request->timeto;
        $task->timetill = $request->timetill;
        $task->status = $request->status;
        $task->priority = $request->priority;
        $task->save();
        return redirect()->route('display-task')->with('success', "Task {$task->id} updated successfully");
    }

    public function delete_task($id){ 
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('display-task')->with('success', 'Task deleted successfully!');
    }

    public function pending_task(){ 
        $user = Auth()->id();
        $task = Task::where('user_id', $user)->where('status', 'pending')->get();
        // dd($task);
        return view('pending', compact('task'));
    }



    public function high_priority_task(){ 
        $user = Auth()->id();
        $task = Task::where('user_id', $user)->where('priority', 'high')->get();
        // dd($task);
        return view('high_priority_task', compact('task'));
    }

}
