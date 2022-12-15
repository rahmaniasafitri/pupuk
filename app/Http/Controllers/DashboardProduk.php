<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardProduk extends Controller
{

    public function index(){

        return view('admin.produk',[
            "produk" => Produk::all(),
        ]);
    }

    public function postHandler(Request $request){
        if($request->submit=="store"){
            $res = $this->store($request);
            return redirect('/admin/produk')->with($res['status'],$res['message']);
        }
        if($request->submit=="update"){
            $res = $this->update($request);
            return redirect('/admin/produk')->with($res['status'],$res['message']);
        }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return redirect('/admin/produk')->with($res['status'],$res['message']);
        }else{
            return redirect('/admin/produk')->with("info","Submit not found");
        }
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'nama'=>'required',
            'foto' => 'image|file|max:1024',
        ]);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('assets/img/portfolio'), $validatedData['foto']);
            Produk::create($validatedData);
            return ['status'=>'success','message'=>'Produk berhasil ditambahkan']; 
        }else{
            return ['status'=>'error','message'=>'Produk gagal ditambahkan'];
        }
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id'=>'required|numeric',
            'nama'=>'required',
            'foto' => 'image|file|max:1024',
        ]);
        
        //Check if product is found
        if(Produk::find($request->id)){
            // Update foto
            $validatedData['foto'] = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('assets/img/produk'), $validatedData['foto']);
            // Update produk
            Produk::find($request->id)->update($validatedData);   
            return ['status'=>'success','message'=>'Produk berhasil diedit']; 
        }else{
            return ['status'=>'error','message'=>'Produk tidak ditemukan'];
        }
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        //Check if the career is found
        if(Produk::find($request->id)){
            Produk::destroy($request->id);    // Delete career
            return ['status'=>'success','message'=>'Produk berhasil dihapus'];
        }else{
            return ['status'=>'error','message'=>'Produk tidak ditemukan'];
        }
    }
}
