@extends('v_layouts.app')


<body class="bg-white">


    @include('v_layouts.alert')
    @include('v_layouts.customer_sidebar')


    <div class="p-4 sm:ml-64">

        <div class="overflow-x-auto shadow-md">
            <a href="/customer/transaction/create">
                <button type="button"
                    class="float-right focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tambah
                    Tiket</button>
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Tiket
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rute
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $transaction->user->nama }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $transaction->jumlah }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->ticket->berangkat }} - {{ $transaction->ticket->tujuan }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->ticket->po }}
                            </td>
                            <th scope="col" class="px-6 py-3">
                                {{ $transaction->ticket->harga * $transaction->jumlah }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ $transaction->status }}
                            </th>
                            <td class="px-6 py-2">
                                <a href="/customer/transaction/{{ $transaction->id }}/edit/">
                                    <button type="button"
                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-6 py-2 me-2 mb-2 dark:focus:ring-yellow-900">Edit</button>
                                </a>
                                <form action="/customer/transaction/{{ $transaction->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                </form>
                                @if ($transaction->status == 'Payment Success')
                                    <a href="/cetakbukti/{{ $transaction->id }}">
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">Cetak
                                            Tiket</button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


</body>
