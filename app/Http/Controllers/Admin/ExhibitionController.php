<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Exhibition;
use Illuminate\Support\Facades\Gate;

class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('exhibition-view')){
            return abort(401);
        }
        return view('admin.exhibition.index')->with('exhibitions', Exhibition::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('exhibition-add')){
            return view('admin.exhibition.create');
        }
        else
        {
            return abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('exhibition-add')){
            return abort(401);
        }

        $data = $request->all();

        $exhibition = new Exhibition;

        $exhibition->title = $data['title'];
        $exhibition->conducted_by = $data['conducted_by'];
        $exhibition->location = $data['location'];
        $exhibition->start_date = $data['start_date'];
        $exhibition->end_date = $data['end_date'];

        if(empty($data['type'])){
            $type = 'future';
        }
        else{
            $type = 'ongoing';
        }
        $exhibition->type = $type;
        $exhibition->save();

        return redirect()->route('exhibition.index')->with('message','Exhibition Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('exhibition-edit')){
            return abort(401);
        }
        return view('admin.exhibition.edit')->with('exhibition', Exhibition::findOrFail($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Gate::allows('exhibition-edit')){
            return abort(401);
        }

        $exhibitionData = $request->all();

        // validation for status and featured image
        if(empty($exhibitionData['type'])){
            $type='future';
        }else{
            $type='ongoing';
        }

        Exhibition::findOrFail($id)->update([
            'title' => $exhibitionData['title'],
            'conducted_by' => $exhibitionData['conducted_by'],
            'location' => $exhibitionData['location'],
            'start_date' => $exhibitionData['start_date'],
            'end_date' => $exhibitionData['end_date'],
            'type' => $type,
        ]);

        return redirect()->route('exhibition.index')->with('message', 'Exhibition Detail Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Gate::allows('exhibition-delete')){
            return abort(401);
        }
        Exhibition::find($id)->delete();

        return redirect()->route('exhibition.index')->with('message', 'Exhibition Information Deleted');

    }
}
