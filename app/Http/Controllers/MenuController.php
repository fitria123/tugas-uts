<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        return view('menu.index');
    }

    public function tambah(){
        return view('menu.tambah');
    }

    public function edit(Request $request){
        return view ('menu.edit');
    }
}
