<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SiteSettingController extends Controller
{
    //
    public function index()
    {
        $siteSettingObj = SiteSetting::where('status', 1)->orderBy('order', 'asc')->get();
        $data['siteSettingObj'] = $siteSettingObj;
        return view('admin.site.setting', $data);
    }

    public function save(Request $request)
    {
        $isSave = false;
        $settingObj = "";
        // echo "<pre>"; print_r($request->setting);die;
        if (isset($request->setting) &&  count($request->setting) > 0) {
            foreach ($request->setting as $key => $fieldValue) {
                $settingObj = SiteSetting::find($key);
                foreach ($fieldValue as $field => $value) {

                    if ($field == 'header_logo') {

                        $folderPath = public_path('custom-assets/admin/uplode/images/sitesettings/images/');
                        if (!file_exists($folderPath)) {
                            mkdir($folderPath, 0777, true);
                        }

                        $imageoriginalname = str_replace(" ", "-", $value->getClientOriginalName());
                        $imageName = rand(1000, 9999) . time() . $imageoriginalname;
                        $value->move($folderPath, $imageName);
                        $settingObj->value = 'custom-assets/admin/uplode/images/sitesettings/images/' . $imageName;

                        if ($request->old_header_logo && file_exists(public_path($request->old_header_logo))) {
                            unlink(public_path($request->old_header_logo));
                        }
                    } else if ($field == 'favicon') {
                        $folderPath = public_path('custom-assets/admin/uplode/images/sitesettings/images/');
                        if (!file_exists($folderPath)) {
                            mkdir($folderPath, 0777, true);
                        }
                        $imageoriginalname = str_replace(" ", "-", $value->getClientOriginalName());
                        $imageName = rand(1000, 9999) . time() . $imageoriginalname;
                        $value->move($folderPath, $imageName);
                        $settingObj->value = 'custom-assets/admin/uplode/images/sitesettings/images/' . $imageName;

                        if ($request->old_favicon && file_exists(public_path($request->old_favicon))) {
                            unlink(public_path($request->old_favicon));
                        }
                    } else if ($field == 'loader') {
                        $folderPath = public_path('custom-assets/admin/uplode/images/sitesettings/images/');
                        if (!file_exists($folderPath)) {
                            mkdir($folderPath, 0777, true);
                        }

                        $imageoriginalname = str_replace(" ", "-", $value->getClientOriginalName());
                        $imageName = rand(1000, 9999) . time() . $imageoriginalname;
                        $value->move($folderPath, $imageName);
                        $settingObj->value = 'custom-assets/admin/uplode/images/sitesettings/images/' . $imageName;

                        if ($request->old_loader && file_exists(public_path($request->old_loader))) {
                            unlink(public_path($request->old_loader));
                        }
                    } else {
                        if ($value) {
                            $settingObj->value = $value;
                        } else {
                            $settingObj->value = null;
                        }
                        $settingObj->updated_at = date('Y-m-d H:i:s');
                    }
                    if ($settingObj->save()) {
                        $isSave = true;
                    }
                }
            }
        } else {
            $isSave = true;
        }

        if ($isSave) {
            return redirect()->route('admin.site.settings.index')->with('message', 'Site Settings Updated Successfully..');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }
}
