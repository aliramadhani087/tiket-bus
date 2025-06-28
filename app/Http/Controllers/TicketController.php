<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all(); // Mengambil semua data tiket
        return view('v_admin.tiket.index', compact('tickets')); // Menampilkan data di view
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mencari tiket berdasarkan ID
        $ticket = Ticket::findOrFail($id);

        // Mengarahkan ke view 'v_admin.tiket.show' dengan data tiket
        return view('v_admin.tiket.show', compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('v_admin.tiket.create'); // Menampilkan form tambah tiket
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'berangkat' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'harga' => 'required|numeric|min:0',
            'po' => 'required|string|in:Sinar Jaya,Dewi Sri,Dedy Jaya,Harapan Jaya,Juragan99',
        ]);

        // Menyimpan data ke database
        Ticket::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('ticket.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $edit = Ticket::findOrFail($id);
    return view('admin.ticket.edit', compact('edit'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'berangkat' => 'required|string',
        'tujuan' => 'required|string',
        'tanggal' => 'required|date',
        'jam' => 'required',
        'harga' => 'required|numeric',
        'po' => 'required|string',
    ]);

    $ticket = Ticket::findOrFail($id);
    $ticket->update(array_merge($validated, [
        'updated_by' => auth()->id(), // Catat ID pengguna yang mengedit
    ]));

    return redirect()->route('ticket.index')->with('success', 'Data berhasil diubah!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari dan menghapus data tiket berdasarkan ID
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('ticket.index')->with('success', 'Data berhasil dihapus!');
    }
}