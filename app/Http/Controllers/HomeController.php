<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactsAutoreply;
use App\Mail\NewContactAdminNotification;
use App\Lead;

class HomeController extends Controller
{
    public function index () {     
        return view('home');
    }

    public function contacts() {
        return view('contacts');
    }

    public function newContact(Request $request) {

        $request->validate([
            'terms-and-conditions' => 'required',
            'name' => 'required',
            'email' => 'required',
            'message' => 'min:10'
        ]);

        $form_data = $request->all();

        if(isset($form_data['marketing-conditions'])) {
            $new_lead = new Lead();
            $new_lead->fill($form_data);
            $new_lead->save();
        }

        $data = [
            'form_data' => $form_data
        ];

        Mail::to($form_data['email'])->send(new ContactsAutoreply($form_data));
        Mail::to('catalin@mail.com')->send(new NewContactAdminNotification($form_data));

        return view ('new-contact-greeting', $data);
    }

    public function newContactGreeting() {
        return view ('contacts.new-contact-greeting');
    }

    public function termsAndConditions() {
        return view('terms-and-conditions');
    }

    public function marketingConditions() {
        return view('marketing-conditions');
    }
}
