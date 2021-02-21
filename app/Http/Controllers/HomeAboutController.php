<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeAboutController extends Controller
{
    public function index(){
        $aboutdata = DB::table('home_abouts')->get();
        return view('admin.HomeAbout.index', compact('aboutdata'));
    }

    public function AboutAddPage(){
        return view('admin.HomeAbout.addAbout');
    }

    public function AboutAdd(Request $request){
       $request->validate([
        'title' => 'required|unique:home_abouts',
        'short_desc' => 'required',
        'long_desc' => 'required',
       ]);

       DB::table('home_abouts')->insert([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' =>$request->long_desc,
       ]);

       return redirect('home/about')->with('success', 'Home About Added Successfully');
    }

    public function AboutEditPage($id){
        $data = DB::table('home_abouts')->find($id);

        return view('admin.HomeAbout.editPage', compact('data'));
    }

    public function AboutEdit(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
           ]);

        //    DB::table('home_abouts')->find($id)->insert([
        //         'title' => $request->title,
        //         'short_desc' => $request->short_desc,
        //         'long_desc' =>$request->long_desc,
        //    ]);

        $data = HomeAbout::find($id);

        $data->title = $request->title;

        $data->short_desc = $request->short_desc;

        $data->long_desc = $request->long_desc;

        $data->save();

           return redirect('home/about')->with('success', 'Home About Edited Successfully');
    }

    public function AboutDelete($id){

        HomeAbout::Find($id)->delete();

        return redirect('home/about')->with('success', 'About Deleted successfully');
    }
}
