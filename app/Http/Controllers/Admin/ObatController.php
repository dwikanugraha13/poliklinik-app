<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
         = Obat::all();
        return view('admin.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('admin.obat.create');
    }

    public function store(Request )
    {
        ->validate([
            'nama_obat' => 'required|string',
            'kemasan' => 'required|string',
            'harga' => 'required|integer',
        ]);

        Obat::create([
            'nama_obat' => ->nama_obat,
            'kemasan' => ->kemasan,
            'harga' => ->harga
        ]);

        return redirect()->route('obat.index');
    }

    public function edit(string )
    {
         = Obat::findOrFail();
        return view('admin.obat.edit', compact('obat'));
    }

    public function update(Request , string )
    {
        ->validate([
            'nama_obat' => 'required|string',
            'kemasan' => 'nullable|string',
            'harga' => 'required|integer',
        ]);

         = Obat::findOrFail();
        ->update([
            'nama_obat' => ->nama_obat,
            'kemasan' => ->kemasan,
            'harga' => ->harga
        ]);

        return redirect()->route('obat.index');
    }

    public function destroy(string )
    {
         = Obat::findOrFail();
        ->delete();

        return redirect()->route('obat.index');
    }
}
