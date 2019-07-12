<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
  public function create(Request $request) {
    $follow = new Follow;
    $follow->user_id = Auth::user()->id;
    $follow->follow_id = $request->follow;
    $follow->save();

    return redirect("/users/index");
  }

  public function delete(Request $request) {
    $follow = Follow::whereRaw('user_id = :user_id and follow_id = :follow_id',
                              ['user_id' => Auth::user()->id ,'follow_id' => $request->follow])->first();
    $follow->delete();

    return redirect("/users/index");

    public function select(){
$followers = \DB::TwitterClone('followers')
->select('followers.id as followers_id',)
->leftJoin('users', 'followers.id', '=', 'users.id')
->get();


}
}
