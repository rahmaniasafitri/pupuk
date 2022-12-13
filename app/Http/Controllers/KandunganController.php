<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tabel1;

class KandunganController extends Controller
{
    //
    public function index () {
        $data = tabel1::all(); // ->first() ->get()

    $data = array('datanya' => $data);

        //return $data;

        return view('kandungan.index', $data);
    }
}
