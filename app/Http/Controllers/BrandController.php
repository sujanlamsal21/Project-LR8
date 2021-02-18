<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index(){

        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.brand', compact('brands'));
    }

    public function brandstore(Request $request){

        $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],[
            'brand_name.required' => 'Brand Name is required',
            'brand_name.min' => 'Brand name must be at least 4 character',
        ]);

        $brand_image = $request->file('brand_image');

        $unique_image = hexdec(uniqid());

        $img_ext = strtolower($brand_image->getClientOriginalExtension());

        $img_name = $unique_image.'.'.$img_ext;

        $up_location = 'images/brand/';

        $last_img = $up_location.$img_name;

        $brand_image->move($up_location, $img_name);

        // $img_name = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();

        // Image::make($brand_image)->resize(300,200)->save('images/brand/'.$img_name);

        // $last_img = 'images/brand/'.$img_name;

         $brand = new Brand;

         $brand->brand_name = $request->brand_name;

         $brand->brand_image = $last_img;

         $brand->save();

         return redirect('/brand/all')->with('success', 'Brand Added successfully');
    }

    public function edit($id){
        $brand = Brand::find($id);

        return view('admin.brand.edit', compact('brand'));
    }

    public function brandupdate(Request $request, $id){

        $this->validate($request, [
            'brand_name' => 'required|min:4',
        ],[
            'brand_name.required' => 'Brand Name is required',
            'brand_name.min' => 'Brand name must be at least 4 character',
        ]);

        $brand_image = $request->file('brand_updatedimage');

        if($brand_image){

            $unique_image = hexdec(uniqid());

        $img_ext = strtolower($brand_image->getClientOriginalExtension());

        $img_name = $unique_image.'.'.$img_ext;

        $up_location = 'images/brand/';

        $last_img = $up_location.$img_name;

        $brand_image->move($up_location, $img_name);

         $brand = Brand::find($id);

         $brand->brand_name = $request->brand_name;

         $brand->brand_image = $last_img;

         $brand->save();

         return redirect('/brand/all')->with('success', 'Brand Added successfully');
        } else{
            return redirect('/brand/all')->with('success', 'Brand failed successfully');

        }

    }
    public function branddelete($id){
          $image = Brand::find($id);

          $old_image =$image->brand_image;

          unlink($old_image);

           Brand::find($id)->delete();
           return redirect('/brand/all')->with('success', 'Brand Deleted successfully');
    }

    public function Logout(){
        Auth::logout();
        return redirect('login')->with('success', 'Logout Successfull');
    }



}
