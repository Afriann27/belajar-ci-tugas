<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $start = strtotime(date('Y-m-d')); // tanggal hari ini

        for ($i = 0; $i < 10; $i++) {
            $tanggal = date('Y-m-d', strtotime("+$i days", $start));

            $this->db->table('diskon')->insert([
                'tanggal'    => $tanggal,
                'nominal'    => 100000,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
