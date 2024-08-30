<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Admin\NewsletterMail as MailNewsletterMail;
use App\Models\Newsletter;
use App\Models\NewsletterContent;
use App\Models\NewsletterMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;

class NewsletterMailController extends Controller
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
            $totalRecords = NewsletterContent::select('count(*) as allcount')->count();
            $totalRecordswithFilter =
                NewsletterContent::select('count(*) as allcount')
                ->where('id', 'like', '%' . $searchValue . '%')
                ->orWhere('content', 'like', '%' . $searchValue . '%')
                ->orWhere('created_at', 'like', '%' . $searchValue . '%')
                ->count();

            // Get records, also we have included search filter as well
            $records = NewsletterContent::where('id', 'like', '%' . $searchValue . '%')
                ->orWhere('content', 'like', '%' . $searchValue . '%')
                ->orWhere('created_at', 'like', '%' . $searchValue . '%')

                ->orderBy($columnName, $columnSortOrder)
                ->select('*')
                ->skip($start)
                ->take($rowperpage)
                ->get();

            $data_arr = array();

            foreach ($records as $row) {
                $html = '<a href="' . route("admin.newslettermails.view", $row->id) . '"> <button type="button"
                            class="btn btn-icon btn-outline-info">
                            <i class="bx bx-show"></i>
                        </button></a>
                        <a href="' . route("admin.newslettermails.edit", $row->id) . '"> <button type="button"
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
                        <form action="' . route("admin.newslettermails.delete", $row->id) . '"
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
                    "content" => strlen($row->content) > 25 ? substr(strip_tags($row->content), 0, 25) . '..' : strip_tags($row->content),
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
            return view('admin.newslettermails.index');
        }
    }
    public function create()
    {
        return view('admin.newslettermails.create');
    }
    public function save(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $NewsletterContent = new NewsletterContent();
        $NewsletterContent->content = $request['content'];
        $NewsletterContent->save();

        if ($NewsletterContent) {
            return redirect()->route('admin.newslettermails.index')->with('message', 'Newsletter Mail Sent Sucssesfully..');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }
    public function view($id)
    {
        $NewsletterContent = NewsletterContent::find($id);
        if ($NewsletterContent) {
            return view('admin.newslettermails.view', ['NewsletterContent' => $NewsletterContent]);
        } else {
            return redirect()->back()->with('error', 'NewsletterContent Not Found..!');
        }
    }

    public function edit($id)
    {
        $NewsletterContent = NewsletterContent::find($id);
        if ($NewsletterContent) {

            return view('admin.newslettermails.edit', ['NewsletterContent' => $NewsletterContent]);
        } else {
            return redirect()->back()->with('error', 'NewsletterContent Not Found..!');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $NewsletterContent = NewsletterContent::find($request->id);
        if ($NewsletterContent) {
            $NewsletterContent->content = $request['content'];
            $NewsletterContent->update();
            if ($NewsletterContent) {
                return redirect()->route('admin.newslettermails.index')->with('message', 'NewsletterContent Updated Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..');
            }
        } else {
            return redirect()->back()->with('error', 'NewsletterContent Not Found..!');
        }
    }

    public function delete($id)
    {
        if ($id) {
            $NewsletterContent = NewsletterContent::find($id);
            $NewsletterContent = $NewsletterContent->delete();
            if ($NewsletterContent) {
                return redirect()->route('admin.newslettermails.index')->with('message', 'Newsletter Mail Deleted Sucssesfully..');
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..!');
            }
        } else {
            return redirect()->back()->with('error', 'NewsletterContent Not Found..!');
        }
    }

    public function  sendMail($id)
    {
        $NewsletterContent = NewsletterContent::find($id);
        if ($NewsletterContent) {
            $emailAddresses = Newsletter::where('status', 1)->whereNotNull('email')->pluck('email')->toArray();
            $count = 0;
            foreach ($emailAddresses as $email) {
                $alredysent =  NewsletterMail::where('newsletter_content_id', $id)->where('email', $email)->first();
                if(isset($alredysent) && $alredysent){

                }else{
                    $count++;
                    $encryptemail = encrypt($email);
                    $data = [
                        'encryptemail' => $encryptemail,
                        'content' => $NewsletterContent['content'],
                    ];
                    Mail::to($email)->send(new MailNewsletterMail($data));
                    $newsletterMail = new NewsletterMail(['email' => $email]);
                    $NewsletterContent->mails()->save($newsletterMail);
                }
            }
            if($count > 0){
                return redirect()->route('admin.newslettermails.view', ['id' => $NewsletterContent->id])->with('message', 'Mails Sent Sucssesfully..');;
            }else{
                return redirect()->back()->with('error', 'New Emails Not Found..!');
            }
        } else {
            return redirect()->back()->with('error', 'NewsletterContent Not Found..!');
        }
    }
}
