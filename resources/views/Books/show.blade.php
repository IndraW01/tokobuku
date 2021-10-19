@extends('Layouts.main')

@section('title', 'Detail Buku')

@section('container')

<div class="row">
    <div class="col-md-4">
        <img src="https://source.unsplash.com/270x410?{{ $book->category->nama }}" alt="{{ $book->category->nama }}">
    </div>
    <div class="col-md-6">
        <h3 class="text-dark mb-5">{{ $book->judul }}</h3>
        <h5 class="text-danger fw-bolder">Rp. {{ $book->harga }}</h5>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <p>Judul</p>
            </div>
            <div class="col-md-9">
                <p>{{ $book->judul }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Penulis</p>
            </div>
            <div class="col-md-9">
                <p>{{ $book->penulis }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Penerbit</p>
            </div>
            <div class="col-md-9">
                <p>{{ $book->penerbit }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Kategori</p>
            </div>
            <div class="col-md-9">
                <p>{{ $book->category->nama }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Stok</p>
            </div>
            <div class="col-md-9">
                <p>{{ $book->stok }}</p>
            </div>
        </div>
        <form action="{{ route('chart.store') }}" method="POST">
            @csrf
                <input type="hidden" name="id" value="{{ $book->id }}">
            @if ($book->stok > 0)
                <button type="submit" class="btn btn-primary px-5" onclick="return confirm('Tambahkan Ke Chart ?');">BELI</button>
            @else
                <button type="submit" class="btn btn-primary px-5 disabled" onclick="return confirm('Tambahkan Ke Chart ?');">BELI</button>
                <p><small>stok habis</small></p>
            @endif
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h3 class="my-5">Descreption</h3>
        {!! $book->sinopsis !!}
    </div>
</div>

@endsection
