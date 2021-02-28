<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactprofile;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function index(){
        $contactdetails = DB::table('contactprofiles')->first();
        return view('contactpage', compact('contactdetails'));
    }

    public function admincontact(){
        $contactvalue =DB::table('contactprofiles')->get();
        return view('admin.contact.index', compact('contactvalue'));
    }

    public function admincontactaddpage(){
        $contactvalue =DB::table('contactprofiles')->get();
        return view('admin.contact.addpage', compact('contactvalue'));
    }

    public function adminContactadd(Request $request){
             $this->validate($request, [
                 'address' => 'required',
                 'email' => 'required',
                 'phoneno' =>'required',
             ]);

             DB::table('contactprofiles')->insert([
                    'address' => $request->address,
                    'email' => $request->email,
                    'phoneno'=>$request->phoneno,
             ]);

             return redirect('contact/all')->with('success', 'Contact added successfully');
    }
    public function admineditpage($id){
        $contactvalue =DB::table('contactprofiles')->find($id);
        return view('admin.contact.editpage', compact('contactvalue'));

    }

    public function adminedit(Request $request, $id){
        $this->validate($request, [
            'address' => 'required',
            'email' => 'required',
            'phoneno' =>'required',
        ]);
        DB::table('contactprofiles')->where('id', $id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phoneno'=>$request->phoneno,
     ]);

     return redirect('contact/all')->with('success', 'Contact edited successfully');
    }

    public function admincontactdelete($id){
        DB::table('contactprofiles')->where('id', $id)->delete();
        return redirect('contact/all')->with('success', 'Contact deleted successfully');
    }

    public function admincontactform(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);

        DB::table('contact_forms')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('contact')->with('success', 'Thank You Message Has Been Send.');
    }

    public function contactdetails(){
        $contactdetails=DB::table('contact_forms')->get();
        return view('admin.contact.showdetails', compact('contactdetails'));
    }


}
