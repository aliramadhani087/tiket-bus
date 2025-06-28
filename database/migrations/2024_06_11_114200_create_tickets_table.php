<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); // ID utama (Primary Key)
            $table->string('berangkat'); // Lokasi keberangkatan
            $table->string('tujuan'); // Lokasi tujuan
            $table->date('tanggal'); // Tanggal keberangkatan
            $table->time('jam'); // Jam keberangkatan
            $table->decimal('harga', 10, 2); // Harga tiket (maksimal 10 digit, 2 desimal)
            $table->string('po'); // Operator PO
            $table->timestamps(); // Kolom created_at dan updated_at

            // Kolom untuk menyimpan ID user yang terakhir mengedit data
            $table->unsignedBigInteger('updated_by')->nullable();

            // Tambahkan foreign key untuk `updated_by` jika menggunakan tabel users
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tabel dan constraint
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['updated_by']);
        });

        Schema::dropIfExists('tickets');
    }
};