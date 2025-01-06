<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'tb_members';

    // Kolom yang dapat diisi
    protected $fillable = [
        'name_members',
        'email_members',
        'phone_members',
        'address_members',
    ];
}
