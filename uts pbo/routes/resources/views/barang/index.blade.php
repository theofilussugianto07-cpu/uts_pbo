@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
    <h2>Daftar Barang</h2>
    <p><a href="{{ route('barang.create') }}" class="btn btn-primary">+ Tambah Barang</a></p>

    @if (count($barang) > 0)
        <table>
            <thead>
                <tr>
                    <th>Kode</th><th>Nama Barang</th><th>Kategori</th>
                    <th>Lokasi</th><th>Jumlah</th><th>Kondisi</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    <tr>
                        <td>{{ $item['kode'] }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['kategori'] }}</td>
                        <td>{{ $item['lokasi'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>{{ $item['kondisi'] }}</td>
                        <td>
                            <a href="{{ route('barang.show', $item['kode']) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('barang.edit', $item['kode']) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('barang.destroy', $item['kode']) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus barang {{ $item['nama'] }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Data barang belum tersedia. Silakan tambahkan data terlebih dahulu.</p>
    @endif
@endsection