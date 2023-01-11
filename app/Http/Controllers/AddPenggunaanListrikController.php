<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddPenggunaanListrikController extends Controller
{
    public function index()
    {
        return view('add-penggunaan-listrik.index');
    }
}
