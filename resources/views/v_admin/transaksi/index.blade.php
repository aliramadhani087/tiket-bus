@extends('v_layouts.app')


<body class="bg-white">


    @include('v_layouts.admin_sidebar')


    <div class="p-4 sm:ml-64">


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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


</body>
