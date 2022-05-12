<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('iGram.signup');
    }

    public function store(Request $request){
        

            $this->validate($request, [
                'email' => 'required|email',
                'fullName' => 'required',
                'username' => 'required|string|unique:users',
                'password' => 'required|confirmed'
            ]);
            
            $id =  User::insertGetId([
                'email' => $request->email,
                'name' => $request->fullName,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);

            Profile::create([
                'user_id' => $id,
                'username' => $request->username
            ]);
            

            auth()->attempt($request->only('email', 'password'));

        
        return redirect()->route('feed');

    }
}
