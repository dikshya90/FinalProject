<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'slug', 'name'
    ];

    public function paintings(){

        return $this->hasMany(Paintings::class);

    }

    public function getNameAttribute($value)
	{
		return ucwords($value);
	}
	public function getCreatedAtAttribute($value)
	{
		return \Carbon\Carbon::parse($value)->format('j M, Y');
    }

    // public function categories(){
    // 	return $this->has(Category::class);
    // }

}
