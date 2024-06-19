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
            'id_users' => 'required|integer|exists:users,id_users',
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
            'id_users' => $request->id_users,
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
        $request->validate([
            'id_users' => 'required|integer',
        ]);

        $statuses = Peminjaman::where('peminjaman.id_users', $request->id_users)
        ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruangan')
        ->get(['peminjaman.id_ruangan', 'ruangan.nama_ruangan', 'peminjaman.status', 'peminjaman.updated_at']);

        return response()->json([
            'statuses' => $statuses
        ], 200);
    }

}
