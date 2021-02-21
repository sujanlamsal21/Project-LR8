<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function SliderPage(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function SliderAdd(){

        return view('admin.slider.addslider');
    }

    public function SliderAddPage(Request $request){

        $validated = $request->validate([
            'title' => 'required|unique:sliders|max:255',
            'description' => 'required',
            'slider_image' => 'required',
        ]);

        $imagefile = $request->file('slider_image');

        $unique_id =hexdec(uniqid());

        $img_ext = strtolower($imagefile->getClientOriginalExtension());

        $img_name = $unique_id.'.'.$img_ext;

        $up_location ="images/slider/";

        $last_img = $up_location.$img_name;

        $imagefile->move($up_location, $img_name);

        DB::table('sliders')->insert(
            array(
                   'title'     =>   $request->title,
                   'description'   =>   $request->description,
                   'slider_image' => $last_img,
                   'created_at' => Carbon::now(),

            )
       );

       return redirect('home/slider')->with('success', 'Slider added successfully');
    }

    public function Slidereditpage($id){
        $data = DB::table('sliders')->find($id);

        return view('admin.slider.edit', compact('data'));


    }

    public function SliderUpdate(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);

        $imagefile = $request->file('slider_image');

        if($imagefile){

        $unique_id =hexdec(uniqid());

        $img_ext = strtolower($imagefile->getClientOriginalExtension());

        $img_name = $unique_id.'.'.$img_ext;

        $up_location ="images/slider/";

        $last_img = $up_location.$img_name;

        $imagefile->move($up_location, $img_name);

    //     DB::table('sliders')->find($id)->update(
    //         array(
    //                'title'     =>   $request->title,
    //                'description'   =>   $request->description,
    //                'slider_image' => $last_img,
    //                'updated_at' => Carbon::now(),

    //         )
    //    );

     $data = Slider::find($id);

     $data->title = $request->title;

     $data-> description = $request->description;

     $data->slider_image = $last_img;

     $data->save();

       return redirect('home/slider')->with('success', 'Slider Updated successfully');
        }else{
        //    $data = DB::table('sliders')->find($id);

        $data = Slider::find($id);

           $old_img =$data->slider_image;

        //     DB::table('sliders')->update(
        //         array(
        //                'title'     =>   $request->title,
        //                'description'   =>   $request->description,
        //                'slider_image' => $old_img,
        //                'updated_at' => Carbon::now(),

        //         )
        //    );

       $data = Slider::find($id);

       $data->title = $request->title;

        $data-> description = $request->description;

        $data->slider_image = $old_img;

        $data->save();


           return redirect('home/slider')->with('success', 'Slider Updated successfully');
        }
    }

    public function SliderDelete($id){
        $data = DB::table('sliders')->find($id);

        $old_img = $data->slider_image;

        unlink($old_img);

        Slider::Find($id)->delete();

        return redirect('home/slider')->with('success', 'Slider Deleted successfully');
    }
}
