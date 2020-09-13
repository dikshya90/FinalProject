<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\Paintings;
use Illuminate\Support\Facades\DB;

class CategoryListController extends Controller
{
    public function index($id){

        $categories = Category::with('paintings')->findOrFail($id);

        // $breadcrumb = "<a href='/'>Home</a> / <a href='".$categories->id."'>".$categories->name."</a>";

        return view('frontend.categoryListing')->with('category', Category::all())
                                                ->with(['categories'=>$categories]);

                                                // ->with('allPaintings',Paintings::inRandomOrder()->where(['paintings.category_id'=>$categories->id]));
    }


    // for searching paintings
    public function searchPaintings(Request $request){
        // if($request->isMethod('post')){
            // $data = $request->all();

            $paintingSearch = $request->input(['paintings']);

            $searched_painting = Paintings::where(function($query) use($paintingSearch){
                $query->where('name', 'like', '%'.$paintingSearch.'%')
                        ->orWhere('description', 'like', '%'.$paintingSearch.'%');
            })->where('status',1)->get();

            return view('frontend.searchListing')->with(['searched_painting' => $searched_painting])
                                                    ->with(['paintingSearch' => $paintingSearch]);

    }
}
