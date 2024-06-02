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
                'name' => 'Kebun Teh Panama',
                'description' => 'Kebun Teh Panama, menjadi tempat ideal untuk mereka yang ingin mengistirahatkan pikiran sejenak dalam kebisingan kota,. 
                Lokasinya berada di Desa Tlogo, Kecamatan Garung, Kabupaten Wonosobo. Jaraknya 1,5 km dari Kawasan Telaga Menjer.',
                'price' => 10000,
                'rating'=> 5,
                'jam_buka'=> '07.00-18.00 WIB',
                'jarak'=> '12,4 km',
                'fasilitas'=> 'Warung, Toilet dan Gazebo kecil',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Kahyangan Skyline',
                'description' => 'Kahyangan Skyline memiliki pemandangan yang sangat indah berada di ketinggian 1200 mdpl.\
                 Pengunjung dapat melihat pemandangan perbukitan dengan lapang tanpa terhalang gedung maupun bangunan tinggi lainnya.',
                'price' => 20000,
                'rating'=> 4,
                'jam_buka'=> '05.00-17.00 WIB',
                'jarak'=> '13,1 km',
                'fasilitas'=> ' Mushola, Warung, Area parkir dan Toilet.',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Patean Tambi',
                'description' => 'Kebun Teh Tambi merupakan sebuah tempat wisata dengan konsep agrowisata 
                                yang menyajikan pemandangan sejuk, dan suasana yang tenang juga damai, sehingga dapat menyejukan mata.',                
                 'price' => 10000,
                'rating'=> 5,
                'jam_buka'=> '07.00-16.30 WIB',
                'jarak'=> '14,6 km',
                'fasilitas'=> 'Mushola, Toilet, Gazebo, Warung, dan Tempat parkir.',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Pintu Langit',
                'description' => 'pintu langit memiliki panorama alam dari
                 ketinggian dengan pemandangan langit, mulai dari matahari terbit, golden sunrise, hingga lautan awan',               
                'price' => 15000,
                'rating'=> 5,
                'jam_buka'=> '24 Jam',
                'jarak'=> '18,7 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola, Cafe',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 2,
            ],
            [
                'image' => '',
                'name' => 'Batu Angkruk',
                'description' => 'Ciri khas Batu Angkruk yang terkenal ialah jembatan kaca di ujung jurang guna menikmati panorama Dieng yang lebih leluasa. Titik ini sering dijadikan spot foto terbaik bagi pegunjung, 
                Karena letaknya langsung menghadap pada hamparan awan putih lengkap dengan keindahan pegunungan dieng.', 
                'price' => 15000,              
                'rating'=> 4,
                'jam_buka'=> '06.00-17.00 WIB',
                'jarak'=> '19,8 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola, Warung',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 2,
                
            ],
            [
                'image' => '',
                'name' => 'Watu Angkruk',
                'description' => 'Bersebelahan dengan Batu Angkruk yang terkenal ialah jembatan kaca', 
                'price' => 15000,              
                'rating'=> 4,
                'jam_buka'=> '06.00-17.00 WIB',
                'jarak'=> '19,8 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola, Warung',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 2,
                
            ],
            [
                'image' => '',
                'name' => 'Bukit Awan Sikapuk',
                'description' => 'Bukit Awan Sikapuk atau terkenal  menyajikan pesona alam yang menawan.  Tidak perlu Tracking jauh mengingat lokasinya yang berada di daerah dataran tinggi tentunya wisatawan akan disuguhi pemandangan alam berupa hamparan perbukitan hingga view gunung-gunung nan megah.
                 Terlebihnya jika datang pagi hari, panorama sunset dan kabut yang cukup tebal akan menemani para wisatawan.',               
                 'price' => 10000,              
                'rating'=> 5,
                'jam_buka'=> '05.30-16.30 WIB',
                'jarak'=> '20,2 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola, Warung, Gazebo',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 2,
                
            ],
            [
                'image' => '',
                'name' => 'Dieng Park',
                'description' => 'Dieng Park merupakan tempat wisata terbaru di area dataran tinggi Dieng. Berada di area perbukitan di samping 
                Telaga Warna sehingga para pengunjung dapat menikmati keindahan pemandangan Telaga Warna dari atas puncak bukit ini.',            
                'price' => 15000,              
                'rating'=> 5,
                'jam_buka'=> '24 Jam',
                'jarak'=> '25,6 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola, Warung',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Telaga Warna',
                'description' => 'Disebut telaga warna dikarenakan telaga ini mampu memantulkan pancaran berbagai
                 warna disebabkan adanya kadar mineral yang berwarna warni dan sangat indah.',            
                'price' => 22000,              
                'rating'=> 5,
                'jam_buka'=> '07.00-16.00 WIB',
                'jarak'=> '22,6 km',
                'fasilitas'=> 'Toilet, Mushola, Gazebo, Parkir, Warung',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Batu Ratapan Angin',
                'description' => 'Lokasi obyek wisata ini berada di kawasan bukit tepat sebelah selatan Telaga warna dengan ketinggian sekitar 2100mdpl.',            
                'price' => 15000,              
                'rating'=> 5,
                'jam_buka'=> '06.00-17.30 WIB',
                'jarak'=> '24,5 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 2,
            ],
            [
                'image' => '',
                'name' => 'Bukit Sikunir',
                'description' => 'Bukit Sikunir dikenal sebagai The Best Sunrise in Central Java. Berada di 2.463 mdpl, 
                dari ketinggian bukit sikunir wajah pagi yang pertama akan dibuka dengan panorama sunrise terbaik di Jawa Tengah.                 ',            
                'price' => 15000,              
                'rating'=> 5,
                'jam_buka'=> '24 Jam',
                'jarak'=> '21,5 km',
                'fasilitas'=> 'Mushola, Toilet dan Gazeboarea parkir, Toilet, Warung, Mushola',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Air Terjun Sikarim',
                'description' => 'Curug Sikarim merupakan curug tertinggi yang ada di Pulau Jawa, 
                dengan memiliki ketinggian sekitar 125 meter dengan ketinggian tersebut wisatawan dapat melihat kabut.',            
                'price' => 10000,              
                'rating'=> 5,
                'jam_buka'=> '24 Jam',
                'jarak'=> '17,5 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung',
                'transportasi'=> 'Roda 2',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Gelanggang Renang Mangli',
                'description' => 'Mangli sering dimanfaatkan oleh warga Kabupaten Wonosobo untuk olahraga renang dan rekreasi air. 
                Mangli swimming pool memiliki desain dengan baik, aman, terawat, air jernih',            
                'price' => 10000,              
                'rating'=> 4,
                'jam_buka'=> '08.30-16.00 WIB',
                'jarak'=> '1,7 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 2,
            ],
            [
                'image' => '',
                'name' => 'Gardu Pandang',
                'description' => 'Terletak di ketinggian 1789 mdpl Gardu Pandang Tieng merupakan pilihan tepat untuk menikamti terbitnya matahari.
                 Setiap pagi wisatawan ramai menghabiskan waktu untuk menikmati keindahan di sekitar dataran tinggi deing',            
                'price' => 15000,              
                'rating'=> 5,
                'jam_buka'=> '08.30-16.00 WIB',
                'jarak'=> '18,7 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung',
                'transportasi'=> 'Roda 2, 4, dan 6',
                'id_category' => 2,
            ],
            [
                'image' => '',
                'name' => 'Dieng Plateau Theater',
                'description' => 'Tempat ini merupakan sebuah teater mini yang terletak di bukit sikendil. Dari lokasi ini wisatawan bisa menikmati topografi Dieng yang eksotis antara lain Gunung Prau, 
                Gunung Gajah Mungkur, Gunung Pengamun-amun, Gunung Pangonan, Gunung Nagasari, Gunung Juranggrawah, dan Gunung Sipadu.',            
                'price' => 15000,              
                'rating'=> 4,
                'jam_buka'=> '08.30-16.00 WIB',
                'jarak'=> '24,3 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung, Mushola, Gazebo',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 2,
            ],
            [
                'image' => '',
                'name' => 'Candi Arjuna',
                'description' => 'Candi Arjuna dibangun pada masa pemerintahan Dinasti Sanjaya dari Kerajaan Mataram Kuno. Candi ini diperkirakan sebagai candi tertua di Jawa. Hal itu 
                dibuktikan dalam prasasti yang ditemukan di sekitar kompleks Candi Arjuna, yang tertulis tahun 731 Saka atau 808 Masehi.',            
                'price' => 30000,              
                'rating'=> 5,
                'jam_buka'=> '08.30-16.00 WIB',
                'jarak'=> '25,1 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Kawah Sikidang',
                'description' => 'Kawah Sikidang merupakan lapangan perkawahan di Dataran Tinggi Dieng yang berada paling dekat dengan kawasan percandian Dieng, mudah 
                diakses dan dinikmati karena terletak di tanah datar, sehingga juga menjadi kawah yang paling dikunjungi wisatawan. ',            
                'price' => 30000,              
                'rating'=> 4,
                'jam_buka'=> '08.30-16.00 WIB',
                'jarak'=> '27,1 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung, Mushola, Gazebo',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Taman Rekreasi Kalianget',
                'description' => 'Obyek Wisata air panas dari sumber alami yang menghadirkan nuansa hiburan bernuansa pantai dan cocok untuk hiburan keluarga.
                 Di kompleks kalianget ada juga wisata hutan kota dengan replika hewan raksasa dan spot foto menarik.',            
                'price' => 10000,              
                'rating'=> 4,
                'jam_buka'=> '08.30-16.00 WIB',
                'jarak'=> '3 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung, Mushola, Gazebo',
                'transportasi'=> 'Roda 2, 4, dan 6',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Waduk Wadaslintang',
                'description' => 'Kawasan waduk ini berbatasan langsung dengan Kab. Kebumen. 
                Waduk ini dimanfaatkan untuk irigasi. sumber mata air utama dari waduk ini adalah Kaligede, dan Kali mendolo. 
                Ditambah beberapa sungai kecil yang ada disekitarnya yang membuat daerah tangkapan air bisa mencapai seluas 196km',            
                'price' => 10000,              
                'rating'=> 4,
                'jam_buka'=> '08.30-16.00 WIB',
                'jarak'=> '46,4 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung, Mushola, Gazebo',
                'transportasi'=> 'Roda 2, 4, dan 6',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Telaga Menjer',
                'description' => 'Merupakan telaga alam yang terluas di Kab. Wonosobo berada pada ketinggian 1300mdpl 
                dengan luas 70 hektar dan kedalaman air mencapai 50m. ',            
                'price' => 5000,              
                'rating'=> 5,
                'jam_buka'=> '08.30-16.00 WIB',
                'jarak'=> '11,7 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung',
                'transportasi'=> 'Roda 2, 4, dan 6',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Telaga Cebong',
                'description' => 'Telaga Cebong pada awalnya cerukan kawah purba yang seiring perjalanan waktu berubah menjadi bentuk telaga, 
                memunculkan karakter unik sebuah kaldera dan berada pada 2260mdpl',            
                'price' => 15000,              
                'rating'=> 4,
                'jam_buka'=> '24 Jam',
                'jarak'=> '20,7 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung, Mushola',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Wonoland',
                'description' => 'Wonoland Adalah Tempat Wisata Rekreasi Sambil Edukasi Yang Sangat Cocok Untuk 
                Mengajak Buah Hati Anda Belajar Dengan Flora Dan Fauna, Karena Di Wonoland Terdapat Beberapa Taman Unik Seperti
                 (Taman Jepang, Taman Bunga, Taman Eropa Dan Taman Belanda) 
                Sedangkan Untuk Fauna, WonoLand Memiliki ( Kuda, Domba, Kelinci, Bird Nest, Angsa, Merak, Kalkun)',            
                'price' => 10000,              
                'rating'=> 4,
                'jam_buka'=> '08.30-16.00 WIB',
                'jarak'=> '6,4 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung, Gazebo.',
                'transportasi'=> 'Roda 2, 4, dan 6',
                'id_category' => 2,
            ],
            [
                'image' => '',
                'name' => 'Gunung Cilik',
                'description' => 'Kawah Sikidang merupakan lapangan perkawahan di Dataran Tinggi Dieng yang berada paling dekat dengan kawasan percandian Dieng, mudah 
                diakses dan dinikmati karena terletak di tanah datar, sehingga juga menjadi kawah yang paling dikunjungi wisatawan. ',            
                'price' => 5000,              
                'rating'=> 5,
                'jam_buka'=> '06.00-17.00 WIB',
                'jarak'=> '10,6 km',
                'fasilitas'=> 'Area parkir, Toilet, Warung',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Gunung Kembang',
                'description' => 'Disebut Gunung Kembang dikarenakan di hutan gunung ini banyak sekali spesies Bunga.
                 Jika kita mendaki kepuncaknya maka kita akan disambut dengan hamparan permadani alam yang penuh dengan bunga.',            
                'price' => 15000,              
                'rating'=> 4,
                'jam_buka'=> '24 Jam',
                'jarak'=> '10,5 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola ',
                'transportasi'=> 'Roda 2, 4, dan 6',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Sinsu Park',
                'description' => 'Sinsu Park adalah tempat wisata dan taman bermain yang berada tepat di jalan 
                nasional Kabupaten Wonosobo dan ditengah pegunungan antara Sindoro & Sumbing.',            
                'price' => 15000,              
                'rating'=> 4,
                'jam_buka'=> '08.00-22.00 WIB',
                'jarak'=> '17,7 km',
                'fasilitas'=> 'Area parkir, Warung makan atau cafe, Toilet, Mushola, Gazebo ',
                'transportasi'=> 'Roda 2, 4, dan 6',
                'id_category' => 2,
            ],
            [
                'image' => '',
                'name' => 'Tuk Bimalukar',
                'description' => 'Tuk Bimo Lukar menjadi hulu Sungai Serayu yang mengaliri banyak wilayah kabupaten 
                dibawahnya. Mata air ini tidak pernah kering sepanjang musim dan menjadi pusat ritual pada saat prosesi 
                penyelenggaraan hari jadi Wonosobo dan juga dipercaya sebagai tempat keramat bagi penganut penghayat 
                kepercayaan. Ada juga mitos, siapa yang mencuci muka disini akan menjadi awet muda. 
                ',            
                'price' => 5000,              
                'rating'=> 4,
                'jam_buka'=> '24 Jam',
                'jarak'=> '24,3 km',
                'fasilitas'=> 'Area parkir, Toilet',
                'transportasi'=> 'Roda 2, 4, dan 6',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Telaga Bedakah',
                'description' => 'Telaga Bedakah merupakan telaga yang menjadi favorite wisatawan dikarenakan 
                kejernihan air di telaga dan suasana yang sejuk mendukung untuk sekedar melepas penat.',            
                'price' => 5000,              
                'rating'=> 4,
                'jam_buka'=> '08.00-17.00 WIB',
                'jarak'=> '12,6 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola, Gazebo, Warung',
                'transportasi'=> 'Roda 2, 4, dan 6',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Gunung Prau',
                'description' => 'Puncak Gunung diatas 2590 mdpl yang menyajikan keindahan panorama dan warna. Dipuncak gunung ini sama hal nya kita menapaki 
                titik perbatasan 5 Wilayah pemerintah Daerah, yaitu Kab. Kendal, Batang, Banjarnegara, Wonosobo, dan Temanggung. ',            
                'price' => 15000,              
                'rating'=> 5,
                'jam_buka'=> '24 Jam',
                'jarak'=> '24 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Gunung Bismo',
                'description' => 'Dengan slogan Menanjak Minimal, View Maksimal wisatawan sudah dapat menikmati keindahan sunrise dan sunset dari atas 
                Gunung Bismo dengan pemaandangan alam yang masih sangat alami dan asri.',            
                'price' => 15000,              
                'rating'=> 5,
                'jam_buka'=> '24 Jam',
                'jarak'=> '21,7 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Candi Bima',
                'description' => 'Candi Bima merupakan salah satu bangunan suci di Kompleks Percandian Dieng. Letak candi ini tergolong 
                menyendiri dari kumpulan candi di kawasan dataran tinggi Dieng, yakni berjarak 900 meter dari kompleks Candi Arjuna.',            
                'price' => 5000,              
                'rating'=> 4,
                'jam_buka'=> '24 Jam',
                'jarak'=> '26,3 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Curug Drimas',
                'description' => 'Curug ini memiliki pemandangan yang indah dengan suara gemericik air yang
                 memanjakan telinga. Selama menuju ke Curug Drimasi ini pengunjung disuguhi pemandangan hijaunya 
                 dedaunan dari berbagai jenis pohon.',
                'price' => 0,              
                'rating'=> 4,
                'jam_buka'=> '24 Jam',
                'jarak'=> '22,7 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola, Warung, Gazebo',
                'transportasi'=> 'Roda 2',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Bukit Cinta Seroja',
                'description' => 'Dari lokasi cafe alas kita bisa melihat view dan sunrise dengan pemandangan luar biasa.
                 Dan dari suatu titik bisa melihat pemandangan Gunung Sindoro dan Sumbing apabila cuaca sedang cerah,
                 dan pemandangan juga semakin epik dan natural ketika sedang kabut atau mendung. ',            
                'price' => 5000,              
                'rating'=> 4,
                'jam_buka'=> '24 Jam',
                'jarak'=> '12,6 km',
                'fasilitas'=> 'Area parkir, Warung makan atau cafe, Toilet, Mushola, Camping area',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],
            [
                'image' => '',
                'name' => 'Desa Wisata Pesona Kumejing',
                'description' => 'Desa wisata kumejing masuk ke 
                dalam salah satu desa wisata lestari di Kabupaten Wonosobo. Desa di ujung barat Wonosobo, 
                sekitar 46 km dari pusat kota, yang masuk di dalam Kecamatan Wadaslintang ini mempunyai panorama alam Waduk 
                Wadaslintang yang luar biasa indah.',            
                'price' => 15000,              
                'rating'=> 4,
                'jam_buka'=> '09.00-17.00 WIB',
                'jarak'=> '47,5 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola',
                'transportasi'=> 'Roda 2, 4, dan 6',
                'id_category' => 1,
            ],[
                'image' => '',
                'name' => 'lubang Sewu',
                'description' => 'Obyek Wisata Lubangsewu menjadi 
                viral disebabkan keunikan destinasinya yang mirip dengan Grand Canyon yang terletak di utara arizona Amerika Serikat.
                 Landscape alam yang sangat terjal akibat kikisan dari waduk saat musim kemarau tiba, membentuk sebuah fenomena alam 
                 berupa ngarai bertebing pnuh bebatuan putih yang memanjakan mata.',            
                'price' => 5000,              
                'rating'=> 4,
                'jam_buka'=> '24 Jam',
                'jarak'=> '43,7 km',
                'fasilitas'=> 'Area parkir, Warung makan atau cafe, Toilet, Mushola',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 1,
            ],[
                'image' => '',
                'name' => 'Makam Syekh Selomanik                ',
                'description' => 'Syeh Ngabdullah Selomanik adalah penyebar Islam di tanah Dieng. Menurut masyarakat Dieng, dahulu 
                kawasan Dieng ini dihuni dan ditinggali para penganut Hindu. Namun Syeh Selomanik datang dan menyebarkan agama Islam.',            
                'price' => 0,              
                'rating'=> 5,
                'jam_buka'=> '24 Jam',
                'jarak'=> '11 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 3,
            ],[
                'image' => '',
                'name' => 'Makam KH Muntaha',
                'description' => 'KH. Muntaha Al-Hafizh adalah ulama Indonesia yang memiliki julukan Pecinta Al-Quran Sepanjang Hayat,
                 julukan tersebut ia terima karena hampir seluruh hidupnya ia habiskan untuk mendalami dan menyebarkan ajaran al-Quran.',            
                'price' => 0,              
                'rating'=> 5,
                'jam_buka'=> '24 Jam',
                'jarak'=> '5,7 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 3,
            ],[
                'image' => '',
                'name' => 'Makam Syekh Tumenggung                ',
                'description' => 'Curug Winong merupakan air terjun tersembunyi yang ada di Desa Wisata Winongsari, sebuah tempat wisata alam yang menjanjikan
                 keindahan aliran air yang masih alami, Curug Winong memiliki tinggi sekitar 50 meter.',            
                'price' => 0,              
                'rating'=> 5,
                'jam_buka'=> '24 Jam',
                'jarak'=> '5,7 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 3,
            ],[
                'image' => '',
                'name' => 'Makam Ki Ageng Wonosobo',
                'description' => 'Ki Ageng Wanasaba dipercaya dan diyakini sebagai penyiar agama Islam 
                di Kabupaten Wonosobo, yang telah melanglang buana keberbagai tempat dalam rangka mencari ilmu sekaligus berdakwah.',            
                'price' => 0,              
                'rating'=> 5,
                'jam_buka'=> '24 Jam',
                'jarak'=> '600 m',
                'fasilitas'=> 'Mushola, Toilet dan Gazeboarea parkir, Toilet, Mushola',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 3,
            ],[
                'image' => '',
                'name' => 'Kyai Walik',
                'description' => 'Kiai Walik dianggap paling dekat di hati rakyat. 
                Figur pemimpin yang merakyat, disukai sekaligus disegani pada zamannya. 
                Peziarah membaca yasinan dilanjutkan berdoa.',            
                'price' => 0,              
                'rating'=> 5,
                'jam_buka'=> '24 Jam',
                'jarak'=> '3,4 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 3,
            ],[
                'image' => '',
                'name' => 'Kyai Karim',
                'description' => ' Kyai Karim dipercaya sebagai tokoh penting dalam perkembangan wilayah Wonosobo di waktu silam.
                 Konon bersama keluarganya beliau bermukim di Bukit Lowoidjo atau berada di wilayah Desa Kejiwan sekarang .',            
                'price' => 0,              
                'rating'=> 5,
                'jam_buka'=> '24 Jam',
                'jarak'=> '7,5 km',
                'fasilitas'=> 'Area parkir, Toilet, Mushola',
                'transportasi'=> 'Roda 2 dan 4',
                'id_category' => 3,
            ],
        ];
        foreach($data as $d){
            Wisata::create($d);
        }
        
    }
}
