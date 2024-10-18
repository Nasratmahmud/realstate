<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
          if ($request->ajax()) {
            $data = Category::latest()->get(); // Ensure you call get() to fetch the data
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
                            <a href="' . route('categories.edit', $data->id) . '" class="btn btn-primary  text-white" title="Edit"
                            style="width: 100px;height: 40px;display: flex;align-items: center;justify-content: center;gap: 5px;" ">
                                <span style="font-size:16px"><i class="bi bi-pencil"></i> Edit</span>
                            </a>
                            <a href="' . route('categories.destroy', $data->id) . '" onclick="showDeleteConfirm(' . $data->id . ')"
                            style="width: 100px;height: 40px;display: flex;align-items: center;justify-content: center;gap: 5px;"
                            class="btn btn-danger text-white" title="Delete">
                                <span style="font-size:16px"><i class="bi bi-trash"></i> Delete</span>
                            </a>
                    </div>';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('backend.layouts.category.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.layouts.category.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.layouts.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        try {
                $category = Category::findOrFail($id);
                $category->delete();
            return response()->json(['success' => true, 'message' => 'Category Deleted Successfully']);
        }catch(Exception $e){
            return response()->json(['success' => false, 'message' => 'Failed to delete Category']);
        }
    }

    public function status($id){
        $category = Category::findOrFail($id);
        if($category->status=='active'){
            $category->status = 'inactive';
            $category->save();
        }
        else{
            $category->status = 'active';
            $category->save();
        }
    }
}
