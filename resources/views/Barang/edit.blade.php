<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #007bff;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .left {
            font-size: 1.2rem;
        }

        .container {
            max-width: 600px;
            margin: 2rem auto;
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 1.5rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #218838;
        }

        .back-btn {
            background-color: #007bff;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="left">Edit Barang</div>
    </div>

    <div class="container">
        <h2>Edit Barang</h2>

        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Barang</label>
                <input type="text" id="name" name="name" value="{{ $barang->name }}" required>
            </div>

            <div class="form-group">
                <label for="category">Kategori</label>
                <select id="category" name="category" required>
                    <option value="Elektronik" {{ $barang->category == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                    <option value="Perabotan" {{ $barang->category == 'Perabotan' ? 'selected' : '' }}>Perabotan</option>
                    <option value="Furnitur" {{ $barang->category == 'Furnitur' ? 'selected' : '' }}>Furnitur</option>
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Jumlah</label>
                <input type="number" id="quantity" name="quantity" value="{{ $barang->quantity }}" required>
            </div>

            <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="text" id="location" name="location" value="{{ $barang->location }}" required>
            </div>

            <button type="submit" class="btn">Simpan Perubahan</button>
        </form>

        <a href="{{ route('barang.index') }}" class="back-btn">← Kembali ke Daftar Barang</a>
    </div>
</body>
</html>
