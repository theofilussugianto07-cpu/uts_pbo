@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
    <h2>Edit Barang</h2>
    <form action="{{ route('barang.update', $barang['kode']) }}" method="POST">
        @csrf
        @method('PUT')
        @include('barang._form')
    </form>
@endsection