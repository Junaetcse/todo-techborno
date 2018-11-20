<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use View;
use App\Lists;
use Illuminate\Support\Facades\Hash;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;


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
        $user=User::find($id);
        $fileName = $user->image;
        if ($request->file('image')) {
           File::delete('uploads/files/' . $user->image);
            $destinationPath = public_path('uploads/files');
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('image')->move($destinationPath, $fileName);
            $image_sizing=  Image::make('uploads/files/'.$fileName)->resize(512, 512)->save('uploads/files/'.$fileName);

        }
        $old_password = $request->get('old_password');
        $new_password = $request->get('new_password');

        if ($new_password) {
             $password = Hash::make($new_password);
              $user->password = $password;
        }else{
              $user->password = $old_password;
        }
       
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->image=$fileName;
        $user->update();
        return  redirect()->back();
   }
}
