<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tickets = Ticket::orderBy('id', 'desc')->get();
        // return view('server.ticket.index', [
        //     'judul' => 'Data Tiket',
        //     'index' => $tickets
        // ]);

        $transactions = Transaction::all();
        $users = User::all();
        $tickets = Ticket::all();

        $user = Auth::user();

        if ($user->role == 'admin') {
            return view('v_admin.transaksi.index', compact('transactions', 'users', 'tickets'));
        } else {
            return view('v_customer.transaksi.index', compact('transactions', 'users', 'tickets'));
        }

    }

    public function invoice($id)
{
    // Fetch the specific transaction by ID
    $transaction = Transaction::find($id);

    if (!$transaction) {
        // Handle the case where the transaction is not found
        abort(404, 'Transaction not found');
    }

    // Prepare data needed for the PDF
    $data = [
        'title' => 'Invoice',
        'transaction' => $transaction,
    ];

    // Generate the PDF
    $pdf = PDF::loadView('pdf.invoice', $data);

    // Stream the PDF to the browser for viewing or download
    return $pdf->stream('invoice.pdf');
    // return $pdf->stream("", ["Attachment" => false]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $transactions = Transaction::all();
        // $users = User::all();
        // $shows = Show::all();
        // $tickets = Ticket::all();

        // return view('server.transaction.index', compact('transactions','users','shows','tickets'));

        $transactions = Transaction::all();
        $users = User::all();
        $tickets = Ticket::all();

        $user = Auth::user(); // Get the currently authenticated user

        return view('v_customer.transaksi.create', compact('transactions', 'users', 'tickets'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required',
            'id_ticket' => 'required',
        ]);
    
        // Generate a random id_transaction with both letters and numbers
        $id_transaction = Str::random(5) . mt_rand(10000, 99999);
    
        $user = Auth::user(); 
    
        $ticket_id = $request->input('id_ticket');
        $ticket = Ticket::find($ticket_id);
    
        Transaction::create([
            'id_transaction' => $id_transaction,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
            'id_user' => $user->id,
            'id_ticket' => $ticket_id,
        ]);
    
        // return redirect('/customer/transaction');
        return redirect()->route('transaction.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $tickets = Ticket::all();
    
        return view('v_customer.transaksi.edit', compact('transaction', 'tickets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'jumlah' => 'required',
            'id_ticket' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Transaction::where('id', $id)->update($validatedData);
        return redirect('/customer/transaction');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transactions = Transaction::findOrFail($id);
        $transactions->delete();

        return redirect('/customer/transaction');
    }
}