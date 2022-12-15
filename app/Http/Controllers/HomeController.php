<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandungan;
use App\Models\Kegunaan;
use App\Models\Keunggulan;
use App\Models\Petunjuk;
use App\Models\Produk;
use App\Models\Tentang;

class HomeController extends Controller
{
    //
    public function index () {

        return view('index',[
            'kandungan' => Kandungan::all(),
            'kegunaan' => Kegunaan::all(),
            'keunggulan' => Keunggulan::all(),
            'petunjuk' => Keunggulan::all(),
            'produk' => Produk::all(),
            'tentang' => Petunjuk::all(),
        ]);
    }

    public function kandungan () {
        $data = Kandungan::all(); // ->first() ->get()
        $data = array('datanya' => $data);
        //return $data;
        return view('home.kandungan', $data);
    }

    public function kegunaan () {
        $data = Kegunaan::all(); // ->first() ->get()
        $data = array('datanya' => $data);
        // return $data;
        return view('home.kegunaan', $data);
    }

    public function keunggulan () {
        $data = Keunggulan::all(); // ->first() ->get()
        $data = array('datanya' => $data);
        return view('home.keunggulan', $data);
    }

    public function petunjuk () {
        $data = Petunjuk::all(); // ->first() ->get()
        $data = array('datanya' => $data);
        return view('home.petunjuk', $data);
    }

    public function tentang () {
        $data = Tentang::all(); // ->first() ->get()
        $data = array('datanya' => $data);
        // return $data;
        return view('home.tentang', $data);
    }
}
