{{-- @dd($books) --}}
@extends('Layouts.main')
@section('title', 'Daftar Buku')

@section('jumbutron')

<div class="jumbotron">
    <div class="container">
      <h1 class="display-4">Pilih Buku Anda</h1>
      <p class="lead">Untuk menambah wawasan Anda.</p>
    </div>
</div>

@endsection

@section('container')

<h1 class="text-center mb-5">Daftar Buku</h1>

<div class="row justify-content-center mb-5">
    <div class="col-md-6">
        <form action="{{ route('book.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search" id="search" value="{{ request('search') }}">
                <button class="btn btn-warning" type="submit" id="search">Search</button>
            </div>
        </form>
    </div>
</div>

<div class="row justify-content-beetwen mx-auto">
    @forelse ($books as $book)
    <div class="col-md-3 mb-3">
        <div class="card">
            <img src="https://source.unsplash.com/1600x900?{{ $book->category->nama }}" class="card-img-top" alt="{{ $book->category->nama }}">
            <div class="card-body">
              <p class="card-title fw-bolder"><a href="{{ route('book.show', ['book' => $book]) }}" class="text-black text-decoration-none">{{ $book->judul }}</a></p>
              <p class="author">{{ $book->penulis }}</p>
              <p class="card-text text-danger fw-bold">Rp. {{ $book->harga }}</p>
            </div>
        </div>
    </div>
    @empty
        <h3 class="text-center"></h3>
    @endforelse

    {{ $books->links() }}
</div>

@endsection
