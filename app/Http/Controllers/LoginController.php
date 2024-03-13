<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ValidationText;
use App\Models\NotificationText;
use App\Models\User;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public $errorTexts;
    public $notify;
    public function __construct()
    {
        $this->errorTexts = ValidationText::all();
        $this->notify = NotificationText::all();

    }
    public function login(Request $request)
    {
        $rules = [
            'email' => "required",
            "password" => "required",
        ];
        $customMessages = [
            'email.required' => $this->errorTexts->where('id', 1)->first()->translated_custom_text,
            'email.email' => $this->errorTexts->where('id', 2)->first()->translated_custom_text,
            'password.required' => $this->errorTexts->where('id', 12)->first()->translated_custom_text,

        ];
        $this->validate($request, $rules, $customMessages);
        $credential = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        $user = User::where("email", $request->email)->first();
        \Log::info("this os the user" . $user);
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if (Auth::guard("web")->attempt($credential)) {
                    \Log::info("this is the user after password" . $user);
                    $message = $this->notify->where('id', 26)->first()->custom_text;
                    $notification = array($message, "success");
                    return response()->json(['success' => $notification]);
                } else {
                    $message = $this->notify->where('id', 28)->first()->custom_text;
                    $notification = array($message, 'error');

                    return response()->json(['error' => $notification]);
                }
            } else {
                $message = $this->notify->where('id', 148)->first()->custom_text;
                $notification = array(
                    $message,
                    "error"
                );


                return response()->json(['errorP' => $notification]);
            }
        } else {
            $message = $this->notify->where('id', 25)->first()->custom_text;
            $notification = array(
                $message,
                "error"
            );
            return response()->json(["errorEmail" => $notification]);
        }
    }

    //Log out
    public function userLogOut()
    {
        Auth::guard("web")->logout();
        return redirect("/");
    }
    //register:
    public function register(Request $request)
    {

        $rules = [
            'name' => "required",
            'email' => "required|unique:users|email",
            "password" => "required|min:3",


        ];
        $customMessage = [
            'name.required' => ValidationText::query()->where("id", 4)->first()->translated_custom_text,
            'email.required' => ValidationText::query()->where("id", 1)->first()->translated_custom_text,
            "email.email" => ValidationText::query()->where("id", 2)->first()->translated_custom_text,
            "email.unique" => ValidationText::query()->where("id", 3)->first()->translated_custom_text,
            "password.required" => ValidationText::query()->where("id", 12)->first()->translated_custom_text,
            "password.min" => ValidationText::query()->where("id", 35)->first()->translated_custom_text,
        ];
        $slug = Str::slug($request->name);
        \Log::info("registered user slug" . $slug);

        $this->validate($request, $rules, $customMessage);
        $user = User::create([
            "name" => $request->name,
            "slug" => $slug,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        Auth::login($user);
        $message = $this->notify->where("id",31)->first()->custom_text;
        $notification = array(
            $message,
            "success"
        );

        return response()->json(['success' => $notification]);
       
    }
}