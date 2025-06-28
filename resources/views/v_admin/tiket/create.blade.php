@extends('v_layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

<body>

    <div class="flex justify-center items-center py-5">
        <div class="block w-80 md:w-[40rem] border rounded-lg shadow bg-gray-800 border-gray-700">
            <form action="/admin/ticket" method="post" class="max-w-full mx-7 my-7">
                @csrf

                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-white">Lokasi
                        Awal</label>
                    <input type="name" id="name" name="berangkat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@gmail.com" required />
                </div>
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-white">Tujuan</label>
                    <input type="name" id="name" name="tujuan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>

                <label for="time" class="block mb-2 text-sm font-medium text-white">Pilih
                    Tanggal Keberangkatan</label>
                <div class="relative max-w-sm mb-5">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-format="yyyy/mm/dd" type="text" name="tanggal"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date">
                </div>


                <label for="time" class="block mb-2 text-sm font-medium text-white">Pilih Jam
                    Keberangkatan</label>
                <div class="relative mb-5">
                    <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="time" id="time" name="jam"
                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        min="09:00" max="18:00" value="00:00" required />
                </div>
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-white">Harga</label>
                    <input type="name" id="name" name="harga"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>

                <label for="countries" class="block mb-2 text-sm font-medium text-white">Pilih PO Bus</label>
                <select id="countries" name="po"
                    class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Sinar Jaya">Sinar Jaya</option>
                    <option value="Dewi Sri">Dewi Sri</option>
                    <option value="Dedy Jaya">Dedy Jaya</option>
                    <option value="Harapan Jaya">Harapan Jaya</option>
                    <option value="Juragan99">Juragan99</option>
                </select>

                <button type="submit"
                    class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-600 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </div>

</body>
