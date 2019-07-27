<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
  public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      $users = User::whereNotIn('id',[Auth::user()->id])->paginate(5);

      return view('users.index',compact('users'));
    }

   public function follow($user)
    {
        $follower = Auth::user();
        if ($follower->id == $user) {
            return back()->withError("You can't follow yourself");
        }else{
          $follow = ["follow" => 1];
          User::where('id',$user)->update($follow);
        }

    }

    public function unfollow($user)
    {
      $follower = Auth::user();
      if ($follower->id == $user) {
          return back()->withError("You can't follow yourself");
      }else{
        $follow = ["follow" => 0];
        User::where('id',$user)->update($follow);
    }

  }
}
