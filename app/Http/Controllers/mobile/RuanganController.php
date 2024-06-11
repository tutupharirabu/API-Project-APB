<?php

namespace App\Http\Controllers\mobile;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::select('id_ruangan', 'nama_ruangan', 'lokasi', 'harga_ruangan')->get();
        $ruangan = Ruangan::with('gambar')->get();
        return response()->json($ruangan);
    }
}
