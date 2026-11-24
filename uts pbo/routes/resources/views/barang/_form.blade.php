<label for="kode">Kode</label>
<input type="text" id="kode" name="kode" value="{{ old('kode', $barang['kode'] ?? '') }}"
       {{ isset($barang) ? 'readonly' : '' }}>
@error('kode') <div class="error-text">{{ $message }}</div> @enderror

<label for="nama">Nama Barang</label>
<input type="text" id="nama" name="nama" value="{{ old('nama', $barang['nama'] ?? '') }}">
@error('nama') <div class="error-text">{{ $message }}</div> @enderror

<label for="kategori">Kategori</label>
<input type="text" id="kategori" name="kategori" value="{{ old('kategori', $barang['kategori'] ?? '') }}">
@error('kategori') <div class="error-text">{{ $message }}</div> @enderror

<label for="lokasi">Lokasi</label>
<input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $barang['lokasi'] ?? '') }}">
@error('lokasi') <div class="error-text">{{ $message }}</div> @enderror

<label for="jumlah">Jumlah</label>
<input type="number" id="jumlah" name="jumlah" min="0" value="{{ old('jumlah', $barang['jumlah'] ?? '') }}">
@error('jumlah') <div class="error-text">{{ $message }}</div> @enderror

<label for="kondisi">Kondisi</label>
<select id="kondisi" name="kondisi">
    <option value="">-- Pilih Kondisi --</option>
    @foreach ($kondisi as $k)
        <option value="{{ $k }}" {{ old('kondisi', $barang['kondisi'] ?? '') === $k ? 'selected' : '' }}>{{ $k }}</option>
    @endforeach
</select>
@error('kondisi') <div class="error-text">{{ $message }}</div> @enderror

<p style="margin-top:20px">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
</p>