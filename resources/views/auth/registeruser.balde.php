<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register User</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Ganti sesuai kebutuhan --}}
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Registrasi Pengguna</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="w-full border rounded px-3 py-2" required value="{{ old('name') }}">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full border rounded px-3 py-2" required value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" id="password" name="password" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Daftar</button>
        </form>

        <p class="mt-4 text-center text-sm">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login di sini</a></p>
    </div>

</body>
</html>
