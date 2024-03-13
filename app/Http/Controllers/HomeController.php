<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Language;
use App\Models\ManageText;
use Illuminate\Http\Request;
use App\Models\ValidationText;
use App\Models\NotificationText;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\MockObject\Generator\OriginalConstructorInvocationRequiredException;

class HomeController extends Controller
{
    //
    public function setLang(Request $request)
    {
        $notification = NotificationText::all();
        $inputSub = $request->input("action");
        \Log::info("this is the lang " . $inputSub);
        $lang = Language::where("code", "=", $inputSub)->first();
        $hasLangSession = Session::has("lang");
        if ($hasLangSession) {
            Session::forget('lang');
        }
        if ($lang) {
            Session::put('lang', $lang->code);
        } else {
            Session::put('lang', config("app.locale"));
        }

        \Log::info("this is the session " . Session::get("lang"));
        $webText = ManageText::all();
        $notify1 = $notification->where("id", 26)->first()->custom_text;
        $notify = array(
            "message" => $notify1,
            "alert" => "success"
        );

        \Log::info("this is the noftifaction mess : " . $notify1);
        \Log::info(json_encode($notify));

        \Log::info("this the password text: " . $webText->where("id", 61)->first());
        return redirect()->back()->with("succ");

    }
    public function searchList(Request $request)
    {
        \Log::info("the location:" . $request->locationItem);
        if ($request->searchItem == null && $request->locationItem == "all") {
            $message = ValidationText::where("id", 9)->first()->custom_text;
            \Log::info("the search item and location are empty" . $message);
            $notification = array(
                $message,
                "error"
            );

            return response()->json(['error' => $notification]);


        }
        
        if ($request->searchItem) {
            $searchSlug = slugify($request->searchItem);
            // $dataList = Listing::where("slug","=",$searchSlug)->first();
            // $dataList = Listing::where("title","like","%$request->searchItem%")->get();
            $dataList = Listing::where("slug", "like", "%$searchSlug%")->get();
            \Log::info("the search item:" . count($dataList));
            Session::put('dataList', $dataList);

            // Redirect to the listings page
            // return redirect()->route('listings');
            return response()->json(['success' => $dataList]);
            // return view('userIdex.listings', compact('dataList'));
        }
        if ($request->locationItem !== "all") {
            
            $dataList = Listing::where("location_id", $request->locationItem)->get();
           
            \Log::info("this is the listing" . count($dataList));

            Session::put('dataList', $dataList);


            return response()->json(['success' => $dataList]);
        }
        if($request->searchItem !== null && $request->locationItem !== "all"){
            $searchSlug = slugify($request->searchItem);
            $dataList = Listing::where(["location_id", $request->locationItem],["slug", "like", "%$searchSlug%"])->get();
            \Log::info("this is the listing" . count($dataList));

            Session::put('dataList', $dataList);


            return response()->json(['success' => $dataList]);
        }
        // return redirect()->back();
    }
}