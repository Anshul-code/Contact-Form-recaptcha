<?php

namespace Anshul\Contact\Http\Controllers;

use Anshul\Contact\Models\Contact;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(){
        return view('contact::contact');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|min:4|max:30',
            'email' => 'required|email',
            'message' => 'required|min:10|max:255',
            'g-recaptcha-response' => 'required'
        ]);
        $client = new Client();

        //get the response
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify',[
            'form_params' => [
                'secret' => config('recaptcha.secret'),
                'response' => $request->input('g-recaptcha-response')
            ]
        ]);

        //store the result 
        $result = json_decode($response->getBody()->getContents());
      
        if($result->success){
            //add messages to database
            $contact = new Contact;
            $contact->name = $request->get('name');
            $contact->email = $request->get('email');
            $contact->message = $request->get('message');
            $contact->save();
            return redirect('/contact')->with('success','Message has been submitted');
        }
        else{
            return redirect('/contact')->with('error','reCAPTCHA Error');
        }
    }
}
