<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Follows;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function followers()
   {
       return $this->belongsToMany(self::class, 'followers', 'follows', 'user')
                   ->withTimestamps();
   }

   public function follows()
   {
       return $this->belongsToMany(self::class, 'followers', 'user', 'follows')
                   ->withTimestamps();
   }
   public function follow($userId)
    {
        $this->follows()->attach($userId);
        return $this;
    }

    public function unfollow($userId)
    {
        $this->follows()->detach($userId);
        return $this;
    }

    public function isFollowing($userId)
    {
      //auth()->user()->isFollowing()
      //じぶんのユーザモデルを取得する
      $result = false;
      $follows = Follow::where("user",$this->id);

      foreach ($follows as $value) {
        if($value->follow == $userId){
          $result = true;
          break;
        }
      }
      return $result;


      //return (boolean) $this->follows()->where('follows', $userId)->first(['id']);
    }

}
