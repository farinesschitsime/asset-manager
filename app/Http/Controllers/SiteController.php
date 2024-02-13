<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        return view('greeting')->with([
            'name'=>"Francis",
            'names'=>[
                'Francis',
                'Joseph',
                'Anderson'
            ],
            'num_users'=>200
        ]);
    }

    public function dashboard(){
        $institutions = \App\Models\Institution::all();

        return view("dashboard")->with([
            'institutions'=>$institutions
        ]);
    }
}
