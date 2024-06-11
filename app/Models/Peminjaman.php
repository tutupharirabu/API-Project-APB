<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ruangan;
use App\Models\Barang;
use App\Models\Users;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $fillable = ['nama_peminjam', 'id_ruangan', 'id_barang', 'tanggal_mulai', 'tanggal_selesai', 'jumlah', 'status', 'keterangan'];
    protected $dates = ['tanggal_mulai', 'tanggal_selesai'];

    public function ruangan(){
        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
