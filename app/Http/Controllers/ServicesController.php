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
            'title' => 'required|unique:services',
            'description' => 'required',
            'icon' => 'required',
           ]);

        DB::table('services')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
       ]);

    //  $data = Services::all();


       return redirect('home/services')->with('success', 'Home Services Added Successfully');

    }

    public function serviceseditpage($id){
        $serviceseditdata = DB::table('services')->find($id);

        return view('admin.services.editservices', compact('serviceseditdata'));
    }

    public function servicesedit(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
           ]);

    //     DB::table('services')->find($id)->update([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'icon' => $request->icon,
    //    ]);

    //  $data = Services::all();

      $data = Services::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $data->icon = $request->icon;

        $data->save();


       return redirect('home/services')->with('success', 'Home services updated Successfully');

    }

    public function servicesdelete($id){

        // DB::table('services')->find($id)->delete();

        Services::find($id)->delete();

        return redirect('home/services')->with('success', 'Home services Deleted Successfully');

    }
}
