<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include "ProductDescriptions.php";

        DB::table('products')->insert([
            [
                'name'=>'iPhone 13 Pro',
                'model'=>null,
                'price'=>'350',
                'description'=>$product_descriptions['iphone-13'],
                'stock'=>'100',
                'category_id'=>'1',
                'seller_id'=>'3',
                'gallery'=>'/images/iphone-13.webp'
            ],
            [
                'name'=>'Panasonic Tv',
                'model'=>null,
                'price'=>'499.99',
                'description'=>$product_descriptions['panasonic_tv'],
                'stock'=>'10',
                'category_id'=>'2',
                'seller_id'=>'3',
                'gallery'=>'/images/panasonic-tv.webp'
            ],
            [
                'name'=>'Sony Tv',
                'model'=>null,
                'price'=>'850',
                'description'=>$product_descriptions['sony_tv'],
                'stock'=>'5',
                'category_id'=>'2',
                'seller_id'=>'3',
                'gallery'=>'/images/sony-tv.webp'
            ],
            [
                'name'=>'Longboard',
                'model'=>null,
                'price'=>'249.99',
                'description'=>$product_descriptions['longboard'],
                'stock'=>'3',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/longboard.webp'
            ],
            [
                'name'=>'Cinelli King Zydeco',
                'model'=>null,
                'price'=>'2988',
                'description'=>$product_descriptions['cinelli_king_zydeco'],
                'stock'=>'2',
                'category_id'=>'3',
                'seller_id'=>'3',
                'gallery'=>'/images/bici.webp'
            ],
            [
                'name'=>'Trenta e Lode',
                'model'=>null,
                'price'=>'1000',
                'description'=>$product_descriptions['trenta_e_lode'],
                'stock'=>'999',
                'category_id'=>'3',
                'seller_id'=>'3',
                'gallery'=>'/images/trenta.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to the Sun',
                'price'=>'250',
                'description'=>$product_descriptions['omega_x_swatch_sun'],
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_sun.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to the Moon',
                'price'=>'250',
                'description'=>$product_descriptions['omega_x_swatch_moon'],
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_moon.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Mercury',
                'price'=>'250',
                'description'=>$product_descriptions['omega_x_swatch_mercury'],
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_mercury.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Venus',
                'price'=>'250',
                'description'=>$product_descriptions['omega_x_swatch_venus'],
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_venus.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission on Earth',
                'price'=>'250',
                'description'=>$product_descriptions['omega_x_swatch_earth'],
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_earth.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Mars',
                'price'=>'250',
                'description'=>$product_descriptions['omega_x_swatch_mars'],
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_mars.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Jupiter',
                'price'=>'250',
                'description'=>$product_descriptions['omega_x_swatch_jupiter'],
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_jupiter.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Saturn',
                'price'=>'250',
                'description'=>$product_descriptions['omega_x_swatch_saturn'],
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_saturn.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Uranus',
                'price'=>'250',
                'description'=>$product_descriptions['omega_x_swatch_uranus'],
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_uranus.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Neptune',
                'price'=>'250',
                'description'=>$product_descriptions['omega_x_swatch_neptune'],
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_neptune.webp'
            ],
            [
                'name'=>'Omega x Swatch Speedmaster',
                'model'=>'Mission to Pluto',
                'price'=>'250',
                'description'=>$product_descriptions['omega_x_swatch_pluto'],
                'stock'=>'20',
                'category_id'=>'3',
                'seller_id'=>'5',
                'gallery'=>'/images/swatch_pluto.webp'
            ],
            [
                'name'=>'Kensington Docking Station',
                'model'=>'Thunderbolt 4',
                'price'=>'284.90',
                'description'=>$product_descriptions['kensington_docking_station'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/docking_station.webp',
            ],
            [
                'name'=>'Caldigit Cavo Thunderbolt 4',
                'model'=>'0.8 m',
                'price'=>'79.99',
                'description'=>$product_descriptions['caldigit_cavo_thunderbolt_4'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/caldigit_cavo_thunderbolt_4.webp',
            ],
            [
                'name'=>'Borsone The North Face',
                'model'=>'Medium',
                'price'=>'120.00',
                'description'=>$product_descriptions['borsone_north_face'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/borsone_north_face.webp',
            ],
            [
                'name'=>'Arteza Tappetino da Taglio',
                'model'=>'61 x 91 cm, spessore 3mm',
                'price'=>'33.99',
                'description'=>$product_descriptions['tappetino_da_taglio'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/tappetino_da_taglio_arteza.webp',
            ],
            [
                'name'=>'Lampada da scrivania LED',
                'model'=>'1100lm',
                'price'=>'55.99',
                'description'=>$product_descriptions['lampada_led_scrivania'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/lampada_scrivania_eyocean.webp',
            ],
            [
                'name'=>'Tastiera Pieghevole Wireless',
                'model'=>null,
                'price'=>'32.99',
                'description'=>$product_descriptions['tastiera_pieghevole_wireless'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/moko_tastiera_wireless_pieghevole.webp',
            ],
            [
                'name'=>'Max Cases - Trolley Ermetico',
                'model'=>'620 x 460 x 340 mm',
                'price'=>'216.10',
                'description'=>$product_descriptions['max_cases_trolley_620_460_340'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/max_cases_trolley_ermetico_620_460_340.webp',
            ],
            [
                'name'=>'Max Cases - Trolley Ermetico',
                'model'=>'538 x 405 x 245 mm',
                'price'=>'164.42',
                'description'=>$product_descriptions['max_cases_trolley_538_405_245'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/max_cases_trolley_ermetico_538_405_245.webp',
            ],
            [
                'name'=>'Cucchiaini lunghi in acciaio inox',
                'model'=>'17 cm - 8 pezzi',
                'price'=>'9.59',
                'description'=>$product_descriptions['cucchiaini_lunghi_inox'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/cucchiaini_lunghi_inox.webp',
            ],
            [
                'name'=>'Sony 24-105 mm F4 Serie G',
                'model'=>'SEL-24105G',
                'price'=>'1126.13',
                'description'=>$product_descriptions['sony_SEL_24105G'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/sony_sel24105g.webp',
            ],
            [
                'name'=>'Fenix PD36R',
                'model'=>null,
                'price'=>'92.77',
                'description'=>$product_descriptions['fenix_pd36r'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/fenix_pd36r.webp',
            ],
            [
                'name'=>'Lexar Scheda UHS-I SDXC 633x',
                'model'=>'128 GB',
                'price'=>'27.57',
                'description'=>$product_descriptions['lexar_uhs_128gb'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/lexar_128gb_uhs.webp',
            ],
            [
                'name'=>'Bonelle caramelle ai frutti di bosco',
                'model'=>'1 Kg',
                'price'=>'5.99',
                'description'=>$product_descriptions['caramelle_bonelle'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/caramelle_bonelle.webp',
            ],
            [
                'name'=>'Penna Tombow Airpress',
                'model'=>'Black',
                'price'=>'10.26',
                'description'=>$product_descriptions['tombow_airpress_black'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/tombow_airpress_black.webp',
            ],
            [
                'name'=>'Penna Tombow Airpress',
                'model'=>'Green',
                'price'=>'12.80',
                'description'=>$product_descriptions['tombow_airpress_green'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/tombow_airpress_green.webp',
            ],
            [
                'name'=>'Penna Tombow Airpress',
                'model'=>'Yellow',
                'price'=>'13.58',
                'description'=>$product_descriptions['tombow_airpress_yellow'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/tombow_airpress_yellow.webp',
            ],
            [
                'name'=>'Sony WF-1000XM4',
                'model'=>'White',
                'price'=>'219.00',
                'description'=>$product_descriptions['sony_wf_1000xm4'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/sony_wf_1000xm4.webp',
            ],
            [
                'name'=>'Sony WH-1000XM4',
                'model'=>'White',
                'price'=>'279.99',
                'description'=>$product_descriptions['sony_wh_1000xm4'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/sony_wh_1000xm4.webp',
            ],
            [
                'name'=>'Bose 700',
                'model'=>'Black',
                'price'=>'265.00',
                'description'=>$product_descriptions['bose_700'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/bose_700_black.webp',
            ],
            [
                'name'=>'Sennheiser HD 660 S',
                'model'=>'Black',
                'price'=>'401.97',
                'description'=>$product_descriptions['sennheiser_hd_660_s'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/sennheiser_hd_660_s.webp',
            ],
            [
                'name'=>'Bose QC45',
                'model'=>'Black',
                'price'=>'269.00',
                'description'=>$product_descriptions['bose_qc45'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/bose_qc45.webp',
            ],
            [
                'name'=>'Sennheiser Momentum 3 Wireless',
                'model'=>'Sandy White',
                'price'=>'318.00',
                'description'=>$product_descriptions['sennheiser_momentum_3'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/sennheiser_momentum_3.webp',
            ],
            [
                'name'=>'Rode NT USB',
                'model'=>'',
                'price'=>'135.00',
                'description'=>$product_descriptions['rode_nt_usb'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/rode_nt_usb.webp',
            ],
            [
                'name'=>'Rode Podcaster',
                'model'=>'',
                'price'=>'180.00',
                'description'=>$product_descriptions['rode_nt_usb'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/rode_podcaster_usb.webp',
            ],
            [
                'name'=>'Shure SM7B',
                'model'=>'',
                'price'=>'355.00',
                'description'=>$product_descriptions['shure_sm7b'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/shure_sm7b.webp',
            ],
            [
                'name'=>'Borraccia 24Bottles',
                'model'=>'500 ml',
                'price'=>'20.00',
                'description'=>$product_descriptions['borraccia_24bottles'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/borraccia_24bottles.webp',
            ],
            [
                'name'=>'Drop ALT mechanical keyboard',
                'model'=>null,
                'price'=>'180',
                'description'=>$product_descriptions['drop_alt_mechanical_keyboard'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/drop_alt.webp',
            ],
            [
                'name'=>'Drop CTRL mechanical keyboard',
                'model'=>null,
                'price'=>'220',
                'description'=>$product_descriptions['drop_ctrl_mechanical_keyboard'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/drop_ctrl.webp',
            ],
            [
                'name'=>'Logitech G502',
                'model'=>null,
                'price'=>'39.99',
                'description'=>$product_descriptions['logitech_g502'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/logitech_g502.webp',
            ],
            [
                'name'=>'Logitech G902',
                'model'=>null,
                'price'=>'79.99',
                'description'=>$product_descriptions['logitech_g902'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/logitech_g902.webp',
            ],
            [
                'name'=>'Logitech MX Master',
                'model'=>null,
                'price'=>'67.00',
                'description'=>$product_descriptions['logitech_mx_master'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/logitech_mx_master.webp',
            ],
            [
                'name'=>'Astuccio Eastpack',
                'model'=>'Nero',
                'price'=>'9.99',
                'description'=>$product_descriptions['astuccio_eastpack'],
                'stock'=>'4',
                'category_id'=>'3',
                'seller_id'=>'1',
                'gallery'=>'/images/astuccio_eastpack.webp',
            ],
        ]);

        $imgs_folder = 'database/seeders/imgs/';
        $imgs = [
            'lg-fridge.webp',
            'iphone-13.webp',
            'panasonic-tv.webp',
            'sony-tv.webp',
            'longboard.webp',
            'trenta.webp',
            'bici.webp',
            'swatch_earth.webp',
            'swatch_jupiter.webp',
            'swatch_mars.webp',
            'swatch_mercury.webp',
            'swatch_moon.webp',
            'swatch_neptune.webp',
            'swatch_pluto.webp',
            'swatch_saturn.webp',
            'swatch_sun.webp',
            'swatch_uranus.webp',
            'swatch_venus.webp',
            'docking_station.webp',
            'caldigit_cavo_thunderbolt_4.webp',
            'borsone_north_face.webp',
            'tappetino_da_taglio_arteza.webp',
            'caramelle_bonelle.webp',
            'cucchiaini_lunghi_inox.webp',
            'fenix_pd36r.webp',
            'lampada_scrivania_eyocean.webp',
            'lexar_128gb_uhs.webp',
            'max_cases_trolley_ermetico_538_405_245.webp',
            'max_cases_trolley_ermetico_620_460_340.webp',
            'moko_tastiera_wireless_pieghevole.webp',
            'sony_sel24105g.webp',
            'tombow_airpress_black.webp',
            'tombow_airpress_green.webp',
            'tombow_airpress_yellow.webp',
            'sony_wf_1000xm4.webp',
            'sony_wh_1000xm4.webp',
            'drop_alt_keyboard.webp',
            'drop_ctrl_keyboard.webp',
            'sennheiser_hd_660_s.webp',
            'sennheiser_momentum_3.webp',
            'rode_nt_usb.webp',
            'rode_podcaster_usb.webp',
            'shure_sm7b.webp',
            'borraccia_24bottles.webp',
            'bose_700_black.webp',
            'bose_qc45.webp',
            'drop_alt.webp',
            'drop_ctrl.webp',
            'logitech_g502.webp',
            'logitech_g902.webp',
            'logitech_mx_master.webp',
            'astuccio_eastpack.webp',
        ];

        foreach ($imgs as $img) {
            File::copy($imgs_folder . $img, Storage::path("images/" . $img));
        }
    }
}
