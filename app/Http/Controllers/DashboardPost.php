<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Kandungan;
use App\Models\Kegunaan;
use App\Models\Petunjuk;
use Illuminate\Http\Request;

class DashboardPost extends Controller
{

    public function index(){

        return view('admin.post',[
            "kandungan" => Kandungan::all(),
            "kegunaan" => Kegunaan::all(),
            "petunjuk" => Petunjuk::all(),
        ]);
    }

    public function postHandler(Request $request){
        if($request->submit=="store"){
            $res = $this->store($request);
            return redirect('/admin/post')->with($res['status'],$res['message']);
        }
        if($request->submit=="update"){
            $res = $this->update($request);
            return redirect('/admin/post')->with($res['status'],$res['message']);
        }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return redirect('/admin/post')->with($res['status'],$res['message']);
        }else{
            return redirect('/admin/kandungan')->with("info","Submit not found");
        }
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'value'=>'required',
            'tipe' => 'required',
        ]);

        if($request->tipe=="k"){
            Kandungan::create($validatedData);
            return ['status'=>'success','message'=>'Kandungan berhasil ditambahkan']; 
        }
        if($request->tipe=="m"){
            Kegunaan::create($validatedData);
            return ['status'=>'success','message'=>'Kegunaan berhasil ditambahkan']; 
        }
        if($request->tipe=="p"){
            Petunjuk::create($validatedData);
            return ['status'=>'success','message'=>'Petunjuk berhasil ditambahkan']; 
        }else{
            return ['status'=>'error','message'=>'Post gagal ditambahkan'];
        }
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id'=>'required|numeric',
            'value'=>'required',
            'tipe'=>'required',
        ]);
        
        if($request->tipe=="k"){
            if(Kandungan::find($request->id)){
                Kandungan::find($request->id)->update($validatedData);   
                return ['status'=>'success','message'=>'Post berhasil diedit']; 
            }else{
                return ['status'=>'error','message'=>'Post tidak ditemukan'];
            }; 
        }
        if($request->tipe=="m"){
            if(Kegunaan::find($request->id)){
                Kegunaan::find($request->id)->update($validatedData);   
                return ['status'=>'success','message'=>'Post berhasil diedit']; 
            }else{
                return ['status'=>'error','message'=>'Post tidak ditemukan'];
            };  
        }
        if($request->tipe=="p"){
            if(Petunjuk::find($request->id)){
                Petunjuk::find($request->id)->update($validatedData);   
                return ['status'=>'success','message'=>'Post berhasil diedit']; 
            }else{
                return ['status'=>'error','message'=>'Post tidak ditemukan'];
            }; 
        }
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
            'tipe'=>'required',
        ]);

        if($request->tipe=="k"){
            if(Kandungan::find($request->id)){
                Kandungan::destroy($request->id);
                return ['status'=>'success','message'=>'Post berhasil dihapus'];
            }else{
                return ['status'=>'error','message'=>'Post tidak ditemukan'];
            }
        }
        if($request->tipe=="m"){
            if(Kegunaan::find($request->id)){
                Kegunaan::destroy($request->id);
                return ['status'=>'success','message'=>'Post berhasil dihapus'];
            }else{
                return ['status'=>'error','message'=>'Post tidak ditemukan'];
            }
        }
        if($request->tipe=="p"){
            if(Petunjuk::find($request->id)){
                Petunjuk::destroy($request->id);
                return ['status'=>'success','message'=>'Post berhasil dihapus'];
            }else{
                return ['status'=>'error','message'=>'Post tidak ditemukan'];
            }
        }
    }
}
