<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Session;
// use Session;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('category-view')) {
            return abort(401);
        }
        return view('admin.category.index')->with('category',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('category-add')) {
            return abort(401);
        }
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('category-add')) {
            return abort(401);
        }

        Category::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
        ]);

        // Session::flash('success', 'Category Created');
        return redirect()->route('category.index')->with('message','Category Created Successfully');
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
        if (!Gate::allows('category-edit')) {
            return abort(401);
        }
        return view('admin.category.edit')->with('category',Category::find($id));
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
        if (!Gate::allows('category-edit')) {
            return abort(401);
        }
        $this->validate($request, [
            'name' => 'required',
        ]);
        Category::find($id)->update($request->all());

        // Session::flash('success', 'Category changed');

        return redirect()->route('category.index')->with('message', 'Category Detail Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('category-delete')) {
            return abort(401);
        }
        Category::find($id)->delete();

        // Session::flash('success', 'Category deleted successfully!');

        return redirect()->back()->with('message','Category Deleted Successfully!');
    }
}
