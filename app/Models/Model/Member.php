<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'tbl_member';
    // define primary key
    protected $primaryKey = 'id_member';
    // define field
    protected $fillable = ['username', 'password', 'password1', 'nama_member','alamat','no_ktp','jenis_kelamin'];
}
