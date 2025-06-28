<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Laporan;
use App\Models\Transaction;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('ticket')->get();
        $users = User::all();
        $tickets = Ticket::all();

        // $sum = Transaction::sum('sum');
        // $sum = Model::where('status', 'paid')->sum('sum_field');

        return view('v_admin.laporan.index', compact('transactions', 'users', 'tickets'));
    }
}
