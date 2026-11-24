@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
    <h2>Tambah Barang</h2>
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        @include('barang._form')
    </form>
@endsection