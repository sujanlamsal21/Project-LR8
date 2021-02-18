<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function AllCat(){
        //$category = Category::all()->paginate(1);
        $category = Category::latest()->paginate(6);
        $trash = Category::onlyTrashed()->latest()->paginate(5);
        return view('admin.category.index', compact('category', 'trash'));
    }

    public function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],[
            'category_name.required' => 'Category is required',
            'category_name.max' => 'to many arguments',
        ]);

    $category = new Category;
    $category->user_id = $request->user()->id;
    $category->category_name = $request->category_name;
    $category->save();

    // Category::insert([
    //     'category_name' => $request->category_name,
    //     'user_id' => Auth::user()->id,
    // ]);

    return redirect()->back()->with('success', 'Category Inserted Successfully');

    }
    public function Edit($id){
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category =Category::find($id);
        $category->user_id = Auth::user()->id;
        $category->category_name = $request->category_name;
        $category->save();

        return redirect('/category/all')->with('success', 'Data Updated successfully');

    }

    public function softDelete($id){
        Category::find($id)->delete();
        return redirect('/category/all')->with('error', 'Data Soft Deleted Successfully');
    }

    public function restore($id){
        Category::withTrashed()->find($id)->restore();
        return redirect('/category/all')->with('success', 'Data Restored Successfully');
    }

    public function pdelete($id){
        Category::onlyTrashed()->find($id)->forcedelete();
        return redirect('/category/all')->with('error', 'Data Deleted Successfully');
    }
}
