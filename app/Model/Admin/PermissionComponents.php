<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Permissions;

class PermissionComponents extends Model
{
    protected $fillable = ['permission_component'];
    public $timestamps = false;

    public function permissions()
    {
        return $this->hasMany(Permissions::class);
    }
}
