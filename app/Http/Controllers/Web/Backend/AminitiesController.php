<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aminities;
use Illuminate\Support\Facades\Validator;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class AminitiesController extends Controller
{

    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Aminities::latest()->get(); // Ensure you call get() to fetch the data
            return DataTables::of($data)
                ->addIndexColumn()
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
                            <a href="' . route('aminities.edit', $data->id) . '" class="btn btn-primary  text-white" title="Edit"
                            style="width: 100px;height: 40px;display: flex;align-items: center;justify-content: center;gap: 5px;" ">
                                <span style="font-size:16px"><i class="bi bi-pencil"></i> Edit</span>
                            </a>
                            <a href="' . route('aminities.destroy', $data->id) . '" onclick="showDeleteConfirm(' . $data->id . ')"
                            style="width: 100px;height: 40px;display: flex;align-items: center;justify-content: center;gap: 5px;"
                            class="btn btn-danger text-white" title="Delete">
                                <span style="font-size:16px"><i class="bi bi-trash"></i> Delete</span>
                            </a>
                    </div>';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('backend.layouts.aminities.index');
    }

    public function create(){
        return view('backend.layouts.aminities.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return redirect()->route('aminities.create')
                ->withErrors($validator)
                ->withInput();
        }

        try{
            Aminities::create([
                'name' => $request->name,
            ]);

            return redirect()->route('aminities.index')->with('t-success','Aminities Created Successfully');
        }catch(Exception $e){

            return redirect()->route('aminities.index')
                ->with('t-error','Failed to create Aminities');
        }
    }

    public function edit($id){
        $aminitie = Aminities::findOrFail($id);
        return view('backend.layouts.aminities.edit',compact('aminitie'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
        ]);

        if($validator->fails()){
            dd("jd");
            return redirect()->route('aminities.index')
                ->withErrors($validator)
                ->withInput();
        }

        try{
            $aminities = Aminities::find($id);
            $aminities->name = $request->name;
            $aminities->save();

            return redirect()->route('aminities.index')->with('t-success','Aminities Updated Successfully');
        }catch(Exception $e){
            return redirect()->route('aminities.index')->with('t-errors','Failed to update Aminities');
        }
    }

    public function destroy($id){

        try {
            $aminitie = Aminities::findOrFail($id);
            $aminitie->delete();

            return response()->json(['success' => true, 'message' => 'Aminities Deleted Successfully']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete Aminities']);
        }
    }

    public function status($id) {
        $aminitie = Aminities::where('id', $id)->first();

        if($aminitie->status == 'active'){
            $aminitie->status = 'inactive';
            $aminitie->save();
        }
        else{
           $aminitie->status = 'active';
           $aminitie->save();
        }
    }
}












