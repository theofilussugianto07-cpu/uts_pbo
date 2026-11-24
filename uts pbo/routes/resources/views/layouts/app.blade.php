<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Inventaris Barang') - UTS PBO</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f8; color: #222; }
        header { background: #1f4e79; color: #fff; padding: 16px 24px; }
        header h1 { margin: 0; font-size: 20px; }
        nav { background: #2e75b6; padding: 8px 24px; }
        nav a { color: #fff; text-decoration: none; margin-right: 16px; }
        main { max-width: 900px; margin: 24px auto; background: #fff; padding: 24px; border-radius: 6px; }
        footer { text-align: center; padding: 16px; color: #666; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #e8eef5; }
        .btn { display: inline-block; padding: 5px 10px; border: 0; border-radius: 4px; color: #fff; text-decoration: none; cursor: pointer; font-size: 13px; }
        .btn-primary { background: #2e75b6; } .btn-info { background: #17a2b8; }
        .btn-warning { background: #e0a800; } .btn-danger { background: #c82333; } .btn-secondary { background: #6c757d; }
        .alert { padding: 10px 14px; border-radius: 4px; margin-bottom: 16px; }
        .alert-success { background: #d4edda; color: #155724; }
        .alert-error { background: #f8d7da; color: #721c24; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        .error-text { color: #c82333; font-size: 13px; }
        form.inline { display: inline; }
    </style>
</head>
<body>
    <header><h1>Sistem Inventaris Barang</h1></header>
    <nav>
        <a href="{{ route('barang.index') }}">Daftar Barang</a>
        <a href="{{ route('barang.create') }}">Tambah Barang</a>
    </nav>

    <main>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>

    <footer>UTS Pemrograman Berorientasi Objek - Universitas Catur Insan Cendekia T.A. 2026/2027</footer>
</body>
</html>