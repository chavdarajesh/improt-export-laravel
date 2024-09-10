<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $draw = $request->get('draw');
            $start = $request->get("start");
            $rowperpage = $request->get("length") ?? 10;

            $columnIndex_arr = $request->get('order');
            $columnName_arr = $request->get('columns');
            $order_arr = $request->get('order');
            $search_arr = $request->get('search');

            $columnIndex = $columnIndex_arr[0]['column']  ?? '0'; // Column index
            $columnName = $columnName_arr[$columnIndex]['data']; // Column name
            $columnSortOrder = $order_arr[0]['dir'] ?? 'desc'; // asc or desc
            $searchValue = $search_arr['value']; // Search value

            // Total records
            $totalRecords = Subcategory::select('count(*) as allcount')->count();
            $totalRecordswithFilter =
                Subcategory::select('count(*) as allcount')
                ->where('id', 'like', '%' . $searchValue . '%')
                ->orWhere('name', 'like', '%' . $searchValue . '%')
                ->orWhere('description', 'like', '%' . $searchValue . '%')
                ->orWhere('status', 'like', '%' . $searchValue . '%')
                ->orWhere('created_at', 'like', '%' . $searchValue . '%')
                ->count();

            // Get records, also we have included search filter as well
            $records = Subcategory::where('id', 'like', '%' . $searchValue . '%')
                ->orWhere('name', 'like', '%' . $searchValue . '%')
                ->orWhere('status', 'like', '%' . $searchValue . '%')
                ->orWhere('created_at', 'like', '%' . $searchValue . '%')

                ->orderBy($columnName, $columnSortOrder)
                ->select('*')
                ->skip($start)
                ->take($rowperpage)
                ->get();

            $data_arr = array();

            foreach ($records as $row) {
                $html = '<a href="' . route("admin.subcategorys.view", $row->id) . '"> <button type="button"
                            class="btn btn-icon btn-outline-info">
                            <i class="bx bx-show"></i>
                        </button></a>
                    <a href="' . route("admin.subcategorys.edit", $row->id) . '"> <button type="button"
                            class="btn btn-icon btn-outline-warning">
                            <i class="bx bxs-edit"></i>
                        </button></a>

                    <button type="button" class="btn btn-icon btn-outline-danger"
                        data-bs-toggle="modal"
                        data-bs-target="#delete-modal-' . $row->id . '">
                        <i class="bx bx-trash-alt"></i>
                    </button>
                    <div class="modal fade" id="delete-modal-' . $row->id . '"
                        tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <form action="' . route("admin.subcategorys.delete", $row->id) . '"
                            method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Delete Item
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <h3>Do You Want To Really Delete This Item?</h3>
                                        ' . csrf_field() . '
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </div>';
                $data_arr[] = array(
                    "id" => '<strong>' . $row->id . '</strong>',
                    "name" => strlen($row->name) > 25 ? substr($row->name, 0, 25) . '..' : $row->name,
                    "status" => ' <div class="d-flex justify-content-center align-items-center form-check form-switch"><input data-id="' . $row->id . '" style="width: 60px;height: 25px;" class="form-check-input status-toggle" type="checkbox" id="flexSwitchCheckDefault" ' . ($row->status ? "checked" : "") . '  ></div>',
                    "created_at" => $row->created_at ? Carbon::parse($row->created_at)->setTimezone('Asia/Kolkata')->toDateTimeString() : '',
                    "actions" => $html,
                );
            }

            $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecordswithFilter,
                "aaData" => $data_arr,
            );

            echo json_encode($response);
        } else {
            return view('admin.subcategorys.index');
        }
    }

    public function create()
    {
        $categorys = Category::where('status', 1)->get();
        if ($categorys->isEmpty()) {
            return redirect()->route('admin.categorys.create')->with('message', 'Please Create At Least One Category..');
        }
        return view('admin.subcategorys.create', ['categorys' => $categorys]);
    }
    public function save(Request $request)
    {
        $is_premium_category_selected = $request->input('is_premium_category_selected');
        $rules = [
            'name' =>  'required|unique:subcategories,name,NULL,id,deleted_at,NULL',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:5000',
            'category' => 'required|exists:categories,id',
        ];

        if ($is_premium_category_selected == '1') {
            $rules['fields'] = 'array';
            $rules['fields.*'] = 'string|max:255';
        } else {
            $rules['description'] = 'required';
            $rules['price'] = 'required';
        }

        $request->validate($rules);

        $Subcategory = new Subcategory();
        $Subcategory->name = $request['name'];
        $Subcategory->slug = Str::slug($request['name']);
        $Subcategory->category_id = $request['category'];
        if ($is_premium_category_selected == '0') {
            $Subcategory->price = $request['price'];
            $Subcategory->description = $request['description'];
        }
        $Subcategory->status = 1;
        if ($request->image) {
            if ($request->old_image && file_exists(public_path($request->old_image))) {
                unlink(public_path($request->old_image));
            }
            $folderPath = public_path('custom-assets/admin/uplode/images/subcategorys/images/');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file = $request->file('image');
            $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
            $imageName = rand(1000, 9999) . time() . $imageoriginalname;
            $file->move($folderPath, $imageName);
            $Subcategory->image = 'custom-assets/admin/uplode/images/subcategorys/images/' . $imageName;
        }
        $Subcategory->save();
        if ($is_premium_category_selected == '1') {
            foreach ($request->input('fields', []) as $field) {
                $Subcategory->subsubcategories()->create(['name' => $field, 'sub_category_id' => $Subcategory->id, 'category_id' => $request['category'], 'slug' => Str::slug($field)]);
            }
        }

        if ($Subcategory) {
            return redirect()->route('admin.subcategorys.index')->with('message', 'Subcategory Added Sucssesfully..');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }
    public function view($id)
    {
        $Subcategory = Subcategory::find($id);
        if ($Subcategory) {
            return view('admin.subcategorys.view', ['Subcategory' => $Subcategory]);
        } else {
            return redirect()->back()->with('error', 'Subcategory Not Found..!');
        }
    }

    public function edit($id)
    {
        $Subcategory = Subcategory::find($id);
        if ($Subcategory) {
            $categorys = Category::where('status', 1)->get();
            if ($categorys->isEmpty()) {
                return redirect()->route('admin.categorys.create')->with('message', 'Please Create At Least One Category..');
            }
            return view('admin.subcategorys.edit', ['Subcategory' => $Subcategory, 'categorys' => $categorys]);
        } else {
            return redirect()->back()->with('error', 'Subcategory Not Found..!');
        }
    }

    public function update(Request $request)
    {
        $is_premium_category_selected = $request->input('is_premium_category_selected');
        $rules = [
            'name' =>  'required|unique:subcategories,name,' . $request->id,
            'image' => 'file|image|mimes:jpeg,png,jpg,gif|max:5000',
            'category' => 'required|exists:categories,id',
        ];

        if ($is_premium_category_selected == '1') {
            $rules['sub_sub_categories'] = 'array';
            $rules['sub_sub_categories.*.name'] = 'string|max:255';
            $rules['fields'] = 'array';
            $rules['fields.*'] = 'string|max:255';
        } else {
            $rules['description'] = 'required';
            $rules['price'] = 'required';
        }

        $request->validate($rules);


        $Subcategory = Subcategory::find($request->id);
        if ($Subcategory) {
            $Subcategory->name = $request['name'];
            $Subcategory->category_id = $request['category'];
            if ($request->image) {
                $folderPath = public_path('custom-assets/admin/uplode/images/subcategorys/images/');
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $file = $request->file('image');
                $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
                $imageName = rand(1000, 9999) . time() . $imageoriginalname;
                $file->move($folderPath, $imageName);
                $Subcategory->image = 'custom-assets/admin/uplode/images/subcategorys/images/' . $imageName;
                if ($request->old_image && file_exists(public_path($request->old_image))) {
                    unlink(public_path($request->old_image));
                }
            }


            if ($is_premium_category_selected == '1') {
                $Subcategory->price = null;
                $Subcategory->description = null;
                foreach ($request->input('sub_sub_categories', []) as $subSubCategoryData) {
                    $subSubCategory = SubSubCategory::firstOrNew(['id' => $subSubCategoryData['id'] ?? null]);
                    $subSubCategory->fill($subSubCategoryData);
                    $subSubCategory->sub_category_id = $Subcategory->id;
                    $subSubCategory->category_id = $request['category'];
                    $subSubCategory->slug = Str::slug($subSubCategoryData['name']);
                    $subSubCategory->save();
                }
                foreach ($request->input('fields', []) as $field) {
                    $Subcategory->subsubcategories()->create(['name' => $field, 'sub_category_id' => $Subcategory->id, 'category_id' => $request['category'], 'slug' => Str::slug($field)]);
                }
            } else {
                $Subcategory->subsubcategories()->delete();
                $Subcategory->price = $request['price'];
                $Subcategory->description = $request['description'];
            }
            $Subcategory->update();
            if ($Subcategory) {
                return redirect()->route('admin.subcategorys.index')->with('message', 'Subcategory Updated Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..');
            }
        } else {
            return redirect()->back()->with('error', 'Subcategory Not Found..!');
        }
    }

    public function delete($id)
    {
        if ($id) {
            $Subcategory = Subcategory::find($id);
            foreach ($Subcategory->subsubcategories as $subSubCategory) {
                if ($subSubCategory->image && file_exists(public_path($subSubCategory->image))) {
                    unlink(public_path($subSubCategory->image));
                }
                $subSubCategory->priceHistory()->delete();
                $subSubCategory->delete();
            }
            if ($Subcategory->image && file_exists(public_path($Subcategory->image))) {
                unlink(public_path($Subcategory->image));
            }
            $Subcategory = $Subcategory->delete();
            if ($Subcategory) {
                return redirect()->route('admin.subcategorys.index')->with('message', 'Subcategory Deleted Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..!');
            }
        } else {
            return redirect()->back()->with('error', 'Subcategory Not Found..!');
        }
    }

    public function statusToggle(Request $request)
    {
        if ($request->id) {
            $Subcategory = Subcategory::find($request->id);
            $Subcategory->status = $request->status;
            $Subcategory = $Subcategory->update();
            if ($Subcategory) {
                return response()->json(['success' => 'Status Updated Successfully.']);
            } else {
                return response()->json(['error' => 'Somthing Went Wrong..!']);
            }
        } else {
            return response()->json(['error' => 'Subcategory Not Found..!']);
        }
    }

    public function deleteSubcat(Request $request)
    {
        if ($request->id) {
            $SubSubCategory = SubSubCategory::find($request->id);
            if ($SubSubCategory->image && file_exists(public_path($SubSubCategory->image))) {
                unlink(public_path($SubSubCategory->image));
            }
            $SubSubCategory->priceHistory()->delete();
            $SubSubCategory = $SubSubCategory->delete();
            if ($SubSubCategory) {
                return response()->json(['success' => 'Item Deleted Successfully.']);
            } else {
                return response()->json(['error' => 'Somthing Went Wrong..!']);
            }
        } else {
            return response()->json(['error' => 'Subcategory Not Found..!']);
        }
    }
}
