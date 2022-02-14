<?php

namespace App\Http\Controllers\APIAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Logout extends Controller
{
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return true;
    }
}
