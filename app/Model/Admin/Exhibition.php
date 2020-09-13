<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    protected $fillable = [
        'title', 'conducted_by', 'location', 'type', 'start_date', 'end_date',
    ];
}
