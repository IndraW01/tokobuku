<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index() {
        return view('Charts.index', [
            'charts' => Chart::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function store(Request $request) {

        $book = Book::where('id', $request->id)->first();
        $sisaStok = $book->stok - 1;
        Book::where('id', $request->id)->update(['stok' => $sisaStok]);

        if($chart = Chart::where('book_id', $request->id)->first()) {
            $chartJumlah = $chart->jumlah + 1;
            $chartTotal = $chart->total + $book->harga;

            Chart::where('book_id', $request->id)->update(['jumlah' => $chartJumlah, 'total' => $chartTotal]);

            return redirect()->route('chart.index');
        } else {
            chart::create([
                'user_id' => auth()->user()->id,
                'book_id' => $request->id,
                'jumlah' => 1,
                'total' => $book->harga
            ]);

            return redirect()->route('chart.index');
        }
    }
}
