<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class Kategori extends Controller
{
    public function index()
    {
        $kategori = KategoriBarang::all(); // ambil semua data
        return view('kategori.index', compact('kategori')); // kirim ke view
    }
}
