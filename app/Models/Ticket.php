<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets'; // Nama tabel di database

    protected $fillable = [
        'berangkat',
        'tujuan',
        'tanggal',
        'jam',
        'harga',
        'po',
        'updated_by',
    ];
}
