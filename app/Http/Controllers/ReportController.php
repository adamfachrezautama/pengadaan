<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Category;

class ReportController extends Controller
{

    public function index(Request $request){
        $categories = Category::all();

        $query = Transaction::with(['item.category', 'user'])->orderBy('tanggal', 'desc');

        // Filter kategori
        if ($request->filled('category_id')) {
            $query->whereHas('item', function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }

        // Filter tipe
        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        // Filter tanggal
        if ($request->filled('from') && $request->filled('to')) {
            $query->whereBetween('tanggal', [$request->from, $request->to]);
        }

        $transactions = $query->paginate(15);

        return view('report.index', compact('transactions', 'categories'));
    }

}
