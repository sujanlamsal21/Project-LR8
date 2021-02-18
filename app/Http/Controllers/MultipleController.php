<?php

namespace App\Http\Controllers;

use App\Models\Multiple;
use Illuminate\Http\Request;

class MultipleController extends Controller
{
    public function multipleimage(){
        $multiple = Multiple::all();
        return view('admin.multiple.index', compact('multiple'));
    }

    public function multipleimagestore(Request $request){

        $request->validate([
            'multiple_image' => 'required',
        ]);

        $image = $request->file('multiple_image');

        foreach($image as $multiimage){

        $unique_image = hexdec(uniqid());

        $img_ext = strtolower($multiimage->getClientOriginalExtension());

        $img_name = $unique_image.'.'.$img_ext;

        $up_location = 'images/multiple/';

        $last_img = $up_location.$img_name;

        $multiimage->move($up_location, $img_name);

        // $img_name = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();

        // Image::make($brand_image)->resize(300,200)->save('images/brand/'.$img_name);

        // $last_img = 'images/brand/'.$img_name;

         $multi = new Multiple;

         $multi->multiple_image = $last_img;

         $multi->save();
        } // end foreach

         return redirect('/multiple/all')->with('success', 'Multiple Image Added successfully');

    }
}
