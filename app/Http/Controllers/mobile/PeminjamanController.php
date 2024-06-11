<?php

namespace App\Http\Controllers\mobile;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_peminjam' => 'required|string|max:255',
            'id_ruangan' => 'required|integer|exists:ruangan,id_ruangan',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jumlah' => 'required|integer',
            'status' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $peminjaman = Peminjaman::create([
            'nama_peminjam' => $request->nama_peminjam,
            'id_ruangan' => $request->id_ruangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'jumlah' => $request->jumlah,
            'status' => 'Menunggu',
            'keterangan' => $request->keterangan,
        ]);

        return response()->json(['message' => 'Peminjaman berhasil dibuat', 'data' => $peminjaman], 201);
    }

    public function getStatusPeminjaman(Request $request)
    {
        $statuses = Peminjaman::whereIn('status', ['Disetujui', 'Ditolak'])->get(['nama_peminjam', 'status', 'updated_at']);
        return response()->json($statuses);
    }
}
