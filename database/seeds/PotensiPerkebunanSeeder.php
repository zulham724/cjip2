<?php

use App\Perkebunan;
use Illuminate\Database\Seeder;

class PotensiPerkebunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //KAB BANYUMAS 14


        //KAB BANJARNEGARA 12


        //KAB PURBALINGGA 28

        //KAB WONOSOBO 17


        //KAB MAGELANG 32

        //KAB KEBUMEN 25
        $kebun = Perkebunan::create([
            'kab_kota_id' => '25', //kab kebumen
            'komoditas_id' => '2', //teh
            'luas_tanah' => json_encode([
                'luas_tanah' => '1966',
                'satuan' => 'm2'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '1798',
                'satuan' => 'kg/th'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '1897',
                'satuan' => 'kg/th'
            ]),
            'sumber_data' => 'BPS',
            'tahun' => '2018',
        ]);

        //KAB PURWOREJO 9

        //KAB SUKOHARJO 30

        //KAB WONOSOBO 17

        //KAB KARANGANYAR 19

        //KAB GROBOGAN 23

        //KAB BLORA 21

        //KAB SRAGEN 22

        //KAB REMBANG 25

        //KAB KUDUS 10

        //KAB TEMANGGUNG 20

        //KAB KENDAL 16

        //KAB BATANG 27

        //KAB PEKALONGAN 38

        //KAB TEGAL 5

        //KAB PEMALANG 34

        //KOTA SURAKARTA 31

        //KOTA SEMARANG 33

        //KOTA SALATIGA 24

        //KOTA PEKALONGAN 35

        //KOTA TEGAL 11

        //KAB DEMAK 29

        //KAB JEPARA 37

        //KAB PATI 36

        //KAB SEMARANG 4

        //KAB BOYOLALI 7
        $kebun = Perkebunan::create([
            'kab_kota_id' => '7', //kab boyolali
            'komoditas_id' => '16', //kopi
            'luas_tanah' => json_encode([
                'luas_tanah' => '432.30',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '74.51',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'BPS Boyolali',
            'tahun' => '2018',
        ]);
        $kebun = Perkebunan::create([
            'kab_kota_id' => '7', //kab boyolali
            'komoditas_id' => '31', //lada
            'luas_tanah' => json_encode([
                'luas_tanah' => '34.80',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '',
                'satuan' => ''
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'BPS Boyolali',
            'tahun' => '2018',
        ]);
        $kebun = Perkebunan::create([
            'kab_kota_id' => '7', //kab boyolali
            'komoditas_id' => '36', //tembakau
            'luas_tanah' => json_encode([
                'luas_tanah' => '4530.5',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '4162290',
                'satuan' => 'kw/ha'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'BPS Boyolali',
            'tahun' => '2018',
        ]);
        $kebun = Perkebunan::create([
            'kab_kota_id' => '7', //kab boyolali
            'komoditas_id' => '28', //kelapadalam
            'luas_tanah' => json_encode([
                'luas_tanah' => '4299.7',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '46.20',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'BPS Boyolali',
            'tahun' => '2017',
        ]);

        //KAB KLATEN 6

        //KOTA MAGELANG 13

        //KAB BREBES 15

        //KAB CILACAP 8

    }
}
