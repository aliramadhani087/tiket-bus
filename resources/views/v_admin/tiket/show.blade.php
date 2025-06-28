<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detail Tiket</h1>

        <div class="card">
            <div class="card-header">
                Informasi Tiket
            </div>
            <div class="card-body">
                <h5 class="card-title">Berangkat: {{ $ticket->berangkat }}</h5>
                <p class="card-text"><strong>Tujuan:</strong> {{ $ticket->tujuan }}</p>
                <p class="card-text"><strong>Tanggal:</strong> {{ $ticket->tanggal }}</p>
                <p class="card-text"><strong>Jam:</strong> {{ $ticket->jam }}</p>
                <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($ticket->harga, 0, ',', '.') }}</p>
                <p class="card-text"><strong>Operator PO:</strong> {{ $ticket->po }}</p>
                <a href="{{ route('ticket.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>
