<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    // Tampilkan semua data barang
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    // Tampilkan form tambah barang
    public function create()
    {
        return view('barang.create');
    }
    
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string',
        'quantity' => 'required|integer',
        'location' => 'required|string',
    ]);

    Barang::create($validated);

    return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
}

    
    
    // Tampilkan form edit
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'location' => 'required|string|max:255',
        ]);
    
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());
    
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }
    
    // Hapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}

