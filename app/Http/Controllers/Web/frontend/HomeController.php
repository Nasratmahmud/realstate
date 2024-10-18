<?php

namespace App\Http\Controllers\Web\frontend;

use App\Models\Property;
use App\Models\C_M_S;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $property = Property::with(['aminites', 'agent', 'category'])->get();
        $category = Category::all();
        $cms = C_M_S::all();
        return view('frontend.index',compact('property','cms','category'));
    }

    public function singlePage(Request $request , $id){
      $property = Property::with(['aminites', 'agent', 'category'])->where('id',$id)->first();
      return view('frontend.singlepage',compact('property'));
    }
}
