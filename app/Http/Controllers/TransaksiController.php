<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index(){
        // dd(Transaksi::all());
        return view('admin.transaksi.index', [
            'transaksis' => Transaksi::with('operator', 'items')->get()
        ]);
    }

    public function create(){
        $daftars = Menu::all();
        return view ('admin/transaksi/create', ['daftars' => $daftars]);
    }

    public function store(Request $request){
        var_dump($request->all());
        // dd($request->get('harga'));
        $transaksi = new Transaksi();
        $transaksi->fill([
            'user_id' => Auth::id(),
            'total_harga' => $request->get('total_harga')
        ]);
        $transaksi->save();
        $no_daftar = 0;
        foreach($request->get('id_daftar') as $id_daftar){
            $daftar = Menu::findOrFail($id_daftar);
            // dd($daftar);
            $transaksi_item = new TransaksiItem();
            $transaksi_item->fill([
                'id_transaksi' => $transaksi->id,
                'id_menu' => $id_daftar,
                'nama' => $daftar->menu,
                'harga' =>$daftar->harga,
                'quantity' =>$request->get('quantity')[$no_daftar]
            ]);
            // dd($transaksi_item);
            $transaksi_item->save();
            $no_daftar++;
        }
        return redirect()->route('transaksi.index');

    }

    public function destroy($id){
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->back();
    }
}
