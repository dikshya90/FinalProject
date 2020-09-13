<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable = ['title','description','offer_com_id', 'start_date', 'end_date'];

    public function offerComponent()
    {
        return $this->belongsTo(OfferComponents::class,'offer_id');
    }

}
