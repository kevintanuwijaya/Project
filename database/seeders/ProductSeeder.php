<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryId = [1, 2, 2, 3, 3, 3, 1, 3, 2, 1];
        $name = ['SONY BRAVIA XR 8K', 'ASUS TUF F15', 'ROG Strix G17 G713QM-R936G7G-O', 'APPLE IPHONE 13 PRO', 'ONEPLUS 9', 'GOOGLE PIXEL 5 5G', '55" QN700A Neo QLED 8K Smart TV (2021)', 'SAMSUNG GALAXY S21', 'ROG Strix SCAR 15 G533QM-R936D6T-O', '65" QN800A Neo QLED 8K Smart TV (2021)'];
        $price = [149999999, 15499999, 29999999, 18999999, 9499999, 10999999, 28999999, 12999999, 30999999 , 69999999];
        $description = ['Zona LED menyala atau redup secara terpisah untuk kecerahan dan detail bayangan yang realistis
                        Cognitive Processor XR™ memahami cara manusia melihat dan mendengar untuk terhanyut sepenuhnya
                        Suara selaras dengan gambar untuk pengalaman yang menghanyutkan
                        Dudukan multiposisi sehingga penempatan TV lebih fleksibel',
                        'Windows 10 Home - ASUS recommends Windows 10 Pro for business
                        Up to GeForce RTX™ 3060
                        Up to Intel® Core™ i9-11900H
                        Up to 15.6” FHD 240Hz 100% sRGB
                        Dual 83-Blade Fans',
                        'GeForce RTX™ 3060 Laptop GPU
                        Windows 10 Home
                        AMD Ryzen™ 9 5000 Series
                        17.3"
                        1TB M.2 NVMe™ PCIe® 3.0 SSD',
                        'Chip A15 Bionic
                        Layar Super Retina XDR dengan ProMotion 6,1 inci (diagonal) dengan resolusi 2532 x 1170 piksel pada 460 ppi
                        Sistem kamera Pro 12 MP: kamera Telefoto, Wide, dan Ultra Wide',
                        'Operating System: OxygenOS based on Android™ 11
                        CPU: Qualcomm® Snapdragon™ 888
                        5G Chipset: X60
                        GPU: Adreno 660
                        RAM: 8GB LPDDR5
                        Storage: 128GB UFS 3.1 2-LANE
                        Battery: 4,500 mAh (2S1P 2,250 mAh, non-removable)',
                        'CPU: Qualcomm® Snapdragon™ 765G
                        GPU: Adreno 620
                        RAM: 6 GB LPDDR4x RAM · 128 GB storage
                        Storage: 128 GB storage
                        Battery: 4620 mAh',
                        'Quantum Matrix Technology Pro
                        Neo Quantum Processor Lite 8K
                        OTS+
                        Infinity One Design',
                        'CPU Speed: 2.9GHz, 2.8GHz, 2.2GHz
                        Screen: Dynamic AMOLED 2X
                        Rear Camera: 12.0 MP + 64.0 MP + 12.0 MP
                        RAM: 8GB
                        Storage: 128GB',
                        'GeForce RTX™ 3060 Laptop GPU
                        Windows 10 Home
                        AMD Ryzen™ 9 5000 Series
                        15.6"
                        1TB M.2 NVMe™ PCIe® 3.0 SSD',
                        'Quantum Matrix Technology Pro
                        Neo Quantum Processor 8K
                        OTS+
                        Infinity One Design'
                    ];
        $picture = ['Bravia8K.jpg', 'TUFF15.jpg', 'ROGStrixG17.jpg', 'Iphone13Pro.jpg', 'OnePlus9.jpg', 'pixel5.jpg', 'samsung8K55TV.jpg', 'S21.jpg', 'ROGStrixSCARG15.jpg', 'samsung8K65TV.jpg'];
        $length = count($name);
        for($i=0; $i<$length; $i++){
            Product::create([
                'category_id' => $categoryId[$i],
                'name' => $name[$i],
                'price' => $price[$i],
                'description' => $description[$i],
                'picture' => $picture[$i]
            ]);
        }
    }
}
