@extends('v_layouts.app')
<body>
    <div class="flex justify-center items-center py-10 px-4">
        <div class="w-full max-w-2xl border rounded-lg shadow bg-gray-800 border-gray-700 p-6">
            <form action="{{ route('ticket.update', $edit->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Lokasi Awal -->
                <div class="mb-5">
                    <label for="berangkat" class="block mb-2 text-sm font-medium text-white">Lokasi Awal</label>
                    <input type="text" id="berangkat" name="berangkat" 
                        value="{{ old('berangkat', $edit->berangkat) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>

                <!-- Tujuan -->
                <div class="mb-5">
                    <label for="tujuan" class="block mb-2 text-sm font-medium text-white">Tujuan</label>
                    <input type="text" id="tujuan" name="tujuan" 
                        value="{{ old('tujuan', $edit->tujuan) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>

                <!-- Tanggal Keberangkatan -->
                <div class="mb-5">
                    <label for="tanggal" class="block mb-2 text-sm font-medium text-white">Tanggal Keberangkatan</label>
                    <input type="text" id="tanggal" name="tanggal" 
                        value="{{ old('tanggal', $edit->tanggal) }}"
                        placeholder="Pilih tanggal"
                        datepicker datepicker-format="yyyy-mm-dd"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>

                <!-- Jam Keberangkatan -->
                <div class="mb-5">
                    <label for="jam" class="block mb-2 text-sm font-medium text-white">Jam Keberangkatan</label>
                    <input type="time" id="jam" name="jam" 
                        value="{{ old('jam', $edit->jam) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>

                <!-- Harga -->
                <div class="mb-5">
                    <label for="harga" class="block mb-2 text-sm font-medium text-white">Harga</label>
                    <input type="number" id="harga" name="harga" 
                        value="{{ old('harga', $edit->harga) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>

                <!-- PO -->
                <div class="mb-5">
                    <label for="po" class="block mb-2 text-sm font-medium text-white">Pilih PO</label>
                    <select id="po" name="po"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Sinar Jaya" {{ $edit->po == 'Sinar Jaya' ? 'selected' : '' }}>Sinar Jaya</option>
                        <option value="Dewi Sri" {{ $edit->po == 'Dewi Sri' ? 'selected' : '' }}>Dewi Sri</option>
                        <option value="Dedy Jaya" {{ $edit->po == 'Dedy Jaya' ? 'selected' : '' }}>Dedy Jaya</option>
                        <option value="Harapan Jaya" {{ $edit->po == 'Harapan Jaya' ? 'selected' : '' }}>Harapan Jaya</option>
                        <option value="Juragan99" {{ $edit->po == 'Juragan99' ? 'selected' : '' }}>Juragan99</option>
                    </select>
                </div>

                <!-- Tombol Submit -->
                <div class="text-right">
                    <button type="submit"
                        class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none 
                        focus:ring-indigo-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

