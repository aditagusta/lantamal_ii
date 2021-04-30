<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'tbl_pengaduan';
    // define primary key
    protected $primaryKey = 'id_pengaduan';
    // define field
    protected $fillable = ['jenis_pengaduan', 'pengaduan', 'tanggal_pengaduan', 'foto'];
}
