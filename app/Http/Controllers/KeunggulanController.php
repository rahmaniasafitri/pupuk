<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tabel3;

class KeunggulanController extends Controller
{
    //
    public function index () {
        $data = tabel3::all(); // ->first() ->get()

    $data = array('datanya' => $data);

    return view('keunggulan.index', $data);
    }
}
