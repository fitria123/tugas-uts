<?php

namespace App\Http\Controllers;
use App\Models\Menu;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request){
        if($request->ajax())
        {
            $menu = Menu::all();
            return response()->json($menu);
        }

        return view('menu.index');
    }

    public function tambah(Request $request){
        // dd($request);
        // dump($request->all());
        // Validasi data
        $request->validate([
            'menu' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);

        // dd($request);
        // Buat menu baru
        $menu = new Menu();
        $menu->menu = $request->menu;
        $menu->harga = $request->harga;
        // dd($menu);
        $menu->save();

        // Return response
        return response()->json(['success' => 'Menu has been added successfully']);
    }

    public function show($id){
        $menu = Menu::findOrFail($id);
        return response()->json($menu);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'menu' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->menu = $request->menu;
        $menu->harga = $request->harga;
        $menu->save();

        return response()->json(['success' => 'Menu updated successfully']);
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return response()->json(['success' => 'Menu deleted successfully']);
    }
}
