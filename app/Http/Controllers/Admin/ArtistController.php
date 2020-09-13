<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Customer\Artist;
use Illuminate\Support\Facades\Gate;

class ArtistController extends Controller
{
    public function viewRequest(){
        if (!Gate::allows('artist-view'))
        {
            return abort(401);
        }
        return view('admin.artist.index')->with('artists', Artist::all());
    }

    public function requestDelete($id){

        if (!Gate::allows('artist-delete'))
        {
            return abort(401);
        }
        Artist::find($id)->delete();

        return redirect()->back()->with('message', 'Artist Request Deleted');

    }
}
