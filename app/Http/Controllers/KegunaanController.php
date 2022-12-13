<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tabel2;

class KegunaanController extends Controller
{
    //
    public function index () {
        $data = tabel2::all(); // ->first() ->get()

    $data = array('datanya' => $data);

       // return $data;

    return view('kegunaan.index', $data);
    }
}
