<?php

namespace App\Http\Controllers;

use App\Mail\SendNewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }

    public function contact()
    {
        return view('guest.contact');
    }

    public function emailSender(Request $request)
    {
        //Mail::to($request->user())->send(new SendNewMail());
        //Mail::to($request->guestEmail)->send(new SendNewMail());
        Mail::to("randomAdmin@mail.com")->send(new SendNewMail($request->guestName, $request->guestEmail, $request->guestMessage));

        return redirect()->route('guest.thanks')->with('message', "$request->guestName, your message has been successfully sent");
    }

    public function thanks()
    {
        return view('guest.thanks');
    }
}
