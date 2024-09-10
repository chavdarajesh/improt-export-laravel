<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryPriceHistory;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubSubCategoryController extends Controller
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
            $totalRecords = SubSubCategory::select('count(*) as allcount')->count();
            $totalRecordswithFilter =
                SubSubCategory::select('count(*) as allcount')
                ->where('id', 'like', '%' . $searchValue . '%')
                ->orWhere('name', 'like', '%' . $searchValue . '%')
                ->orWhere('description', 'like', '%' . $searchValue . '%')
                ->orWhere('status', 'like', '%' . $searchValue . '%')
                ->orWhere('created_at', 'like', '%' . $searchValue . '%')
                ->count();

            // Get records, also we have included search filter as well
            $records = SubSubCategory::where('id', 'like', '%' . $searchValue . '%')
                ->orWhere('name', 'like', '%' . $searchValue . '%')
                ->orWhere('description', 'like', '%' . $searchValue . '%')
                ->orWhere('status', 'like', '%' . $searchValue . '%')
                ->orWhere('created_at', 'like', '%' . $searchValue . '%')

                ->orderBy($columnName, $columnSortOrder)
                ->select('*')
                ->skip($start)
                ->take($rowperpage)
                ->get();

            $data_arr = array();

            foreach ($records as $row) {
                $html = '<a href="' . route("admin.subsubcategorys.view", $row->id) . '"> <button type="button"
                            class="btn btn-icon btn-outline-info">
                            <i class="bx bx-show"></i>
                        </button></a>
                    <a href="' . route("admin.subsubcategorys.edit", $row->id) . '"> <button type="button"
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
                        <form action="' . route("admin.subsubcategorys.delete", $row->id) . '"
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
                    "description" => strlen($row->description) > 25 ? substr(strip_tags($row->description), 0, 25) . '..' : strip_tags($row->description),
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
            return view('admin.subsubcategorys.index');
        }
    }
    public function create()
    {
        $categorys = Category::where('status', 1)->where('is_premium', 1)->get();
        if ($categorys->isEmpty()) {
            return redirect()->route('admin.categorys.create')->with('message', 'Please Create At Least One Premium Category..');
        }
        $Subcategorys = Subcategory::where('status', 1)->get();
        if ($Subcategorys->isEmpty()) {
            return redirect()->route('admin.subcategorys.create')->with('message', 'Please Create At Least One SubCategory..');
        }
        return view('admin.subsubcategorys.create', ['categorys' => $categorys]);
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' =>  'required|unique:subcategories,name,NULL,id,deleted_at,NULL',
            'description' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:5000',
            'category' => 'required|exists:categories,id',
            'subcategory' => 'required|exists:subcategories,id',
            'price_inr' => 'required',
            'price_usd' => 'required'
        ]);
        $SubSubCategory = new SubSubCategory();
        $SubSubCategory->name = $request['name'];
        $SubSubCategory->description = $request['description'];
        $SubSubCategory->price_inr = $request['price_inr'];
        $SubSubCategory->price_usd = $request['price_usd'];
        $SubSubCategory->slug = Str::slug($request['name']);
        $SubSubCategory->category_id = $request['category'];
        $SubSubCategory->sub_category_id  = $request['subcategory'];
        $SubSubCategory->status = 1;

        if ($request->image) {
            if ($request->old_image && file_exists(public_path($request->old_image))) {
                unlink(public_path($request->old_image));
            }
            $folderPath = public_path('custom-assets/admin/uplode/images/subsubcategorys/images/');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file = $request->file('image');
            $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
            $imageName = rand(1000, 9999) . time() . $imageoriginalname;
            $file->move($folderPath, $imageName);
            $SubSubCategory->image = 'custom-assets/admin/uplode/images/subsubcategorys/images/' . $imageName;
        }

        $SubSubCategory->save();

        CategoryPriceHistory::create([
            'sub_sub_category_id' => $SubSubCategory->id,
            'price_inr' => $request['price_inr'],
            'price_usd' => $request['price_usd'],
            'changed_at' => now(),
        ]);
        if ($SubSubCategory) {
            return redirect()->route('admin.subsubcategorys.index')->with('message', 'SubSubCategory Added Sucssesfully..');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }
    public function view($id)
    {
        $SubSubCategory = SubSubCategory::find($id);
        if ($SubSubCategory) {
            return view('admin.subsubcategorys.view', ['SubSubCategory' => $SubSubCategory]);
        } else {
            return redirect()->back()->with('error', 'SubSubCategory Not Found..!');
        }
    }

    public function edit($id)
    {
        $SubSubCategory = SubSubCategory::find($id);
        if ($SubSubCategory) {
            $categorys = Category::where('status', 1)->where('is_premium', 1)->get();
            if ($categorys->isEmpty()) {
                return redirect()->route('admin.categorys.create')->with('message', 'Please Create At Least One Premium Category..');
            }
            $Subcategorys = Subcategory::where('status', 1)->where('category_id', $SubSubCategory->category_id)->get();
            if ($Subcategorys->isEmpty()) {
                return redirect()->route('admin.subcategorys.create')->with('message', 'Please Create At Least One SubCategory..');
            }
            return view('admin.subsubcategorys.edit', ['SubSubCategory' => $SubSubCategory, 'categorys' => $categorys, 'subcategorys' => $Subcategorys]);
        } else {
            return redirect()->back()->with('error', 'SubSubCategory Not Found..!');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subcategories,name,' . $request->id,
            'description' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif|max:5000',
            'category' => 'required|exists:categories,id',
            'subcategory' => 'required|exists:subcategories,id',
            'price_inr' => 'required',
            'price_usd' => 'required'
        ]);
        $SubSubCategory = SubSubCategory::find($request->id);
        if ($SubSubCategory) {
            if ($SubSubCategory->price_inr != $request['price_inr'] || $SubSubCategory->price_usd != $request['price_usd']) {
                CategoryPriceHistory::create([
                    'sub_sub_category_id' => $SubSubCategory->id,
                    'price_inr' => $request['price_inr'],
                    'price_usd' => $request['price_usd'],
                    'changed_at' => now(),
                ]);
            }

            $SubSubCategory->name = $request['name'];
            $SubSubCategory->description = $request['description'];
            $SubSubCategory->price_inr = $request['price_inr'];
            $SubSubCategory->price_usd = $request['price_usd'];
            $SubSubCategory->category_id = $request['category'];
            $SubSubCategory->sub_category_id  = $request['subcategory'];

            if ($request->image) {
                $folderPath = public_path('custom-assets/admin/uplode/images/subsubcategorys/images/');
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $file = $request->file('image');
                $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
                $imageName = rand(1000, 9999) . time() . $imageoriginalname;
                $file->move($folderPath, $imageName);
                $SubSubCategory->image = 'custom-assets/admin/uplode/images/subsubcategorys/images/' . $imageName;
                if ($request->old_image && file_exists(public_path($request->old_image))) {
                    unlink(public_path($request->old_image));
                }
            }

            $SubSubCategory->update();
            if ($SubSubCategory) {
                return redirect()->route('admin.subsubcategorys.index')->with('message', 'SubSubCategory Updated Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..');
            }
        } else {
            return redirect()->back()->with('error', 'SubSubCategory Not Found..!');
        }
    }

    public function delete($id)
    {
        if ($id) {
            $SubSubCategory = SubSubCategory::find($id);
            if ($SubSubCategory->image && file_exists(public_path($SubSubCategory->image))) {
                unlink(public_path($SubSubCategory->image));
            }
            $SubSubCategory->priceHistory()->delete();
            $SubSubCategory = $SubSubCategory->delete();
            if ($SubSubCategory) {
                return redirect()->route('admin.subsubcategorys.index')->with('message', 'SubSubCategory Deleted Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..!');
            }
        } else {
            return redirect()->back()->with('error', 'SubSubCategory Not Found..!');
        }
    }

    public function statusToggle(Request $request)
    {
        if ($request->id) {
            $SubSubCategory = SubSubCategory::find($request->id);
            $SubSubCategory->status = $request->status;
            $SubSubCategory = $SubSubCategory->update();
            if ($SubSubCategory) {
                return response()->json(['success' => 'Status Updated Successfully.']);
            } else {
                return response()->json(['error' => 'Somthing Went Wrong..!']);
            }
        } else {
            return response()->json(['error' => 'SubSubCategory Not Found..!']);
        }
    }

    public function getSubcategories(Request $request)
    {
        if ($request->id) {
            $subcategories = Subcategory::where('category_id', $request->id)->get();
            return response()->json($subcategories);
        } else {
            return response()->json(['error' => 'SubSubCategory Not Found..!']);
        }
    }
}
