<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
            $totalRecords = Service::select('count(*) as allcount')->count();
            $totalRecordswithFilter =
                Service::select('count(*) as allcount')
                ->where('id', 'like', '%' . $searchValue . '%')
                ->orWhere('description', 'like', '%' . $searchValue . '%')
                ->orWhere('status', 'like', '%' . $searchValue . '%')
                ->orWhere('created_at', 'like', '%' . $searchValue . '%')
                ->count();

            // Get records, also we have included search filter as well
            $records = Service::where('id', 'like', '%' . $searchValue . '%')
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
                $html = '<a href="' . route("admin.services.view", $row->id) . '"> <button type="button"
                            class="btn btn-icon btn-outline-info">
                            <i class="bx bx-show"></i>
                        </button></a>
                    <a href="' . route("admin.services.edit", $row->id) . '"> <button type="button"
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
                        <form action="' . route("admin.services.delete", $row->id) . '"
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
                    "description" => strlen($row->description) > 25 ? substr($row->description, 0, 25) . '..' : $row->description,
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
            return view('admin.services.index');
        }
    }

    public function create()
    {
        return view('admin.services.create');
    }
    public function save(Request $request)
    {
        $rules = [
            'description' =>  'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:5000',
        ];

        $request->validate($rules);

        $Service = new Service();
        $Service->description = $request['description'];
        $Service->status = 1;
        if ($request->image) {
            if ($request->old_image && file_exists(public_path($request->old_image))) {
                unlink(public_path($request->old_image));
            }
            $folderPath = public_path('custom-assets/admin/uplode/images/services/images/');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $file = $request->file('image');
            $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
            $imageName = rand(1000, 9999) . time() . $imageoriginalname;
            $file->move($folderPath, $imageName);
            $Service->image = 'custom-assets/admin/uplode/images/services/images/' . $imageName;
        }
        $Service->save();
        if ($Service) {
            return redirect()->route('admin.services.index')->with('message', 'Service Added Sucssesfully..');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }
    public function view($id)
    {
        $Service = Service::find($id);
        if ($Service) {
            return view('admin.services.view', ['Service' => $Service]);
        } else {
            return redirect()->back()->with('error', 'Service Not Found..!');
        }
    }

    public function edit($id)
    {
        $Service = Service::find($id);
        if ($Service) {
            return view('admin.services.edit', ['Service' => $Service]);
        } else {
            return redirect()->back()->with('error', 'Service Not Found..!');
        }
    }

    public function update(Request $request)
    {
        $rules = [
            'description' =>  'required',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif|max:5000',
        ];
        $request->validate($rules);

        $Service = Service::find($request->id);
        if ($Service) {
            $Service->description = $request['description'];
            if ($request->image) {
                $folderPath = public_path('custom-assets/admin/uplode/images/services/images/');
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $file = $request->file('image');
                $imageoriginalname = str_replace(" ", "-", $file->getClientOriginalName());
                $imageName = rand(1000, 9999) . time() . $imageoriginalname;
                $file->move($folderPath, $imageName);
                $Service->image = 'custom-assets/admin/uplode/images/services/images/' . $imageName;
                if ($request->old_image && file_exists(public_path($request->old_image))) {
                    unlink(public_path($request->old_image));
                }
            }
            $Service->update();
            if ($Service) {
                return redirect()->route('admin.services.index')->with('message', 'Service Updated Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..');
            }
        } else {
            return redirect()->back()->with('error', 'Service Not Found..!');
        }
    }

    public function delete($id)
    {
        if ($id) {
            $Service = Service::find($id);
            if ($Service->image && file_exists(public_path($Service->image))) {
                unlink(public_path($Service->image));
            }
            $Service = $Service->delete();
            if ($Service) {
                return redirect()->route('admin.services.index')->with('message', 'Service Deleted Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..!');
            }
        } else {
            return redirect()->back()->with('error', 'Service Not Found..!');
        }
    }

    public function statusToggle(Request $request)
    {
        if ($request->id) {
            $Service = Service::find($request->id);
            $Service->status = $request->status;
            $Service = $Service->update();
            if ($Service) {
                return response()->json(['success' => 'Status Updated Successfully.']);
            } else {
                return response()->json(['error' => 'Somthing Went Wrong..!']);
            }
        } else {
            return response()->json(['error' => 'Service Not Found..!']);
        }
    }
}
