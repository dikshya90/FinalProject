<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\OfferComponents;
use App\Model\Admin\Offers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('offer-view')){
            return abort(401);
        }
        return view('admin.offers.index')->with('offer_components', OfferComponents::all())
                                                ->with('offers', Offers::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('offer-view')){
            return abort(401);
        }
        return view('admin.offers.create')->with('offer_components', OfferComponents::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Offers::create
        ([
            'title' => $request->title,
            'description' => $request->description,
            'offer_com_id' => $request->offerComponents,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,

        ]);

        // $request->session()->flash('success', 'Created successfully');
        return redirect()->route('offers.index')->with('message', 'Offer Information Added Successfully!');
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
        if(! Gate::allows('offer-view')){
            return abort(401);
        }
        return view('admin.offers.edit')->with('offer_components', OfferComponents::all())
                                                ->with('offers', Offers::find($id));
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
        if(! Gate::allows('offer-edit')){
            return abort(401);
        }
        $offers = Offers::find($id);
        $offers->title = $request->title;
        $offers->description = $request->description;

        $offers->offer_com_id = $request->offerComponents;
        $offers->start_date = $request->start_date;
        $offers->end_date = $request->end_date;

        $offers->save();

        return redirect()->route('offers.index')->with('message', 'Offer Information Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Gate::allows('offer-delete')){
            return abort(401);
        }
        Offers::find($id)->delete();

        // Session::flash('success', 'Permission Deleted!');
        // Session::flash('success', 'Offer Deleted!');

        return redirect()->back()->with('message', 'Offer Information Deleted Successfully!');
    }
}
