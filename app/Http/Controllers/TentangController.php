<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tabel4;

class TentangController extends Controller
{
    //
    public function index () {
        $data = tabel4::all(); // ->first() ->get()

    $data = array('datanya' => $data);

       // return $data;

    return view('tentang.index', $data);
    }
}
