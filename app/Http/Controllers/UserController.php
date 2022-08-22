<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function createUser(Request $request){
        $username = $request->username;
        $userExist = User::where('username', $username)->first();
        $emailExist = User::where('email', $request->email)->first();
        if(empty($userExist)){
            if(empty($emailExist)){
            if($request->file('photo') != null){
                $photo = $request->photo;
                $photo->move(public_path('images/'.$username.'/'.'profile/'), $username.'-'.Date('Ymd_His_').'.'.$photo->getClientOriginalExtension());
                $photo = 'images/'.$username.'/'.'profile/'.$username.'-'.Date('Ymd_His_').'.'.$photo->getClientOriginalExtension();
            }else{
                $photo = 'images/default.png';
            }
        try{
        $createUser = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $username,
            'birthday' => $request->birthday,
            'role' => 'user',
            'photo' => $photo,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }catch(\Exception $e){
            return view('templatesUser.createUser')->with('message', $message='Error:No se a podido crear el usuario');
        }
        return view('templatesUser.createUser')
        ->with('message', $message= 'Usuario creado con exito');
    }else{
        return view('templatesUser.createUser')->with('message', $message='Error:El correo ya existe');
    }
    }else{
        return view('templatesUser.createUser')
        ->with('message', $message= 'Error:El usuario ya existe');
    }
    }
}
