<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\StoreItemRequest;
use App\Http\Requests\Administrator\UpdateItemRequest;
use App\Http\Requests\ImportExcelRequest;
use App\Models\Item;
use App\Services\ImportService;

class ItemController extends Controller
{
    private ImportService $importService;

    public function __construct()
    {
        $this->importService = new ImportService(new Item());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::select('id', 'name')->get();

        return view('administrator.item.index', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        Item::create($request->validated());

        return redirect()->route('administrators.items.store')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->validated());

        return redirect()->route('administrators.items.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('administrators.items.index')->with('success', 'Data berhasil dihapus!');
    }
}
