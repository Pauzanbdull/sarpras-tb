@extends('layouts.app')

@section('content')
    <div class="bg-blue-700 text-white p-4 flex justify-between items-center animate__animated animate__fadeIn">
        <div class="text-lg">Pendataan Kategori Barang</div>
        <div><a href="{{ route('dashboard') }}" class="text-white font-bold hover:underline">← Kembali ke Dashboard</a></div>
    </div>

    <div class="max-w-4xl mx-auto mt-8 bg-white p-8 rounded-lg shadow-md animate__animated animate__zoomIn">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold animate__animated animate__bounceIn">Daftar Kategori Barang</h2>
            <a href="{{ route('kategori.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded animate__animated animate__popIn">+ Tambah Kategori</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 animate__animated animate__fadeIn">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto animate__animated animate__fadeIn">
            <thead>
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Kategori</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $i => $k)
                    <tr class="animate__animated animate__slideInUp">
                        <td class="border px-4 py-2">{{ $i + 1 }}</td>
                        <td class="border px-4 py-2">{{ $k->nama_kategori }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('kategori.edit', $k->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-2 px-4 rounded animate__animated animate__popIn">Edit</a>
                            <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded animate__animated animate__popIn" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border px-4 py-2">Belum ada data kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>  
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>
@endsection
