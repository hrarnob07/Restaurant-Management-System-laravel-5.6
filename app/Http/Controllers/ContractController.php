<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;

class ContractController extends Controller
{
   
    public function index(Request $request)
    {
      
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        Toastr::success('Your message successfully send.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    
    }

 
    public function contact_show()
    {
        $contacts =  Contact::all();
       
        return view('admin.contact_show',['contacts'=>$contacts]);
    }


    public function store(Request $request)
    {
        //
    }

 
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
}
