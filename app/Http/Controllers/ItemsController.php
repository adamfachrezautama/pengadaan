<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Items\Store;
use App\Http\Requests\Admin\Items\Update;
use App\Models\Category;
use App\Models\Item;
use App\Services\LogActivityService;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{
    //

    public function index(){
    $query = request()->query('search');

    $items = Item::with('category');

    if ($query) {
        $items = $items->where('item_name', 'ILIKE', "%{$query}%");
    }

    $items = $items->paginate(5)->appends(['search' => $query]);

    return view('items.index', compact('items'));
}


    public function create(){
        $categories = Category::all();

        return view('items.create',compact('categories'));
    }


    public function store(Store $request)
    {
        // Ambil semua data yang valid dari request
        $data = $request->validated();

        // Upload image kalau ada
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('items', 'public');
        }

        // Simpan item
        $item = Item::create($data);

        // Log aktivitas
        LogActivityService::add("Tambah barang: {$item->item_name}");

        return redirect()->route('items.index')
                        ->with('success', 'Item dan detail berhasil ditambahkan.');
    }


    public function edit(Item $item){
         $categories = Category::all();

        return view('items.edit',compact('item','categories'));
    }

    public function update(Update $request, Item $item)
    {
    $data = $request->validated();

    // Upload image baru jika ada
    if ($request->hasFile('image')) {
        // hapus image lama
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $data['image'] = $request->file('image')->store('items', 'public');
    }

    $item->update($data);

    LogActivityService::add("Update barang: {$item->item_name}");

    return redirect()->route('items.index')->with('success', 'Item berhasil diupdate.');
}




    public function destroy(Item $item){
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item Berhasil dihapus');
    }


   public function show($id)
{
    $item = Item::with('itemDetails')->findOrFail($id);
    return view('items.show', compact('item'));
}

}
