<?php

namespace App\Model\Admin;
use App\User;
use App\Model\Admin\Permissions;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['role'];


    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function permissions(){
        return $this->belongsToMany(Permissions::class,'role_permissions');
    }



}
