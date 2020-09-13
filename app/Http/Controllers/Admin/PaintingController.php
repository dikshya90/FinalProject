<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\Paintings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
use Image;
use Session;

class PaintingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('painting-add')){
            return abort(401);
        }
        return view('admin.painting.index')->with('paintings', Paintings::all())
                                            ->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('painting-add')){
            return view('admin.painting.create')->with('category', Category::all());
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
        if(!Gate::allows('painting-add')){
            return abort(401);
        }

        $data = $request->all();

        $painting = new Paintings;

        $painting->category_id = $data['category'];
        $painting->name = $data['name'];
        $painting->description = $data['description'];
        $painting->price = $data['price'];
        $painting->size = $data['size'];
        $painting->weight = $data['weight'];
        $painting->year = $data['year'];

        if(empty($data['featured'])){
            $featured = '0';
        }
        else{
            $featured = '1';
        }

        if(empty($data['status'])){
            $status = '0';
        }
        else{
            $status = '1';
        }

        if($request->hasFile('image')){
            $image = Input::file('image');

            if($image->isValid()){
                $imgExtension = $image->getClientOriginalExtension();

                $imgFileName = rand(111,99999). '.' .$imgExtension;

                $img_path = 'admin/images/paintings'. '/' .$imgFileName;

                Image::make($image)->save($img_path);

                $painting->image = $imgFileName;

            }
        }

        $painting->featured = $featured;
        $painting->status = $status;

        $painting->save();
        // $request->session()->flash('success', 'Created successfully');
        return redirect()->route('painting.index')->with('message','Painting Created Successfully!');

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
        if(!Gate::allows('painting-edit')){
            return abort(401);
        }
        return view('admin.painting.edit')->with('paintings', Paintings::findOrFail($id))
                                            ->with('categories', Category::all());;
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
        if(!Gate::allows('painting-edit')){
            return abort(401);
        }

        $paintingData = $request->all();
        // $category = $paintingData->category
        // validation for status and featured image
        if(empty($paintingData['status'])){
            $status='0';
        }else{
            $status='1';
        }

        if(empty($paintingData['featured'])){
            $featured='0';
        }else{
            $featured='1';
        }

        // for editing image
        if($request->hasFile('image')){
            $image = Input::file('image');

            if($image->isValid()){
                $imgExtension = $image->getClientOriginalExtension();

                $imgFileName = rand(111,99999). '.' .$imgExtension;

                $img_path = 'admin/images/paintings'. '/' .$imgFileName;

                Image::make($image)->save($img_path);

            }
        }
        else if(!empty($paintingData['current_image'])){
            $imgFileName = $paintingData['current_image'];
        }
        else{
            $imgFileName = '';
        }

        Paintings::where(['id' => $id])->update([
            'name' => $paintingData['name'],
            'category_id' => $paintingData['category'],
            'description' => $paintingData['description'],
            'price' => $paintingData['price'],
            'size' => $paintingData['size'],
            'weight' => $paintingData['weight'],
            'year' => $paintingData['year'],
            'image' => $imgFileName,
            'featured' => $featured,
            'status' => $status,
        ]);

        // Session::flash('success', 'Painting Updated!');

        return redirect()->route('painting.index')->with('success', 'Updated')->with('message', 'Painting Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Gate::allows('painting-delete')){
            return abort(401);
        }
        Paintings::find($id)->delete();
        return redirect()->route('painting.index')->with('message', 'Painting Deleted Successfully');
    }
}
