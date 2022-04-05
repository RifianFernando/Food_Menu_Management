<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\QuantityProduct;
use App\Models\redeemCodeToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function userPage(){
        $admins = Admin::all();
        $total = Admin::count();
        $user = Auth::user()->id;
        $quantity = QuantityProduct::where('users_id', $user)->get('products_id');
        for($i = 0; $i < count($quantity); $i++){
            $detail_product_user = $quantity[$i]->products_id;
            $cart[$i] = Admin::find($detail_product_user);
        }
        $makanan_quantity = QuantityProduct::where('users_id', $user)->get();
        for($i = 0; $i < count($makanan_quantity); $i++){
            $kuantitas[$i] = $makanan_quantity[$i]->quantity;
        }
        if(empty($kuantitas) || empty($cart)){
            return view('page', ['admins' => $admins,'total' => $total]); 
        };
        $Looping_cart = count($kuantitas);
        return view('page', ['admins' => $admins,'total' => $total, 'cart' => $cart, 'kuantitas' => $kuantitas, 'Looping_cart' => $Looping_cart]); 
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
        $total = Admin::count();
        $admins = DB::table('admins')
        ->where('namaMenu','like',"%".$cari."%")->paginate();
        $user = Auth::user()->id;
        $quantity = QuantityProduct::where('users_id', $user)->get('products_id');
        for($i = 0; $i < count($quantity); $i++){
            $detail_product_user = $quantity[$i]->products_id;
            $cart[$i] = Admin::find($detail_product_user);
        }
        $makanan_quantity = QuantityProduct::where('users_id', $user)->get();
        for($i = 0; $i < count($makanan_quantity); $i++){
            $kuantitas[$i] = $makanan_quantity[$i]->quantity;
        }  
        if(empty($kuantitas) || empty($cart)){
            return view('page', ['admins' => $admins,'total' => $total]); 
        };
        $Looping_cart = count($kuantitas);
        return view('page', ['admins' => $admins,'total' => $total, 'cart' => $cart, 'kuantitas' => $kuantitas, 'Looping_cart' => $Looping_cart]);
    }

    public function addToCart($id){
        $admins = Admin::all();
        $total = Admin::count();
        $user = Auth::user()->id;
        $id_barang  = Admin::find($id)->id;
        $quantity_table = QuantityProduct::where('users_id', $user)->where('products_id', $id_barang)->first();
        if($quantity_table == null){
            QuantityProduct::create([
                'users_id' => $user,
                'products_id' => $id_barang,
                'quantity' => 1
            ]);
        }else{
            $quantity_table->update([
                'quantity' => $quantity_table->quantity + 1
            ]); 
        }
        $quantity = QuantityProduct::where('users_id', $user)->get('products_id');
        for($i = 0; $i < count($quantity); $i++){
            $detail_product_user = $quantity[$i]->products_id;
            $cart[$i] = Admin::find($detail_product_user);
        }
        $makanan_quantity = QuantityProduct::where('users_id', $user)->get();
        for($i = 0; $i < count($makanan_quantity); $i++){
            $kuantitas[$i] = $makanan_quantity[$i]->quantity;
        }
        if(empty($kuantitas) || empty($cart)){
            return view('page', ['admins' => $admins,'total' => $total]); 
        };
        return redirect(route('userPage'));
    }

    public function Increment($id){
        $user_id = Auth::user()->id;
        $quantity_table = QuantityProduct::where('products_id', $id)->where('users_id', $user_id)->first();

        if($quantity_table->quantity == 1){
            QuantityProduct::destroy($quantity_table->id);
        }else{
            $quantity_table->update([
                'quantity' => $quantity_table->quantity - 1
            ]);
        }

        return redirect(route('userPage'));
    }

    public function PAGES(){
        return view('AddTokenPage');
    }

    public function ntah(Request $request){
        redeemCodeToken::create([
            'token' => $request->token,
            'discount' => $request->discount,
        ]);


        return redirect(route('adminDashboard'));
    }

    public function checkToken(Request $request){
        $token = $request->redeem;
        $redeemCodeToken = redeemCodeToken::where('token', $token)->first();
        if($redeemCodeToken == null){
            return redirect(route('userPage'))->withErrors(['error' => 'Token tidak ditemukan']);
        }else{
            $diskon = $redeemCodeToken->discount / 100;
            return redirect(route('userPage',  ['diskon' => $diskon]))->withErrors(['error' => 'Token berhasil ditukar']);
        }
    }
}

