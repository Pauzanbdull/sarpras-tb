<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    /**
     * Menampilkan semua data peminjaman.
     */
   // PeminjamanController.php

public function index()
{
    // Ambil semua data peminjaman
    $peminjamans = Peminjaman::all();

    // Kirim data ke view
    return view('peminjaman.index', compact('peminjamans'));
}


    /**
     * Tampilkan form untuk tambah data peminjaman.
     */
    public function create()
    {
        // Ambil semua barang dari database
        $barangList = \App\Models\Barang::all();
    
        return view('peminjaman.create', compact('barangList'));
    }
    


    /**
     * Simpan data peminjaman baru.
     */
    public function store(Request $request)
{
    $request->validate([
        'barang_id' => 'required|exists:barang,id', // pastikan barang_id ada di tabel barang
        'jumlah' => 'required|integer|min:1',
    ]);

    // Simpan peminjaman
    \App\Models\Peminjaman::create([
        'barang_id' => $request->barang_id,
        'jumlah' => $request->jumlah,
    ]);

    return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil disimpan.');
}



    /**
     * Tampilkan detail satu data peminjaman.
     */
    public function show(Peminjaman $peminjaman)
    {
        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Tampilkan form edit data peminjaman.
     */
    public function edit(Peminjaman $peminjaman)
    {
        return view('peminjaman.edit', compact('peminjaman'));
    }

    /**
     * Update data peminjaman.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    /**
     * Hapus data peminjaman.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
