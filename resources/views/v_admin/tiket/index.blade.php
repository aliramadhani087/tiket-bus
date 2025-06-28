@extends('v_layouts.app')

<body class="bg-white">

    @include('v_layouts.alert')
    @include('v_layouts.admin_sidebar')

    <div class="p-4 sm:ml-64">

        <div class="overflow-x-auto shadow-md">
            <a href="{{ route('ticket.create') }}">
                <button type="button"
                    class="float-right focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Tambah Tiket
                </button>
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Rute</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Jam</th>
                        <th scope="col" class="px-6 py-3">Harga</th>
                        <th scope="col" class="px-6 py-3">PO</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $ticket->berangkat }} - {{ $ticket->tujuan }}
                            </th>
                            <td class="px-6 py-4">{{ $ticket->tanggal }}</td>
                            <td class="px-6 py-4">{{ $ticket->jam }}</td>
                            <td class="px-6 py-4">Rp{{ number_format($ticket->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">{{ $ticket->po }}</td>
                            <td class="px-6 py-2">
                                <a href="{{ route('ticket.edit', $ticket->id) }}">
                                    <button type="button"
                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-6 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                                        Edit
                                    </button>
                                </a>
                                <a href="{{ route('ticket.show', $ticket->id) }}">
                                    <button type="button"
                                        class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2 me-2 mb-2 dark:focus:ring-blue-800">
                                        View
                                    </button>
                                </a>
                                <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" class="inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
