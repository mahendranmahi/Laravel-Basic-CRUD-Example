<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'profileid';
    // $guarded = array();
    protected $fillable = ['name', 'gender', 'roleid', 'dob', 'email', 'password', 'mobile', 'address', 'profileimg'];

    public function roles(){
        return $this->belongsTo('App\Role', 'roleid', 'roleid');
    }
}
