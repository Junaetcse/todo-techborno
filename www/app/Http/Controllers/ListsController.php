<?php

namespace App\Http\Controllers;
use Auth;
use App\Lists;
use App\User;
use View;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    private $userModel;

    public function __construct(User $userModel){
        $this->userModel = $userModel;
    }

    public function admin_dashboard(){
        $totalTask = $this->userModel->totalTasks();
        $completedTask = $this->userModel->completedTasks();
        $priorityTasks = $this->userModel->priorityTasks();
        $upcommingTask = $this->userModel->upcommingTask();
        $lists = Lists::where('user_id',Auth::user()->id)->orderBY('id','desc')->get();
        return View::make('site.dashboard',compact('lists','totalTask','completedTask','priorityTasks','upcommingTask'));
    }

    public function store(Request $request){
        $lists= new Lists;
        $lists->user_id= Auth::user()->id;
        $lists->title=$request->get('title');
        $lists->save();
        return back();

    }

    public function show(lists $lists){
        $lists=Lists::where('user_id',Auth::user()->id)->orderBY('id','desc')->get();
        return view('admin_layout',['lists_info'=>$lists]);
    }

    public function update(Request $request, $id){
        $lists = new Lists();
        $data = $this->validate($request, [
            'title'=> 'required' 
            ]);
        $data['id'] = $id;
        $lists->updateList($data);
        return  back()->with('success', 'New support ticket has been updated!!');
    }

    public function destroy($id){
        $list = Lists::find($id);
        $list->delete();
        return redirect('/admin')->with('success', 'Ticket has been deleted!!');
    }
}
