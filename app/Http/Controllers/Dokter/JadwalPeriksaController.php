<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
         = Auth::user();
         = JadwalPeriksa::where('id_dokter', ->id)->orderBy('hari')->get();
        return view('dokter.jadwal-periksa.index', compact('jadwalPeriksas'));
    }

    public function create()
    {
        return view('dokter.jadwal-periksa.create');
    }

    public function store(Request )
    {
        ->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ]);

        JadwalPeriksa::create([
            'id_dokter' => Auth::id(),
            'hari' => ->hari,
            'jam_mulai' => ->jam_mulai,
            'jam_selesai' => ->jam_selesai
        ]);

        return redirect()->route('jadwal-periksa.index');
    }

    public function edit()
    {
         = JadwalPeriksa::findOrFail();
        return view('dokter.jadwal-periksa.edit', compact('jadwalPeriksa'));
    }

    public function update(Request , string )
    {
        ->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ]);

         = JadwalPeriksa::findOrFail();
        ->update([
            'hari' => ->hari,
            'jam_mulai' => ->jam_mulai,
            'jam_selesai' => ->jam_selesai
        ]);

        return redirect()->route('jadwal-periksa.index');
    }

    public function destroy(string )
    {
         = JadwalPeriksa::findOrFail();
        ->delete();

        return redirect()->route('jadwal-periksa.index');
    }
}
