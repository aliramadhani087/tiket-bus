<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <table>
        <tr>
            <td>Transaction ID : </td>
            <td>{{ $transaction->id_transaction }}</td>
        </tr>
        <tr>
            <td>Nama :</td>
            <td>{{ $transaction->user->nama }}</td>
        </tr>
        <tr>
            <td>Jumlah Tiket : </td>
            <td>{{ $transaction->jumlah }}</td>
        </tr>
        <tr>
            <td>Rute : </td>
            <td>{{ $transaction->ticket->berangkat }} - {{ $transaction->ticket->tujuan }}</td>
        </tr>
        <tr>
            <td>PO : </td>
            <td>{{ $transaction->ticket->po }}</td>
        </tr>
        <tr>
            <td>Total Harga : </td>
            <td>{{ $transaction->ticket->harga * $transaction->jumlah }}</td>
        </tr>
        <tr>
            <td>Status : </td>
            <td>{{ $transaction->status }}</td>
        </tr>
    </table>
</body>

</html>
