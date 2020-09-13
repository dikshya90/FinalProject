<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\PermissionComponents;
use App\Model\Admin\Permissions;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Session;
// use Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('permission-view')){
            return abort(401);
        }
        return view('admin.Permissions.index')->with('per_components', PermissionComponents::all())
                                                ->with('permissions',Permissions::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('permission-add')){
            return abort(401);
        }
        return view('admin.Permissions.create')->with('permission_component', PermissionComponents::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(! Gate::allows('permission-add')){
            return abort(401);
        }
        $this->validate($request,[
            'permission' => 'required'
        ]);

        // @dd($request->permission_component);
        $permission = $request->permission;
        Permissions::create
        ([
            'permission' => $permission,
            'per_com_id' => $request->permission_component
        ]);

        $request->session()->flash('success', 'Created successfully');
        return redirect()->route('permission.index');
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
        if(! Gate::allows('permission-edit')){
            return abort(401);
        }
        Permissions::find($id);
        return view('admin.Permissions.edit')->with('permission',Permissions::find($id))
                                                ->with('permission_component', PermissionComponents::all());
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
        if(! Gate::allows('permission-edit')){
            return abort(401);
        }
        $permission = Permissions::find($id);
        $permission->permission = $request->permission;

        $permission->per_com_id = $request->permission_component;
        $permission->save();

        Session::flash('success', 'Permission Updated!');

        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Gate::allows('permission-view')){
            return abort(401);
        }
        Permissions::find($id)->delete();

        // Session::flash('success', 'Permission Deleted!');
        Session::flash('success', 'Permission Deleted!');

        return redirect()->back();
    }
}
