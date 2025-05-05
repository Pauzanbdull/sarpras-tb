<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100 m-0 p-0">

    <div class="container animate__animated animate__fadeIn animate__delay-0.5s">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 animate__animated animate__fadeIn animate__delay-0.5s">Tambah Barang</h2>
        
        <form action="{{ route('barang.store') }}" method="POST" class="animate__animated animate__fadeIn animate__delay-0.5s">
            @csrf
            <div class="form-group mb-4">
                <label for="name" class="block font-semibold text-gray-700">Nama Barang</label>
                <input type="text" id="name" name="name" required placeholder="Masukkan nama barang" class="w-full p-3 rounded-md border border-gray-300 mt-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="form-group mb-4">
                <label for="category" class="block font-semibold text-gray-700">Kategori</label>
                <select id="category" name="category" required class="w-full p-3 rounded-md border border-gray-300 mt-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="Elektronik">Elektronik</option>
                    <option value="Perabotan">Perabotan</option>
                    <option value="Furnitur">Furnitur</option>
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="quantity" class="block font-semibold text-gray-700">Jumlah</label>
                <input type="number" id="quantity" name="quantity" required placeholder="Masukkan jumlah barang" class="w-full p-3 rounded-md border border-gray-300 mt-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="form-group mb-4">
                <label for="location" class="block font-semibold text-gray-700">Lokasi</label>
                <input type="text" id="location" name="location" required placeholder="Masukkan lokasi barang" class="w-full p-3 rounded-md border border-gray-300 mt-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <button type="submit" class="w-full bg-green-500 text-white py-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">Simpan Barang</button>
        </form>

        <a href="{{ route('barang.index') }}" class="block mt-6 text-center text-blue-600 font-semibold hover:underline animate__animated animate__fadeIn animate__delay-0.5s">← Kembali ke Daftar Barang</a>
    </div>

    <style>
        /* Container Animation */
        .container {
            max-width: 800px;
            margin: 2rem auto;
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        /* Form Inputs Animation */
        .form-group input, .form-group select {
            transition: all 0.3s ease;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #28a745;
            box-shadow: 0 0 10px rgba(40, 167, 69, 0.5);
        }
    </style>
</body>

</html>
