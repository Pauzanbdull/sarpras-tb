<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          animation: {
            fadeIn: 'fadeIn 1s ease-out',
            slideIn: 'slideIn 0.8s ease-out',
            bounceIn: 'bounceIn 1s ease-in-out',
            zoomIn: 'zoomIn 0.8s ease-out',
            slideUp: 'slideUp 1s ease-out',
            popIn: 'popIn 0.6s ease-out',
            rotateIn: 'rotateIn 0.8s ease-out',
            flipIn: 'flipIn 0.8s ease-out',
            dropIn: 'dropIn 0.9s ease-out',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: 0 },
              '100%': { opacity: 1 },
            },
            slideIn: {
              '0%': { transform: 'translateX(-100%)' },
              '100%': { transform: 'translateX(0)' },
            },
            bounceIn: {
              '0%': { transform: 'scale(0)' },
              '60%': { transform: 'scale(1.1)' },
              '100%': { transform: 'scale(1)' },
            },
            zoomIn: {
              '0%': { transform: 'scale(0.8)', opacity: 0 },
              '100%': { transform: 'scale(1)', opacity: 1 },
            },
            slideUp: {
              '0%': { transform: 'translateY(50px)', opacity: 0 },
              '100%': { transform: 'translateY(0)', opacity: 1 },
            },
            popIn: {
              '0%': { transform: 'scale(0)', opacity: 0 },
              '50%': { transform: 'scale(1.1)', opacity: 1 },
              '100%': { transform: 'scale(1)', opacity: 1 },
            },
            rotateIn: {
              '0%': { transform: 'rotate(-200deg)', opacity: 0 },
              '100%': { transform: 'rotate(0)', opacity: 1 },
            },
            flipIn: {
              '0%': { transform: 'rotateY(90deg)', opacity: 0 },
              '100%': { transform: 'rotateY(0)', opacity: 1 },
            },
            dropIn: {
              '0%': { transform: 'translateY(-200px)', opacity: 0 },
              '100%': { transform: 'translateY(0)', opacity: 1 },
            },
          }
        }
      }
    }
  </script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f7f7f7;
    }

    .sidebar {
      background: #1e2a47;
      box-shadow: 4px 0 12px rgba(0, 0, 0, 0.15);
    }

    .sidebar a {
      transition: all 0.3s ease;
    }

    .sidebar a:hover {
      background: #3b4d80;
      color: #fff;
      transform: translateX(5px) scale(1.05) rotate(-1deg);
    }

    .sidebar .active {
      background: #3b4d80;
      color: #fff;
    }

    .sidebar .active:hover {
      background: #2c3b61;
    }

    .navbar {
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .navbar .logout-btn {
      background-color: #ff4d4d;
      padding: 8px 20px;
      border-radius: 20px;
      color: white;
      font-size: 14px;
      transition: background 0.3s ease;
    }

    .navbar .logout-btn:hover {
      background-color: #e60000;
    }

    .main-content {
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 40px;
      margin-top: 20px;
    }

    .footer {
      padding: 20px 0;
      font-size: 14px;
      color: #717171;
    }

    .footer p {
      font-size: 12px;
    }
  </style>
</head>

<body>

 <!-- SIDEBAR -->
<aside class="sidebar w-64 min-h-screen p-6 fixed left-0 top-0 animate-slideIn">
  <div class="flex flex-col space-y-3">
    <a href="{{ route('pengguna.index') }}" class="text-white flex items-center gap-3 text-md py-2 px-4 rounded-md transition hover:pl-6">
      <i class="fas fa-users"></i> Pengguna
    </a>
    <a href="{{ route('kategori.index') }}" class="text-white flex items-center gap-3 text-md py-2 px-4 rounded-md transition hover:pl-6">
      <i class="fas fa-tags"></i> Kategori Barang
    </a>
    <a href="{{ route('barang.index') }}" class="text-white flex items-center gap-3 text-md py-2 px-4 rounded-md transition hover:pl-6">
      <i class="fas fa-boxes"></i> Data Barang
    </a>
    <a href="{{ route('peminjaman.index') }}" class="text-white flex items-center gap-3 text-md py-2 px-4 rounded-md transition hover:pl-6">
      <i class="fas fa-hand-holding"></i> Peminjaman
    </a>
    <a href="#" class="text-white flex items-center gap-3 text-md py-2 px-4 rounded-md transition hover:pl-6">
      <i class="fas fa-undo"></i> Pengembalian
    </a>
    <a href="#" class="text-white flex items-center gap-3 text-md py-2 px-4 rounded-md transition hover:pl-6">
      <i class="fas fa-warehouse"></i> Stok Barang
    </a>
    <a href="#" class="text-white flex items-center gap-3 text-md py-2 px-4 rounded-md transition hover:pl-6">
      <i class="fas fa-file-alt"></i> Laporan Peminjaman
    </a>
    <a href="#" class="text-white flex items-center gap-3 text-md py-2 px-4 rounded-md transition hover:pl-6">
      <i class="fas fa-file-upload"></i> Laporan Pengembalian
    </a>
  </div>
</aside>


  <!-- MAIN -->
  <div class="ml-64 min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <header class="navbar bg-blue-700 text-white py-4 px-6 shadow-md relative animate-slideUp">
      <div class="max-w-screen-xl mx-auto flex justify-between items-center">
        <h1 class="text-xl font-semibold tracking-wide">Dashboard </h1>
        <form action="{{ route('logout') }}" method="POST" class="animate-popIn">
          @csrf
          <button type="submit" class="logout-btn">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </button>
        </form>
      </div>
    </header>

    <!-- CONTENT -->
    <div class="main-content animate-bounceIn">
      <div class="text-center">
        <img src="logotb.jpg" alt="Logo SARPRAS" class="w-64 mx-auto mb-6 animate-rotateIn">
        <h2 class="text-4xl font-bold text-gray-800 mb-4 animate-flipIn">
          Selamat Datang di <span class="text-blue-700">SARPRAS</span>!
        </h2>
        <p class="text-lg text-gray-600">Kelola sarana & prasarana sekolah dengan mudah, cepat, dan efisien.</p>
      </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer text-center mt-auto py-4 bg-gray-100 border-t animate-dropIn">
      <p>© 2025 <strong>SARPRAS</strong>. All rights reserved.</p>
    </footer>

  </div>

</body>

</html>
