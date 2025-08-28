<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
    $query = Transaction::with('item');

    // kalau ada search
    if ($request->filled('search')) {
        $query->whereHas('item', function ($q) use ($request) {
            $q->where('item_name', 'like', '%' . $request->search . '%');
        });
    }

    $transactions = $query->latest()->paginate(10);

    return view('transaction.index', compact('transactions'));
    }


      // Form tambah transaksi
    public function create()
    {
        $items = Item::all();
        return view('transaction.create', compact('items'));
    }


    public function store(Request $request)
{
    $request->validate([
        'item_id' => 'required|exists:items,id',
        'tipe' => 'required|in:masuk,keluar',
        'jumlah' => 'required|integer|min:1',
        'tanggal' => 'nullable|date', // 👉 validasi tanggal (boleh kosong)
    ]);

    $item = Item::findOrFail($request->item_id);

    if ($request->tipe == 'keluar' && $item->total_stock < $request->jumlah) {
        return back()->withErrors(['stok' => 'Stok tidak mencukupi']);
    }

    DB::transaction(function () use ($request, $item) {
        // Simpan transaksi
        Transaction::create([
            'item_id' => $item->id,
            'user_id' => auth()->id(),
            'tipe' => $request->tipe,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal ?? now()->toDateString(),
        ]);

        // Update stok
        if ($request->tipe == 'masuk') {
            $item->total_stock += $request->jumlah;
        } else {
            $item->total_stock -= $request->jumlah;
        }
        $item->save();
    });

    return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan');
}


}
