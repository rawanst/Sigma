<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRegisterRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerUpdate($email, UserUpdateRegisterRequest $request){
        $param = $request->validated();
        $user = User::find($email);
        $user->update($param);
        return back();
    }
}
