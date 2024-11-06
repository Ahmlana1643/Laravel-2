<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Writer extends Model
{
    use HasFactory, SoftDeletes;

protected $fillable = [
    'uuid',
    'name',
    'email',
    'password',
    'role',        // role untuk menentukan apakah writer atau owner
    'is_verified', // status verifikasi: 1 untuk verified, 0 untuk non-verified
    'verified_at'  // tanggal verifikasi
];

}
