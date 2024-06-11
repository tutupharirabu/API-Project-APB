<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataRuangan = Ruangan::all();
        return view('penyewa.daftarRuanganPenyewa', compact('dataRuangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Users::all();
        return view('registersys.daftarPenyewa', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'password' => 'required'
        ]);

        $penyewa = new Users([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'password' => bcrypt($request->input('password')),
        ]);

        $penyewa->save();

        return redirect('/')->with('success', 'Registration Successfull~ Please Login!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        return view('penyewa.detailRuanganPenyewa', compact('ruangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
