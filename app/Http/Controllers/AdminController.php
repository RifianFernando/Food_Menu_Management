<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function userPage(){
        $admins = Admin::all();
        return view('page' , ['admins' => $admins]); 
    }
    
    public function adminDashboard(){
        $admins = Admin::all();
        return view('adminDashboard', ['admins' => $admins]);
    }

    public function createItem(){
        $admins = Admin::all();
        return view('createItem', ['admins' => $admins]);;
    }

    public function create(Request $request){

        $request->validate([
            'file' => 'required|image:jpg,jpef,png',
            'namaMenu' => 'required|string',
            'kategoriMenu' => 'required|string',
            'deskripsiMenu' => 'required|string',
            'hargaMenu' => 'required|numeric'
        ]);

        $file = $request->file('file')->getClientOriginalName();

        $insert = $request->file('file')->storeAs('public', $file);

        Admin::create([
            'file' => $file,
            'namaMenu' => $request->namaMenu,
            'kategoriMenu' => $request->kategoriMenu,
            'deskripsiMenu' => $request->deskripsiMenu,
            'hargaMenu' => $request->hargaMenu,
        ]);

        return redirect(route('adminDashboard'));
    }

    public function updateItem($id){
        $admins = Admin::find($id);
        return view('updateItem', ['admins' => $admins]);
    }

    public function update(Request $request, $id){
        $admins = Admin::find($id);

        $request->validate([
            'file' => 'required|image:jpg,jpef,png',
            'namaMenu' => 'required|string',
            'kategoriMenu' => 'required|string',
            'deskripsiMenu' => 'required|string',
            'hargaMenu' => 'required|numeric'
         ]);

        $file = $request->file('file')->getClientOriginalName();

        $insert = $request->file('file')->storeAs('public', $file);

	    // $nama_file1 = time()."_".$file->getClientOriginalName();

	    // $tujuan_upload = 'data_file'; /*isi dengan nama folder tempat kemana file diupload */
	    // $file->move($tujuan_upload,$nama_file1);

        $admins -> update([
            'file' => $file,
            'namaMenu' => $request->namaMenu,
            'kategoriMenu' => $request->kategoriMenu,
            'deskripsiMenu' => $request->deskripsiMenu,
            'hargaMenu' => $request->hargaMenu,
        ]);

        return redirect(route('adminDashboard'));
    }

    public function delete($id){
        Admin::destroy($id);
        return redirect(route('adminDashboard'));
    }

    public function cari(Request $request){
        $cari = $request->cari;

        $admins = DB::table('admins')
        ->where('namaMenu','like',"%".$cari."%")->paginate();

    return view('page',['admins' => $admins]);
    }
}
