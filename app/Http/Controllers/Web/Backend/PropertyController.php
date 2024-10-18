<?php

namespace App\Http\Controllers\Web\Backend;

use Exception;
use App\Models\Category;
use App\Models\Property;
use App\Models\Aminities;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
          if ($request->ajax()) {
            $data = Property::latest()->get(); // Ensure you call get() to fetch the data
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('parking', function ($data) {
                    $parking = '<div class="form-check form-switch" style="margin-left:40px; font-size:20px">';
                    $parking .= '<input onclick="showParkingChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitchParking' . $data->id . '" getAreaid="' . $data->id . '" name="parking"';
                    if ($data->parking == "yes") {
                        $parking .= " checked"; // Added space for readability
                    }
                    $parking .= '><label for="customSwitchParking' . $data->id . '" class="form-check-label"></label></div>'; // Removed duplicate for="customSwitch"

                    return $parking;
                })
                ->addColumn('status', function ($data) {
                    $status = '<div class="form-check form-switch" style="margin-left:40px; font-size:20px">';
                    $status .= '<input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status"';
                    if ($data->status == "active") {
                        $status .= " checked"; // Added space for readability
                    }
                    $status .= '><label for="customSwitch' . $data->id . '" class="form-check-label"></label></div>'; // Removed duplicate for="customSwitch"

                    return $status;
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example" >
                            <a href="' . route('property.edit', $data->id) . '" class="btn btn-primary  text-white" title="Edit"
                            style="width: 100px;height: 40px;display: flex;align-items: center;justify-content: center;gap: 5px;" ">
                                <span style="font-size:16px"><i class="bi bi-pencil"></i>Edit</span>
                            </a>
                            <a href="#ViewPropertyDetails" onclick="viewQuestion(' . $data->id . ')" class="btn btn-success  text-white" data-bs-toggle="modal" title="View"
                            style="width: 100px;height: 40px;display: flex;align-items: center;justify-content: center;gap: 5px;" >
                                <span style="font-size:16px"><i class="bi bi-eye-fill"></i></i>View</span>
                            </a>
                            <a href="' . route('property.destroy', $data->id) . '" onclick="showDeleteConfirm(' . $data->id . ')"
                            style="width: 100px;height: 40px;display: flex;align-items: center;justify-content: center;gap: 5px;"
                            class="btn btn-danger text-white" title="Delete">
                                <span style="font-size:16px"><i class="bi bi-trash"></i>Delete</span>
                            </a>
                    </div>';
                })
                ->rawColumns(['action', 'status','parking'])
                ->make(true);
        }
        return view('backend.layouts.property.index');
    }

    public function create()
    {
        $aminities = Aminities::all();
        $categories = Category::all();
        return view('backend.layouts.property.create',compact('aminities','categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'city' => 'nullable|string',
            'area' => 'nullable|string',
            'details' => 'nullable|string',
            'subdetail' => 'nullable|string',
            'subsubdetails' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255|email|unique:properties',
            'address' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:3072',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
            'accommodation' => 'nullable',
            'website' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->hasFile('image')) {
            if( File::exists( public_path('uploads/backend/property/'.$request->file('image')) ) ) {
                @unlink( public_path('uploads/backend/property/'.$request->file('image')) );
            }
            $file = $request->file('image');
            $name = $file->getClientOriginalExtension();
            $fileimage = rand().'.'.$name;
            $file->move(public_path('uploads/backend/property/'), $fileimage);
        }

        if($request->hasFile('video')) {
            if(File::exists(public_path('uploads/backend/property/'.$request->file('video')) ) ) {
                @unlink( public_path('uploads/backend/property/'.$request->file('video')) );
            }
            $file = $request->file('video');
            $name = $file->getClientOriginalExtension();
            $filevideo = rand().'.'.$name;
            $file->move(public_path('uploads/backend/property/'), $filevideo);
        }
            $property = new Property;
            $property->title = $request->title;
            $property->price = $request->price;
            $property->keywords = $request->keywords;
            $property->phone = $request->phone;
            $property->email = $request->email;
            $property->address = $request->address;
            $property->city = $request->city;
            $property->area = $request->area;
            $property->bedrooms = $request->bedrooms;
            $property->bathrooms = $request->bathrooms;
            $property->accommodation = $request->accommodation;
            $property->website = $request->website;
            $property->details = $request->details;
            $property->subdetails = $request->subdetail;
            $property->sub_subdetails = $request->subsubdetails;
            $property->slug = $request->slug;
            $property->category_id = $request->category_id;
            $property->image = $fileimage;
            $property->video = $filevideo;
            $property->user_id = Auth::id();
            $property->save();

            if($request->has('aminity_id')){
                $propertyaminity = Aminities::find($request->aminity_id);
                $property->aminites()->attach($propertyaminity);
            }
            return redirect()->route('property.index')
                ->with('t-success', 'Property created successfully.');
    }

    public function viewdataonmodel(Request $request, $id){
        $data = Property::with(['aminites','category'])->where('id',$id)->first();
        return $data;
    }

    public function edit($id)
    {
        $property = Property::with('aminites')->findOrFail($id);
        $aminities = Aminities::get();
        $categories = Category::get();
        return view('backend.layouts.property.edit', compact('property','aminities','categories'));
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        if($request->email==$property->email){
            $property->email='';
            $property->save();
        }
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'city' => 'nullable|string',
            'area' => 'nullable|string',
            'details' => 'nullable|string',
            'subdetail' => 'nullable|string',
            'subsubdetails' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255|email|unique:properties',
            'address' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:3072',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
            'accommodation' => 'nullable',
            'website' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->hasFile('image')) {
            if( File::exists( public_path('uploads/backend/property/'.$request->file('image')) ) ) {
                @unlink( public_path('uploads/backend/property/'.$request->file('image')) );
            }
            $file = $request->file('image');
            $name = $file->getClientOriginalExtension();
            $fileimage = rand().'.'.$name;
            $file->move(public_path('uploads/backend/property/'), $fileimage);
        }
        else{
            $fileimage = $property->image;
        }
        if($request->hasFile('video')) {
            if(File::exists(public_path('uploads/backend/property/'.$request->file('video')) ) ) {
                @unlink( public_path('uploads/backend/property/'.$request->file('video')) );
            }
            $file = $request->file('video');
            $name = $file->getClientOriginalExtension();
            $filevideo = rand().'.'.$name;
            $file->move(public_path('uploads/backend/property/'), $filevideo);
        }
        else{
            $filevideo = $property->video;
        }
            $property->title = $request->title;
            $property->price = $request->price;
            $property->keywords = $request->keywords;
            $property->phone = $request->phone;
            $property->email = $request->email;
            $property->address = $request->address;
            $property->city = $request->city;
            $property->area = $request->area;
            $property->bedrooms = $request->bedrooms;
            $property->bathrooms = $request->bathrooms;
            $property->accommodation = $request->accommodation;
            $property->website = $request->website;
            $property->details = $request->details;
            $property->subdetails = $request->subdetail;
            $property->sub_subdetails = $request->subsubdetails;
            $property->slug = 'demo slug';
            $property->category_id = $request->category_id;
            $property->image = $fileimage;
            $property->video = $filevideo;
            $property->user_id = Auth::id();
            $property->save();
            if($request->has('aminity_id')){
                $propertyaminity = Aminities::find($request->aminity_id);
                $property->aminites()->sync($propertyaminity);
            }
            $property->save();
            return redirect()->route('property.index')
                ->with('t-success', 'property updated successfully.');
    }

    public function destroy($id)
    {
        try {
                $property = Property::with('aminites')->findOrFail($id);
                $property->delete();

            return response()->json(['success' => true, 'message' => 'property Deleted Successfully']);
        }catch(Exception $e){
            return response()->json(['error' => false, 'message' => 'Failed to delete property']);
        }
    }

    public function parking($id)
        {
            try {
                    $property = Property::findOrFail($id);
                    if($property->parking == "yes"){
                        $property->parking = 'no';
                        $property->save();
                    }
                    else{
                        $property->parking = "yes";
                        $property->save();
                    }
                return response()->json(['success' => true, 'message' => 'parking update Successfully']);
            }catch(Exception $e){
                return response()->json(['error' => false, 'message' => 'Failed to parking update']);
            }
        }

    public function status($id){
            try{
                $status = Property::findOrFail($id);
                if($status->status == "active"){
                    $status->status = "inactive";
                    $status->save();
                }
                else{
                    $status->status = 'active';
                    $status->save();
                }
                return response()->json(['success' => true, 'message' => 'status update Successfully']);
            }catch(Exception $e){
                return response()->json(['error' => true, 'message' => 'Failed to parking update']);
            }
        }

    public function categorysearch(Request $request){
        
        $array = explode(';', $request->pricerange);
        $min = $array[0];
        $max = $array[1];
        $property = Property::query()
                    ->where(function($query) use ($min, $max) {
                        $query->orWhereBetween('price', [$min, $max]);
                    })
                    ->orWhere('category_id','LIKE','%'. $request->category.'%')
                    // ->orWhere('updated_at','LIKE', '%'.$request->rangeDate.'%')
                    // ->orWhere('created_at','LIKE', '%'.$request->postDate.'%')
                    ->get();
        // dd($property);
        $category = request('category');
        $arrivel = request('postDate');
        $departure = request('rangeDate');
        $urlPrice = request('pricerange');
        return view('frontend.advanceSearch',compact('property','category','arrivel','departure','urlPrice'));
    }

    public function advancesearch(Request $request){
        // return view('frontend.advanceSearch');
    }
  
}
