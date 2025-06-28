<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = "transactions";
    protected $fillable = ['id_transaction', 'jumlah', 'id_user', 'id_ticket'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'id_ticket');
    }

}
