<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arisan extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan
    protected $table = 'tb_arisan';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'name',
        'start_date',
        'total_members',
    ];
}
