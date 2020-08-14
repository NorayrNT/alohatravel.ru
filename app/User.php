<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','image','anonym','anonym_user','api_token','active_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $dir = "/uploads/images/users";

    /**
     * The attributes that have default values
     */
    protected $attributes = [
        'anonym' => false,
        'anonym_user' => false,
        'active_status' => false
    ];

    // Relations
    public function yourPass() {
        return $this->hasMany('App\YourPassword','user_id');
    }

    public function subscribers() {
        return $this->hasMany("App\Subscriber",'user_id');
    }
    
    public function contactUs() {
        return $this->hasMany("App\ContactUs","user_id");
    }

    //User image upload
    public function imgUpload($request,$file = null) {
        if(!is_null($file)) {
            $img_name = $file->getClientOriginalName();
            $file->move('uploads/images/users',$img_name);
            $path = 'uploads/images/users/'.$img_name;
                        
            return $path;
        }
        return $file;
    }
}
