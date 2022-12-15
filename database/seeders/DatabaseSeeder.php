<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kandungan;
use App\Models\Kegunaan;
use App\Models\Keunggulan;
use App\Models\Kontak;
use App\Models\Petunjuk;
use App\Models\Produk;
use App\Models\Tentang;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = [
            [
                'name'=>'Naufal Ulinnuha',
                'email'=>'admin@naufal.dev',
                'password'=>bcrypt('admin'),
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
        
        $kandungan = [
            ['value'=>'C-Organik : 26,23%'],
            ['value'=>'C/N Ratio : 15,58%'],
            ['value'=>'N : 1,68%'],
            ['value'=>'P205 : 7,99%'],
            ['value'=>'K2O : 1,41%'],
            ['value'=>'Kadar Air : 9,28%'],
            ['value'=>'pH : 8,42'],
        ];
        foreach ($kandungan as $key => $kd) {
            Kandungan::create($kd);
        }

        $kegunaan = [
            ['value'=>'Memperbaiki struktur tanah'],
            ['value'=>'Meningkatkan efisiensi pemupukan'],
            ['value'=>'Aman dan ramah lingkungan'],
            ['value'=>'Bebas dari mikroba patogen dan biji-biji an gulma'],
            ['value'=>'Kadar air rendah, efisiensi dalam pengangkutan dan penyimpanan'],
        ];
        foreach ($kegunaan as $key => $kg) {
            Kegunaan::create($kg);
        }

        $keunggulan = [
            ['value'=>'Kadar C-Organik tinggi'],
            ['value'=>'Berbentuk granul sehingga mudah dalam aplikasi'],
            ['value'=>'Aman & ramah lingkungan'],
            ['value'=>'Bebas biji-bijian gulma'],
            ['value'=>'Kadar air rendah sehingga lebih efisien dalam pengangkutan dan penyerapan'],
            ['value'=>'Dikemas dalam kantong kedap air'],
        ];
        foreach ($keunggulan as $key => $ku) {
            Keunggulan::create($ku);
        }

        $kontak = [
            ['value'=>'Call : (031) 3985543'],
            ['value'=>'Email : kantorpusat@gcs-gresik.com'],
            ['value'=>'Lokasi : Jl. Kig Raya Selatan Blok A5, Karangturi, Randuagung, Kec. Kebomas, Kabupaten Gresik, Jawa Timur.'],
            ['value'=>'https://www.google.com/maps/place/Kantor+Pusat+PT.+Gresik+Cipta+Sejahtera+(PT.+GCS)/@-7.160507,112.63257,16z/data=!4m5!3m4!1s0x0:0x58f54664b2f63ece!8m2!3d-7.1605088!4d112.632569?hl=id'],
        ];
        foreach ($kontak as $key => $kt) {
            Kontak::create($kt);
        }

        $petunjuk = [
            ['value'=>'Pupuk ini diaplikasikan dengan cara disebar di atas permukaan tanah'],
            ['value'=>'Taburkan pupuk organik sejahtera pada permukaan tanah'],
            ['value'=>'Dapat juga dilakukan dengan ditanam dalam tanah'],
            ['value'=>'Jangan digancu'],
            ['value'=>'Berat bersih : 40 Kg'],
        ];
        foreach ($petunjuk as $key => $pt) {
            Petunjuk::create($pt);
        }

        $produk = [
            ['nama'=>'Produk 1','foto'=>'pupuk1.jpg',],
            ['nama'=>'Produk 2','foto'=>'pupuk2.jpg',],
            ['nama'=>'Produk 3','foto'=>'pupuk3.jpg',],
            ['nama'=>'Produk 4','foto'=>'pupuk4.jpg',],
            ['nama'=>'Produk 5','foto'=>'pupuk5.jpeg',],
            ['nama'=>'Produk 6','foto'=>'pupuk6.jpeg',],
        ];
        foreach ($produk as $pr) {
            Produk::create($pr);
        }

        $tentang = [
            ['value'=>'Meningkatkan daya simpan dan daya serap air'],
            ['value'=>'Meningkatkan efisiensi pemupukan'],
            ['value'=>'Memperkaya hara makro & mikro'],
            ['value'=>'Sesuai untuk semua jenis tanah & tanaman'],
        ];
        foreach ($tentang as $key => $tn) {
            Tentang::create($tn);
        }

    }
}
