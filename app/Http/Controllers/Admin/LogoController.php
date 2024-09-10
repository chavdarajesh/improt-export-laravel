<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SistersCompanyLogo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogoController extends Controller
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
            $totalRecords = SistersCompanyLogo::select('count(*) as allcount')->count();
            $totalRecordswithFilter =
                SistersCompanyLogo::select('count(*) as allcount')
                ->where('id', 'like', '%' . $searchValue . '%')
                ->orWhere('name', 'like', '%' . $searchValue . '%')
                ->orWhere('status', 'like', '%' . $searchValue . '%')
                ->orWhere('created_at', 'like', '%' . $searchValue . '%')
                ->count();

            // Get records, also we have included search filter as well
            $records = SistersCompanyLogo::where('id', 'like', '%' . $searchValue . '%')
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
                $html = '<a href="' . route("admin.sisterscompanylogo.view", $row->id) . '"> <button type="button"
                            class="btn btn-icon btn-outline-info">
                            <i class="bx bx-show"></i>
                        </button></a>
                    <a href="' . route("admin.sisterscompanylogo.edit", $row->id) . '"> <button type="button"
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
                        <form action="' . route("admin.sisterscompanylogo.delete", $row->id) . '"
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
            return view('admin.sisterscompanylogo.index');
        }
    }
    public function create()
    {
        return view('admin.sisterscompanylogo.create');
    }
    public function save(Request $request)
    {
        $request->validate([
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
        ]);
        $SistersCompanyLogo = new SistersCompanyLogo();
        $SistersCompanyLogo->name = $request['name'];
        $SistersCompanyLogo->status = 1;
        if ($request->image) {
            if ($request->old_image && file_exists(public_path($request->old_image))) {
                unlink(public_path($request->old_image));
            }
            $folderPath = public_path('custom-assets/admin/uplode/images/sisterscompanylogo/images/');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file = $request->file('image');
            $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
            $imageName = rand(1000, 9999) . time() . $imageoriginalname;
            $file->move($folderPath, $imageName);
            $SistersCompanyLogo->image = 'custom-assets/admin/uplode/images/sisterscompanylogo/images/' . $imageName;
        }
        $SistersCompanyLogo->save();
        if ($SistersCompanyLogo) {
            return redirect()->route('admin.sisterscompanylogo.index')->with('message', 'SistersCompanyLogo Added Sucssesfully..');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }
    public function view($id)
    {
        $SistersCompanyLogo = SistersCompanyLogo::find($id);
        if ($SistersCompanyLogo) {
            return view('admin.sisterscompanylogo.view', ['SistersCompanyLogo' => $SistersCompanyLogo]);
        } else {
            return redirect()->back()->with('error', 'SistersCompanyLogo Not Found..!');
        }
    }

    public function edit($id)
    {
        $SistersCompanyLogo = SistersCompanyLogo::find($id);
        if ($SistersCompanyLogo) {

            return view('admin.sisterscompanylogo.edit', ['SistersCompanyLogo' => $SistersCompanyLogo]);
        } else {
            return redirect()->back()->with('error', 'SistersCompanyLogo Not Found..!');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            // 'name' => 'required',
            'image' => 'required_if:old_image,null|file|image|mimes:jpeg,png,jpg,gif,webp|max:5000',
        ]);
        $SistersCompanyLogo = SistersCompanyLogo::find($request->id);
        if ($SistersCompanyLogo) {
            $SistersCompanyLogo->name = $request['name'];
            if ($request->image) {
                $folderPath = public_path('custom-assets/admin/uplode/images/sisterscompanylogo/images/');
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $file = $request->file('image');
                $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
                $imageName = rand(1000, 9999) . time() . $imageoriginalname;
                $file->move($folderPath, $imageName);
                $SistersCompanyLogo->image = 'custom-assets/admin/uplode/images/sisterscompanylogo/images/' . $imageName;
                if ($request->old_image && file_exists(public_path($request->old_image))) {
                    unlink(public_path($request->old_image));
                }
            }
            $SistersCompanyLogo->update();

            if ($SistersCompanyLogo) {
                return redirect()->route('admin.sisterscompanylogo.index')->with('message', 'SistersCompanyLogo Updated Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..');
            }
        } else {
            return redirect()->back()->with('error', 'SistersCompanyLogo Not Found..!');
        }
    }

    public function delete($id)
    {
        if ($id) {
            $SistersCompanyLogo = SistersCompanyLogo::find($id);
            if ($SistersCompanyLogo->image && file_exists(public_path($SistersCompanyLogo->image))) {
                unlink(public_path($SistersCompanyLogo->image));
            }
            $SistersCompanyLogo = $SistersCompanyLogo->delete();
            if ($SistersCompanyLogo) {
                return redirect()->route('admin.sisterscompanylogo.index')->with('message', 'SistersCompanyLogo Deleted Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..!');
            }
        } else {
            return redirect()->back()->with('error', 'SistersCompanyLogo Not Found..!');
        }
    }


    public function statusToggle(Request $request)
    {
        if ($request->id) {
            $SistersCompanyLogo = SistersCompanyLogo::find($request->id);
            $SistersCompanyLogo->status = $request->status;
            $SistersCompanyLogo = $SistersCompanyLogo->update();
            if ($SistersCompanyLogo) {
                return response()->json(['success' => 'Status Updated Successfully.']);
            } else {
                return response()->json(['error' => 'Somthing Went Wrong..!']);
            }
        } else {
            return response()->json(['error' => 'SistersCompanyLogo Not Found..!']);
        }
    }
}
