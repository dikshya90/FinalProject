<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissions extends Model
{
    // use SoftDeletes;

    protected $fillable = ['permission','per_com_id'];
    // public $dates = ['deleted_at'];

    // public function getCreatedAtAttribute($value)
    // {
    //     return \Carbon\Carbon::parse($value)->format('j M, Y');
    // }

    // public function getDeletedAtAttribute($value)
    // {
    //     return \Carbon\Carbon::parse($value)->format('j M, Y');
    // }

    public function component()
    {
        return $this->belongsTo(PermissionComponents::class,'per_com_id');
    }
}
