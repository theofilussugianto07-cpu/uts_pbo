<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    private const KEY = 'barang';
    private const KONDISI = ['Baik', 'Rusak Ringan', 'Rusak Berat'];

    // Ambil seluruh data dari session
    private function all(): array
    {
        return session(self::KEY, []);
    }

    private function simpan(array $items): void
    {
        session([self::KEY => $items]);
    }

    private function aturan(): array
    {
        return [
            'nama'     => 'required|string|max:100',
            'kategori' => 'required|string|max:50',
            'lokasi'   => 'required|string|max:100',
            'jumlah'   => 'required|integer|min:0',
            'kondisi'  => 'required|in:' . implode(',', self::KONDISI),
        ];
    }

    private function tidakDitemukan()
    {
        return redirect()->route('barang.index')
            ->with('error', 'Data barang dengan kode tersebut tidak ditemukan.');
    }

    // Menampilkan daftar barang dari session
    public function index()
    {
        $barang = $this->all();
        return view('barang.index', compact('barang'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('barang.create', ['kondisi' => self::KONDISI]);
    }

    // Menyimpan data baru ke session
    public function store(Request $request)
    {
        $data = $request->validate($this->aturan() + [
            'kode' => ['required', 'regex:/^[A-Za-z0-9_-]+$/', 'max:20'],
        ]);

        $items = $this->all();

        if (isset($items[$data['kode']])) {
            return back()->withInput()
                ->withErrors(['kode' => 'Kode barang sudah digunakan.']);
        }

        $data['jumlah'] = (int) $data['jumlah'];
        $items[$data['kode']] = $data;
        $this->simpan($items);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan detail satu barang
    public function show($kode)
    {
        $items = $this->all();
        if (!isset($items[$kode])) {
            return $this->tidakDitemukan();
        }
        return view('barang.show', ['barang' => $items[$kode]]);
    }

    // Menampilkan form edit
    public function edit($kode)
    {
        $items = $this->all();
        if (!isset($items[$kode])) {
            return $this->tidakDitemukan();
        }
        return view('barang.edit', [
            'barang'  => $items[$kode],
            'kondisi' => self::KONDISI,
        ]);
    }

    // Memperbarui data berdasarkan kode
    public function update(Request $request, $kode)
    {
        $items = $this->all();
        if (!isset($items[$kode])) {
            return $this->tidakDitemukan();
        }

        $data = $request->validate($this->aturan());
        $data['kode'] = $kode; // kode tidak dapat diubah
        $data['jumlah'] = (int) $data['jumlah'];
        $items[$kode] = $data;
        $this->simpan($items);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    // Menghapus data berdasarkan kode
    public function destroy($kode)
    {
        $items = $this->all();
        if (!isset($items[$kode])) {
            return $this->tidakDitemukan();
        }

        unset($items[$kode]);
        $this->simpan($items);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}