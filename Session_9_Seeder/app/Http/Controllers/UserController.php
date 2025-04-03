<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function paginateUser(){
        // $user = User::paginate(3);
        $user = User::simplePaginate(3);
        // $user = User::cursorPaginate(3);
        return view('welcome', compact('user'));
    }
}
