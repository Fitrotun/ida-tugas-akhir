<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
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
                'image' => '',
                'name' => 'Destinasi Wisata Menarik di Wonosobo, Cocok Jadi Wishlist Liburan!',
                'description' => 'Kebun Teh Tambi terletak di Kec. Kertek, Kabupaten Wonosobo, 
                                  Jawa Tengah,Indonesia.  Diketinggian yang cukup tinggi, tempat ini memberikan pemandangan indah pegunungan yang hijau.',
                
            ],
            [
                'image' => '',
                'name' => 'Pemkab Wonosobo Adakan Pelatihan Pemandu Wisata Budaya',
                'description' => 'Melalui pelatihan pengembangan sumber daya manusia bidang pariwisata khususnya pemandu wisata, diharapkan mampu 
                                   menghasilkan pemandu yang berkualitas.',
                
            ],
            [
                'image' => '',
                'name' => 'Wisata Wonosobo Cocok untuk Mengisi Libur Panjang',
                'description' => 'Wisata Wonoland Wonosobo merupakan salah satu taman rekreasi yang menarik untuk dikunjungi. ',                
                
            ],
        ];
        foreach($data as $d){
            Berita::create($d);
        }
        
    }
}
