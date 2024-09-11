<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\ContactSetting;
use App\Models\HomeSlider;
use App\Models\Newsletter;
use App\Models\SistersCompanyLogo;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function home()
    {
        $ContactSetting = ContactSetting::where('static_id', 1)->where('status', 1)->first();
        $HomeSlider = HomeSlider::where('status', 1)->orderBy('id', 'DESC')->get();
        $SistersCompanyLogos = SistersCompanyLogo::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('front.pages.home', ['HomeSlider' => $HomeSlider, 'ContactSetting' => $ContactSetting, 'SistersCompanyLogos' => $SistersCompanyLogos]);
    }
    public function about()
    {
        return view('front.pages.about');
    }
    public function services()
    {
        return view('front.pages.services');
    }

    public function term_and_condition()
    {
        return view('front.pages.term_and_condition');
    }
    public function privacy_policy()
    {
        return view('front.pages.privacy_policy');
    }

    public function newsletterSave(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $Newsletter = Newsletter::where('email', $request->email)->where('status', 1)->first();
        if ($Newsletter) {
            return redirect()->back()->with('message', 'Thank you for subscribing to our newsletter! Stay tuned for the latest updates and exciting news.');
        }
        $Newsletter = Newsletter::where('email', $request->email)->where('status', 0)->first();
        if ($Newsletter) {
            $Newsletter->status = 1;
            $Newsletter->save();
            return redirect()->back()->with('message', 'Thank you for subscribing to our newsletter! Stay tuned for the latest updates and exciting news.');
        }

        $Newsletter = new Newsletter();
        $Newsletter->email = $request['email'];
        $Newsletter->save();

        if ($Newsletter) {
            return redirect()->back()->with('message', 'Thank you for subscribing to our newsletter! Stay tuned for the latest updates and exciting news.');
        } else {
            return redirect()->back()->with('error', 'Somthing Went Wrong..');
        }
    }


    public function newsletterUnSubscribe(Request $request)
    {
        $email = decrypt($request->email);
        $Newsletter = Newsletter::where('email', $email)->first();
        if (!$Newsletter) {
            return redirect()->route('front.home')->with('error', 'Not Subscribed..');
        }
        if ($Newsletter && $Newsletter->status == 1) {
            $Newsletter->status = 0;
            $Newsletter->save();
            return redirect()->route('front.home')->with('message', 'UnSubscribed Sucssesfully!..');
        }
        return redirect()->route('front.home')->with('error', 'Already UnSubscribed..');
    }

    public function productCategory($id)
    {
        $Product = Subcategory::find($id);
        if ($Product) {
            return view('front.pages.product', ['Product' => $Product]);
        } else {
            return redirect()->back()->with('error', 'Product Not Found..!');
        }
    }

    public function productSubCategory($id)
    {
        $Product = SubSubCategory::find($id);
        if ($Product) {
            return view('front.pages.sub-product', ['Product' => $Product]);
        } else {
            return redirect()->back()->with('error', 'Product Not Found..!');
        }
    }
}
