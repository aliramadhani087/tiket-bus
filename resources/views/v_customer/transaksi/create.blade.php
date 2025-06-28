@extends('v_layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>


<body class="bg-gray-900">


    @include('v_layouts.alert')


    <div class="flex justify-center items-center py-36">
        <div class="block w-80 md:w-[40rem] border rounded-lg shadow bg-gray-800 border-gray-700">
            <form action="/customer/transaction" method="post" class="max-w-full mx-7 my-7">
                @csrf

                <label for="id_ticket" class="block mb-2 text-sm font-medium text-white">Pilih
                    Rute</label>
                <select id="id_ticket" name="id_ticket"
                    class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($tickets as $ticket)
                        <option value="{{ $ticket->id }}" data-price="{{ $ticket->harga }}">{{ $ticket->berangkat }} -
                            {{ $ticket->tujuan }} (PO {{ $ticket->po }})</option>
                    @endforeach
                </select>

                <label for="harga" class="block mb-2 text-sm font-medium text-white">Harga Rute Yang Dipilih</label>
                <input type="text" id="harga" name="harga"
                    class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    readonly>


                <div class="mb-5">
                    <label for="jumlah" class="block mb-2 text-sm font-medium text-white">Jumlah
                        Tiket (Min. 1)</label>
                    <input type="jumlah" id="jumlah" name="jumlah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>

                <button type="submit"
                    class="text-white bg-amber-600 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-600 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('id_ticket').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var price = selectedOption.getAttribute('data-price');
            document.getElementById('harga').value = price;
        });
    </script>

</body>
