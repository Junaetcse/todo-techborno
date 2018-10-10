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
        $tasks = new Tasks();
        $data = $this->validate($request, [
            'lists_id'=>'required',
            'title'=> 'required',
            'description'=> 'required',
            'type'=> 'required',
            'date'=> 'required',
            'priority'=>'required',
            'status'=>'required' 
        ]);
        $data['id'] = $id;
        $tasks->updateTask($data);
        return  redirect('/showList/'.$data['lists_id'])->with('success', 'Task  has been updated successfully    !!');
    }

    public function destroy($id) {
        $task = Tasks::find($id);
        $task->delete();
        return redirect('/admin')->with('success', 'Ticket has been deleted!!');
    }
}
