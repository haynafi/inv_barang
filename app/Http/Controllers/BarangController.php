<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\MasterBarang;

class BarangController extends Controller
{
    // Fetch all data
    public function index()
    {
        return MasterBarang::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kategori' => 'required|in:sarana_prasarana,barang_habis_pakai,dapur_umum',
            'stok_awal' => 'required|integer',
            'satuan' => 'required|string|max:50',
        ]);

        $barang = MasterBarang::create($validated);

        return response()->json($barang, 201);
    }
}
