<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/site';

   
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create( array $data)
    {
        $fileName = 'null';
        if (Input::file('image')) {
            $destinationPath = public_path('uploads/files');
            $extension = Input::file('image')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            Input::file('image')->move($destinationPath, $fileName);
        }
        
        // $request = request();
        // $profileImage = $request->file('image');
        // $profileImageSaveAsName = time() ."-profile." .$profileImage->getClientOriginalExtension();
        // $upload_path = 'profile_images/';
        // $profile_image_url = $upload_path . $profileImageSaveAsName;
        // $success = $profileImage->move($upload_path, $profileImageSaveAsName);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'image'=>$fileName,
            'password' => Hash::make($data['password']),
          
        ]);




        }
}
