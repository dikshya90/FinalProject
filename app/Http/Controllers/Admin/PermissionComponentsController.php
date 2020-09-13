<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\PermissionComponents;
// use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
// use Session;

class PermissionComponentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Gate::allows('permission-view')){
            return view('admin.perComponents.index')->with('per_components', PermissionComponents::all());
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
        if(!Gate::allows('permission-add')){
            return abort(401);
        }
        return view('admin.perComponents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('permission-add')){
            return abort(401);
        }
        $this->validate($request, [
            'permission_component' => 'required'
            ]);
            PermissionComponents::create($request->all());

            Session::flash('success', 'Permission Component Created Successfully!');

            return redirect()->route('permission_component.index');
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
        if (!Gate::allows('permission-edit')) {
            return abort(401);
        }
        return view('admin.perComponents.edit')->with('permission_component', PermissionComponents::find($id));
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
        if (!Gate::allows('permission-edit')) {
            return abort(401);
        }
        PermissionComponents::find($id)->update($request->all());
        Session::flash('success', 'Permission Component updated.');

        return redirect()->route('permission_component.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('permission-delete')) {
            return abort(401);
        }
        PermissionComponents::find($id)->delete();

        Session::flash('success', 'Permission component deleted successfully!');

        return redirect()->back();
    }
}
