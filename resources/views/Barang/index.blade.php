<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100 m-0 p-0">

    <!-- Navbar dengan warna yang sama seperti di dashboard -->
    <div class="bg-blue-700 text-white py-4 px-8 flex justify-between items-center shadow-md">
        <div class="text-lg font-semibold">Pendataan Barang</div>
        <div><a href="{{ route('dashboard') }}" class="font-bold text-white no-underline hover:underline">← Kembali ke Dashboard</a></div>
    </div>

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto mt-8 bg-white p-8 rounded-xl shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl text-gray-800 font-semibold">Daftar Barang</h2>
            <a href="{{ route('barang.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm no-underline">+ Tambah Barang</a>
        </div>

        @if (session('success'))
            <div class="text-green-600 mb-4 p-2 bg-green-100 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <table class="w-full border-collapse mt-4">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-3 px-4 border-b">NO</th>
                    <th class="py-3 px-4 border-b">Nama Barang</th>
                    <th class="py-3 px-4 border-b">Kategori</th>
                    <th class="py-3 px-4 border-b">Stock</th>
                    <th class="py-3 px-4 border-b">Lokasi</th>
                    <th class="py-3 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $i => $barang)
                    <tr class="animate__animated animate__fadeInUp animate__delay-{{ ($i + 1) * 0.2 }}s">
                        <td class="border px-4 py-2">{{ $i + 1 }}</td>
                        <td class="border px-4 py-2">{{ $barang->name }}</td>
                        <td class="border px-4 py-2">{{ $barang->category }}</td>
                        <td class="border px-4 py-2">{{ $barang->quantity }}</td>
                        <td class="border px-4 py-2">{{ $barang->location }}</td>
                        <td class="py-3 px-4 border-b space-x-2">
                            <a href="{{ route('barang.edit', $barang->id) }}">
                                <button class="bg-yellow-400 text-black px-3 py-1 rounded-md text-sm">Edit</button>
                            </a>
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus barang ini?')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 text-center text-gray-500">Belum ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <style>
        /* Optional: Adding smooth transition effects to table rows with movement */
        tbody tr {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

</body>

</html>
