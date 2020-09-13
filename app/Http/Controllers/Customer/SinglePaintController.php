<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Paintings;

class SinglePaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $paintingDetail = Paintings::find($id);
        $relatedPainting= Paintings::inRandomOrder()->where('id','!=',$id)->where(['category_id' => $paintingDetail->category_id])->get();

        // @dd($paintingDetail);

        return view('frontend.single')->with(['paintingDetail'=>$paintingDetail])
                                        ->with(['relatedPainting'=>$relatedPainting]);

    }


}
