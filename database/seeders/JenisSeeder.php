<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Surat Keputusan', 'Surat Permohonan', 'Surat Kuasa', 'Surat Pengantar', 'Surat Perintah', 'Surat Undangan', 'Surat Edaran'];

        foreach ($data as $item) {
            Jenis::create([
                'nama' => $item
            ]);
        }
    }
}
