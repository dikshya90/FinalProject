<?php

namespace App\Http\Controllers;

use App\Model\Admin\Category;
use App\Model\Admin\Country;
use App\Model\Admin\Exhibition;
use App\Model\Admin\OfferComponents;
use App\Model\Admin\Offers;
use App\Model\Admin\Paintings;
use App\Model\Customer\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
use Image;

class IndexController extends Controller
{
    public function index(){

        // return all products
        $allPaintings = Paintings::inRandomOrder()->where('status', 1)->paginate(12);
        $offer = Offers::all()->first();
        $offerCom = OfferComponents::all();
            // @dd($allPaintings);
        return view('frontend.index')->with('category', Category::all())
                                        ->with('allFeatPaintings',Paintings::inRandomOrder()->where('featured',1)->paginate(4))
                                        ->with('allPaintings',Paintings::inRandomOrder()->where('status', 1)->paginate(12))
                                        ->with(['offer' => $offer])
                                        ->with(['offerCom' => $offerCom]);
    }

    // for listing ongoing exhibitions
    public function currentExhibition(){
        $exhibition = Exhibition::where('type', "ongoing")->get();
        return view('frontend.Exhibition.currentExhibition')->with(['exhibition'=> $exhibition]);
    }

    // for future exhibition
    public function futureExhibition(){
        $exhibition = Exhibition::where('type', 'future')->get();
        return view('frontend.Exhibition.futureExhibition')->with(['exhibition'=>$exhibition]);
    }

    // for terms and conditions
    public function terms(){
        return view('frontend.policies.terms');
    }

    public function privacy(){
        return view('frontend.policies.privacy');
    }

    public function applyForArtist(){
        $countries = Country::all();
        return view('frontend.artistForm')->with(['countries' => $countries]);
    }

    public function apply(Request $request){
        $data = $request->all();

        $artist = new Artist;

        $artist->name = $data['name'];
        $artist->email = $data['email'];
        $artist->phone = $data['phone'];
        $artist->country = $data['country'];
        $artist->street = $data['street'];
        $artist->city = $data['city'];

        if($request->hasFile('image')){
            $image = Input::file('image');

            if($image->isValid()){
                $imgExtension = $image->getClientOriginalExtension();

                $imgFileName = rand(111,99999). '.' .$imgExtension;

                $img_path = 'admin/images/paintings'. '/' .$imgFileName;

                Image::make($image)->save($img_path);

                $artist->image = $imgFileName;

            }
        }
        $artist->save();

        return redirect()->back()->with('message', 'Your Information is Submitted. Wait till we approve your request!');
    }
}
