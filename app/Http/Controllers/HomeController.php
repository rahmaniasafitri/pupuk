<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tabel1;
use App\Models\tabel2;
use App\Models\tabel3;
use App\Models\tabel4;
use App\Models\tabel5;

class HomeController extends Controller
{
    //
    public function index () {

// $kandungan = tabel1::all();
        // $kegunaan = tabel2::all();
        // $petunjuk = tabel3::all();
        // $tentang = tabel4::all();

        // $data = array(
        //     'kandungan' => tabel1::all(),
        //     'kegunaan' => tabel2::all(),
        //     'petunjuk' => tabel3::all(),
        //     'tentang' => tabel4::all()
        // );

        // dd($data);

        // return view('index', $data);
//limit

        return view('index',[
            'kandungan' => tabel1::all(),
            'kegunaan' => tabel2::all(),
            'petunjuk' => tabel3::all(),
            'tentang' => tabel4::all(),
            'keunggulan' => tabel5::all(),
        ]);
    }
}
