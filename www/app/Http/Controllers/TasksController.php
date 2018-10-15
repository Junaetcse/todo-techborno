<?php

namespace App\Http\Controllers;
use Auth;
use App\Tasks;
use App\Lists;
use App\User;
use View;
use Illuminate\Http\Request;

class TasksController extends Controller{

    public function allTasks(){
        $tasks = Tasks::all();
        $lists = Lists::where('user_id',Auth::user()->id)->orderBY('id','desc')->get();
        return View::make('site.tasks',compact('lists','tasks'));
    }

// public function profile(){
//     $lists = Lists::where('user_id',Auth::user()->id)->orderBY('id','desc')->get();
//     return View::make('site.user_profile',compact('lists'));
// }

public function profile(){
     $lists = Lists::where('user_id',Auth::user()->id)->orderBY('id','desc')->get();

    $user=Auth::user();
    return View::make('site.user_profile',compact('user','lists'));

}

    public function tasks_details($list_id){
        $lists = Lists::where('user_id',Auth::user()->id)->orderBY('id','desc')->get();
        $tasks = Tasks::where('lists_id',$list_id)->orderBY('id','desc')->get();
        $single_list = Lists::where('id',$list_id)->get();
        return View::make('site.tasks',compact('lists','tasks','single_list'));
    }

    public function store(Request $request,$id){
        $tasks=new Tasks();
        $tasks->lists_id=$id;
        $tasks->title=$request->get('title');
        $tasks->description=$request->get('description');
        $tasks->type=$request->get('type');
        $tasks->date=$request->get('date');
        $tasks->priority=$request->get('priority');
        $tasks->status=$request->get('status');
        $tasks->save();
        return redirect('/showList/'.$id)->with('success', 'Ticket has been deleted!!');
    }

    public function show(tasks $tasks){
        $tasks=Tasks::all();
        return $tasks;
    }

    public function edit($id){
        $lists=Lists::where('user_id',Auth::user()->id)->orderBY('id','desc')->get();
        $edit_tasks=Tasks::where('id',$id)->get();
        return View::make('site.details_task',compact('edit_tasks','lists'));
    }

    public function update(Request $request, $id) {
        $task=Tasks::find($id);
        $task->lists_id=$request->get('lists_id');
        $task->title=$request->get('title');
        $task->description=$request->get('description');
        $task->type=$request->get('type');
        $task->date=$request->get('date');
        $task->priority=$request->get('priority');
        $task->status=$request->get('status');
        $task->save();
        return  redirect('/showList/'.$data['lists_id'])->with('success', 'Task  has been updated successfully    !!');
    }

    public function destroy($id) {
        $task = Tasks::find($id);
        $task->delete();
        return redirect('/admin')->with('success', 'Ticket has been deleted!!');
    }
}
