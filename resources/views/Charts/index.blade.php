{{-- @dd($charts) --}}
@extends('Layouts.main')

@section('container')

<h3>Keranjang Belanja</h3>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">item</th>
        <th scope="col">jumlah</th>
        <th scope="col">harga</th>
        <th scope="col">total</th>
        <th scope="col">aksi</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($charts as $chart)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
                <p>{{ $chart->book->judul }}</p>
                <p><small>Penulis: {{ $chart->book->penerbit }} ({{ $chart->book->penerbit }})</small></p>
            </td>
            <td>{{ $chart->jumlah }}</td>
            <td>{{ $chart->book->harga }}</td>
            <td>{{ $chart->total }}</td>
            <td>
                <a href="" class="badge rounded-pill bg-warning text-white"><i class="bi bi-pencil-square fs-5"></i></a>
                <a href="" class="badge rounded-pill bg-danger text-white"><i class="bi bi-trash fs-5"></i></a>
            </td>
        </tr>
        @empty
        <tr>
            <th colspan="6" class="text-center">Anda Belum memesan Buku</th>
        </tr>
        @endforelse
    </tbody>
  </table>

@endsection
