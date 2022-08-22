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

    public function loginUser(Request $request){
        $username = $request->username;
        $password = $request->password;
        $user = User::where('username', $username)->first();
        if(!empty($user)){
            if($user->password == $password){
                $request->session()->put('sessionUserId', $user->id);
                $request->session()->put('sessionUser', $user->username);
                $request->session()->put('sessionName', $user->name);
                $request->session()->put('sessionLastname', $user->lastname);
                $request->session()->put('sessionRole', $user->role);
                $request->session()->put('sessionPhoto', $user->photo);
                return redirect()->route('home');
            }else{
                return view('templatesUser.loginUser')->with('message', $message='Error:Contraseña incorrecta');
            }
        }else{
            return view('templatesUser.loginUser')->with('message', $message='Error:Usuario no existe');
        }
    }

    public function logoutUser(Request $request){
        $request->session()->forget('sessionUser');
        $request->session()->forget('sessionRole');
        $request->session()->forget('sessionPhoto');
        return view('templatesUser.loginUser')->with('message', $message='Sesión cerrada');
    }
}
