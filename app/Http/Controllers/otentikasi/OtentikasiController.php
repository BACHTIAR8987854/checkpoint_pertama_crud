<?php

namespace App\Http\Controllers\otentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtentikasiController extends Controller
{
    public function login(){
        return view('otentikasi.login');
    }
}
