<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'tb_transactions';  // Pastikan tabel ini sesuai dengan nama di database

    // Kolom yang dapat diisi
    protected $fillable = [
        'members_id',
        'arisan_id',
        'amount',
    ];

    // Relasi dengan Member
    public function member()
{
    return $this->belongsTo(Members::class, 'members_id');
}


    // Relasi dengan Arisan
    public function arisan()
    {
        return $this->belongsTo(Arisan::class, 'arisan_id');
    }
}
