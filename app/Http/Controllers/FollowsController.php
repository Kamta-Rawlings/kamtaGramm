<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowsController extends Controller
{

//   public function store($userId)
// {
//   $user = User::findOrFail($userId);
//   return $user->username;
//   // return auth()->user()->following()->toggle($user->profile);
// } 

   public function __construct() 
   {
    $this->middleware('auth');
   }

    public function store(User $user)
    {
      // return $user->username;
      return auth()->user()->following()->toggle($user->profile);
    }
}
