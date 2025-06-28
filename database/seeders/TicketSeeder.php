<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::insert([
            [
                'berangkat' => 'Ainal Fikri',
                'berangkat' => 'Jakarta',
                'tujuan' => 'Surabaya',
                'tanggal' => '2024-06-13',
                'jam' => '15:00:00',
                'harga' => '150000',
                'po' => 'Sinar Jaya'
            ],
        ]);
    }
}
