<?php

namespace App\Http\Controllers;

// use App\Models\Kandungan;
// use App\Models\Manfaat;
// use App\Models\Petunjuk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function feedback(){
        return view('admin.feedback_list');
    }

    public function post(){
        return view('admin.post_list');
    }

    public function setting(){
        return view('admin.setting');
    }
}
