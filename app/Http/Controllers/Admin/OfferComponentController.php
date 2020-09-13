<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\OfferComponents;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class OfferComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('offer-view')){
            return view('admin.OfferComponents.index')->with('offer_components', OfferComponents::all());
        }
        else
        {
            return abort(401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('offer-add')){
            return view('admin.OfferComponents.create');
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
        if(!Gate::allows('offer-add')){
            return abort(401);
        }
        $this->validate($request, [
            'offerComponents' => 'required'
            ]);
            OfferComponents::create($request->all());

            Session::flash('success', 'Offer Component Created Successfully!');

            return redirect()->route('offer_component.index');
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
        if (!Gate::allows('offer-edit')) {
            return abort(401);
        }
        return view('admin.OfferComponents.edit')->with('offer_components', OfferComponents::find($id));
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
        if (!Gate::allows('offer-edit')) {
            return abort(401);
        }
        OfferComponents::find($id)->update($request->all());
        Session::flash('success', 'Offer Component updated.');

        return redirect()->route('offer_component.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('offer-delete')) {
            return abort(401);
        }
        OfferComponents::find($id)->delete();

        Session::flash('success', 'Offer component deleted successfully!');

        return redirect()->back();
    }
}
