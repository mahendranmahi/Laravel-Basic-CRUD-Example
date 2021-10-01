<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $guarded = ['userrole'];
    protected $fillable = ['userrole'];

    public function profiles(){
        return $this->hasOne('App\Profile');
    }
}
