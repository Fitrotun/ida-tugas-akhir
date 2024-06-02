<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                
                'no' => '1',
                'kriteria' => 'Jarak (C1)',
            ],
            [
                
                'no' => '2',
                'kriteria' => 'Jam Buka (C2)',
            ],
            [
                'no' => '3',
                'kriteria' => 'Harga Tiket (C3)',
            ],
            [
                'no' => '4',
                'kriteria' => 'Fasilitas (C4)',
            ],
            [
                'no' => '5',
                'kriteria' => 'Rating (C5)',
            ],
            [
                'no' => '6',
                'kriteria' => 'Transportasi (C6)',
            ]
        ];
        foreach($data as $d){
            Kriteria::create($d);
        }
    }
}
