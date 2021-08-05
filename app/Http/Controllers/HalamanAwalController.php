<?php

namespace App\Http\Controllers;
use App\Barang;
use Illuminate\Http\Request;

class HalamanAwalController extends Controller
{
    public function index()
    {
        $barangs = Barang::paginate(20);
        return view('/utama', compact('barangs'));
    }
}
