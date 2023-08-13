<?php

namespace Database\Seeders;
use App\Models\Wisata;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class WisataSeeder extends Seeder
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
                'name' => 'Telaga Warna',
                'description' => 'Telaga Warna berada di ketinggian 2000 meter di atas permukaan laut, dan dikelilingi oleh bukit-bukit 
                                tinggi yang menambah pesona keindahan alam sekitar telaga warna.',
                'price' => 21000,
                'rating'=> 5,
                'latitude' => '-7.212274036955316',
                'longitude' => '109.9151914902495',
                'id_category' => 2,
            ],
            [
                'image' => '',
                'name' => 'Batu Angkruk',
                'description' => 'Batu Angkruk Dieng dapat dikategorikan sebagai tempat wisata untuk hunting foto-foto keren,
                                 karena memiliki banyak spot foto kekinian dan tentunya instagramable bagi kaum muda.',
                'price' => 15000,
                'rating'=> 5,
                'latitude' => '-7.225919894779383',
                'longitude' => '109.93204476589864',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Kebun Teh Tambi',
                'description' => 'Kebun Teh Tambi merupakan sebuah tempat wisata dengan konsep agrowisata 
                                yang menyajikan pemandangan sejuk, dan suasana yang tenang juga damai, sehingga dapat menyejukan mata.',                
                 'price' => 10000,
                'rating'=> 5,
                'latitude' => '-7.267012723594686',
                'longitude' => '109.96004857026207',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Curug Sikarim',
                'description' => 'Curug Sikarim merupakan curug tertinggi yang ada di Pulau Jawa, 
                dengan memiliki ketinggian sekitar 125 meter dengan ketinggian tersebut wisatawan dapat melihat kabut.',               
                'price' => 15000,
                'rating'=> 4,
                'latitude' => '-7.242360400965991',
                'longitude' => '109.90708435240498',
                'id_category' => 2,
            ],
            [
                'image' => '',
                'name' => 'Kahyangan Skyline',
                'description' => 'Kahyangan Skyline merupakan tempat wisata  yang instagramable dan cozy banget, 
                paling enak dijadikan lokasi santuy sambil menikmati keindahan alam yang tersaji ketika cuaca cerah.', 
                'price' => 10000,              
                'rating'=> 5,
                'latitude' => '-7.263273127228672',
                'longitude' => '109.9279080155511',
                'id_category' => 1,
                
            ],
            [
                'image' => '',
                'name' => 'Telaga Cebong',
                'description' => 'Telaga Cebong salah satu spot wisata yang ada di sekitar Gunung Sikunir,
                daya tarik dari Telaga Cebong ini adalah kawasan wisata yang ramai untuk berkemah.',
                'price' => 15000,              
                'rating'=> 4,
                'latitude' => '-7.235387083310799',
                'longitude' => '109.92017157909011',
                'id_category' => 2,
                
            ],
            [
                'image' => '',
                'name' => 'Telaga Menjer',
                'description' => 'Telaga Menjer termasuk kedalam danau alami, karena terbentuk akibat letusan gunung. Alam di sekitar telaga ini sangat asri,
                 enak banget untuk dijadikan lokasi self healing.',               
                 'price' => 10000,              
                'rating'=> 4,
                'latitude' => '-7.269022451634369',
                'longitude' => '109.92612042842974',
                'id_category' => 2,
                
            ],
            [
                'image' => '',
                'name' => 'Sinsu Park',
                'description' => 'Sinsu Park adalah tempat wisata yang mengusung taman edukasi dengan hiasan panorama Gunung Sindoro dan Sumbing.
                Sinsu Park menjadi destinasi yang hits sejak awal diresmikan dan berada di area yang sangat luas.',            
                'price' => 15000,              
                'rating'=> 4,
                'latitude' => '-7.345383003982833',
                'longitude' => '110.02773937848826',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Curug Winong',
                'description' => 'Curug Winong merupakan air terjun tersembunyi yang ada di Desa Wisata Winongsari, sebuah tempat wisata alam yang menjanjikan
                 keindahan aliran air yang masih alami, Curug Winong memiliki tinggi sekitar 50 meter.',            
                'price' => 5000,              
                'rating'=> 4,
                'latitude' => '-7.459635979821192',
                'longitude' => '109.89729259473756',
                'id_category' => 2,
            ],
        ];
        foreach($data as $d){
            Wisata::create($d);
        }
        
    }
}
