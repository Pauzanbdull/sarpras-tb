<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = ['nama_barang', 'jumlah'];
    protected $table = 'peminjaman';


}
