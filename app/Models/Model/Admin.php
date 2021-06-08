<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Admin extends Model implements AuthenticatableContract
{
    use HasFactory,Authenticatable;
    protected $guard = 'admin';
    // define table
    protected $table = 'tbl_admin';
    // define primary key
    protected $primaryKey = 'id_admin';
    // define field
    protected $fillable = ['username', 'password','password1','nama_admin'];
}
