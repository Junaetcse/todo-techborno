<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use View;
use App\Lists;


class UserController extends Controller
{
    //

    public function edit($id){
        $user_details=User::where('id',$id)->get();
        $user=Auth::user();
        return View::make('site.user_details',compact('user','user_details'));
    }


    public function profile(){
       $lists = Lists::where('user_id',Auth::user()->id)->orderBY('id','desc')->get();
       $user=Auth::user();
       return View::make('site.user_profile',compact('user','lists'));
   
   }




    public function update(Request $request, $id) {

        $fileName = 'null';
        if ($request->file('image')) {
            $destinationPath = public_path('uploads/files');
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('image')->move($destinationPath, $fileName);
        }

        $user=User::find($id);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=$request->get('password');
        $user->image=$fileName;
        $user->update();
        return  redirect()->back();
   }
}
