<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index(){
        // Retrieve all users from the database and pass them to the view
        $this->authorize('viewAny', User::class);
        $users = User::all();
        return view('backend.layouts.user.index',compact('users'));
    }
}
