<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function store(Request $request){
        
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('username', 'password',), $request->remember)){
            return back()->with('message', 'Invalid creditentials');
        }

        return redirect()->route('feed');
    }
}
