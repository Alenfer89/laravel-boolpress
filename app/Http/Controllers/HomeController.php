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
        $request->validate(
            [
                'guestName' => 'required|min:3',
                'guestEmail' => 'required|email',
                'guestMessage' => 'required|max:300'
            ],
            [
                'required' => ':attribute is required',
                'email' => ':attribute is not a valid email address',
                'min' => ':attribute should have at least :min characters',
                'max' => ':attribute should be no longer than :max characters'
            ]
        );
        /**
         * @ prendo i dati dal form 'guest.contact'.
         * . richiamo oggetto MAil con funzione send, al cui interno istanzio un nuovo oggetto SendNewMail con i dati della funzione costruttore per poterla buildare
         * ù una volta inviata la email ridireziono l'utente su una pagina placeholder di ringraziamento con link per la homepage con dentro div di VueJs
         */
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
