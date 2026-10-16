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
         = Obat::find();
        if () {
            ->delete();
        }

        return redirect()->route('obat.index');
    }
}
