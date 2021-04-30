<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Authenticatable;

class Member extends Model implements AuthenticatableContract,JWTSubject
{
    use HasFactory,Authenticatable;
    protected $table = 'tbl_member';
    // define primary key
    protected $primaryKey = 'id_member';
    // define field
    protected $fillable = ['username', 'password', 'password1', 'nama_member','alamat','no_ktp','jenis_kelamin'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
