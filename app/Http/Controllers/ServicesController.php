<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function index(){
        $servicesdata = DB::table('services')->get();

        return view('admin.services.index', compact('servicesdata'));
    }

    public function servicesAddPage(){
        $servicesdata = DB::table('services')->get();

        return view('admin.services.addPage', compact('servicesdata'));
    }

    public function servicesAdd(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' =>'required',
        ]);

        DB::table('services')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
       ]);

    //  $data = Services::all();


       return redirect('home/services')->with('success', 'Home Services Added Successfully');

    }
}
