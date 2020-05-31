<?php

namespace App\Http\Controllers;
use App\Conference;
use App\Contact;
use App\User;
use DB;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->forget('conference');
        $conferences = \App\Conference::all();
      
        return view('adminHome',compact('conferences')); 
    }

    public function main(Request $request)
    {
        $request->session()->forget('contact');
        $contacts = \App\Contact::all();
        return view('conferencee.adminContact',compact('contacts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createForm(Request $request)
    {
        return view('conferencee.create');
    }

    public function PostcreateForm(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:conferences',
        ]);
        if(empty($request->session()->get('conference'))){
            $conference = new \App\Conference();
            $conference->fill($validatedData);
            $request->session()->put('conference', $conference);
        }else{
            $conference = $request->session()->get('conference');
            $conference->fill($validatedData);
            $request->session()->put('conference', $conference);
        }
        return redirect('/Form');
    }

    public function createContact(Request $request)
    {
        return view('conferencee.contact');
    }

    public function PostcreateContact(Request $request)
    {
        $email = $request->input('email');
        $content = $request->input('content');

        DB::insert('insert into contacts (email,content) values(?,?)'
        ,[$email,$content]);

        return redirect('/Contact');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'upload'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $conference = new Conference([
            'id' => $request->get('id'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'contact_no' => $request->get('contact_no'),
            'payment' => $request->get('payment'),
            'upload' => $request->get('upload'),
            'event' => $request->get('event'),
            'online' => $request->get('online'),
            'fees' => $request->get('fees'),
        ]);
        if ($request->has('upload')) {
        $fileName = "uploadImage-" . time() . '.' . request()->upload->getClientOriginalExtension();
        $request->upload->storeAs('upload', $fileName);
        $conference->upload = $fileName;
        }
        $conference->save();
        return redirect('/Form')->with('success', 'Registration sent!');


    }

    public function save(Request $request)
    {
        $request->validate([
            'email'=>'required'
        ]);
        $contact = new Contact([
            'email' => $request->get('email'),
            'content' => $request->get('content')
        ]);
        $contact->save();
        return redirect('/Contact')->with('success', 'Message sent!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conference = Conference::find($id);
        return view('conferencee.view',compact('conference'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conference = Conference::find($id);
        return view('conferencee.edit',compact('conference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'payed'=>'required',
            'attendance'=>'required'

        ]);
        $conference = Conference::find($id);
        $conference->name = $request->get('name');
        $conference->email = $request->get('email');
        $conference->address = $request->get('address');
        $conference->contact_no = $request->get('contact_no');
        $conference->payment= $request->get('payment');
        $conference->event = $request->get('event');
        $conference->online = $request->get('online');
        $conference->fees = $request->get('fees');
        $conference->payed = $request->get('payed');
        $conference->attendance = $request->get('attendance');
        $conference->save();

        return redirect('/adminhome')->with('success','Participant updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param string $email
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conference = Conference::find($id);
        $conference->delete();
        return redirect('/adminhome')->with('success','Participant deleted!');
    }

    public function deleteContact($email)
    {
        DB::delete('delete from contacts where email = ?',[$email]);
        return redirect('/admincontact')->with('success','Contact deleted!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $conferences = DB::table('conferences')->where('name','like','%'.$search.'%')
                    ->orwhere('id','like','%'.$search.'%')
                    ->orwhere('event','like','%'.$search.'%')
                    ->orwhere('payment','like','%'.$search.'%')
                    ->orwhere('online','like','%'.$search.'%')
                    ->orwhere('fees','like','%'.$search.'%')
                    ->orwhere('address','like','%'.$search.'%')->paginate(5);

        return view('adminHome',['conferences'=>$conferences]);
    }
}
