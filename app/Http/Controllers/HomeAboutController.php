<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeAboutController extends Controller
{
    public function index(){
        $aboutdata = DB::table('home_abouts')->first();

        return view('admin.HomeAbout.index', compact('aboutdata'));
    }
}
