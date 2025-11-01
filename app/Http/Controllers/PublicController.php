<?php

namespace App\Http\Controllers;


use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class PublicController extends Controller
{

    public $users = [
                ['name' => 'Lorenzo', 'surname' => 'Rossi', 'role' => 'Boss'],
                ['name' => 'Laura', 'surname' => 'Bianchi', 'role' => 'Employer'],
                ['name' => 'Mario', 'surname' => 'Verdi', 'role' => 'Director'],
            ];



    public function home() {
        return view('welcome');
    }


    public function aboutUs() {
        return view('About-Us', ['users' => $this->users]);
    }


    public function aboutUsDetails($name) {
        
        foreach ($this->users as $user) {
            if ($name == $user['name']) {
                return view('About-Us-Details', ['user' => $user]);
            }
        }

    }


    public function contattiEmail(Request $request) {

        $emailUser = $request->input('email');
        $user = $request->input('user');
        $testoUser = $request->input('testoUser');
        $datiUser = compact('emailUser', 'user', 'testoUser');


        try {
            Mail::to($emailUser)->send(new ContactMail($datiUser));

        } catch (Exception $e) {
            return redirect(route('Home'))->with('erroreEmail', 'Ci scusiamo per il disagio, errore con il server');
        }
        
        return redirect(route('Home'))->with('email-inviata', 'Hai inviato la tua email');

    }



    public function profilo() {
        return view('Profilo');
    }



    public function Posts() {
        return view('Posts');
    }
    

    
}
