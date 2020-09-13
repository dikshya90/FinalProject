<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class OfferComponents extends Model
{
    protected $fillable = ['offerComponents'];
    // public $timestamps = false;

    public function offers()
    {
        return $this->hasMany(Offers::class);
    }
}
