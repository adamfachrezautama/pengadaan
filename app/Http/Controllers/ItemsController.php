<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Items\Store;
use App\Http\Requests\Admin\Items\Update;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemDetail;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    //

    public function index(){
        $items = Item::all();
        $items = Item::paginate(5);

        $query = request()->query('search');
        if($query){
            $items = Item::where('item_name', 'ILIKE', "%{$query}%")->paginate(5);
            $items->appends(['search' => $query]);
        }
        return view('layouts.items.index', compact('items'));
    }

    public function create(){
        $categories = Category::all();

        return view('layouts.items.create',compact('categories'));
    }


  public function store(Store $request)
{
    DB::beginTransaction();

    try {
        $item = Item::create($request->only([
            'item_name',
            'brand',
            'total_stock',
            'category_id',
        ]));

        $status = $item->total_stock > 0 ? 'available' : 'unavailable';

        foreach ($request->input('details') as $detail) {
            $item->itemDetails()->create([
                'serial_number' => $detail['serial_number'] ?? null,
                'description' => $detail['description'] ?? null,
                'status' => $status,
            ]);
        }

        DB::commit();

        return redirect()->route('items.index')
            ->with('success', 'Item dan detail berhasil ditambahkan.');

    } catch (\Throwable $e) {
        DB::rollBack();
        return back()->withErrors(['error' => 'Gagal menyimpan data: ' . $e->getMessage()])->withInput();
    }
}

    public function edit(Item $item){
         $categories = Category::all();

        return view('layouts.items.edit',compact('item','categories'));
    }


    public function update(Update $request, Item $item)
{
    // Validasi data item utama
    $item->update([
        'item_name' => $request->item_name,
        'brand' => $request->brand,
        'total_stock' => $request->total_stock,
        'category_id' => $request->category_id,

    ]);

    // Ambil semua ID detail yang di-submit
    $submittedDetailIds = collect($request->details)->pluck('id')->filter()->toArray();

    // Soft delete detail yang tidak ada di request
    $item->itemDetails()
        ->whereNotIn('id', $submittedDetailIds)
        ->delete();

    // Loop input details
    foreach ($request->details as $detail) {
        if (isset($detail['id'])) {
            // Update detail yang sudah ada
            ItemDetail::where('id', $detail['id'])->update([
                'serial_number' => $detail['serial_number'] ?? null,
                'description' => $detail['description'] ?? null,
                'status' => $detail['status'] ?? 'available',
            ]);
        } else {
            // Tambah baru
            ItemDetail::create([
                'item_id' => $item->id,
                'serial_number' => $detail['serial_number'] ?? null,
                'description' => $detail['description'] ?? null,
                'status' => $detail['status'] ?? 'available',
            ]);
        }
    }

    return redirect()->route('items.index')->with('success', 'Item berhasil diperbarui.');
}



    public function destroy(Item $item){
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item Berhasil dihapus');
    }


    public function show($id){
        return view('layouts.items.show', compact('id'));
    }
}
