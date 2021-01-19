<?php

use App\Pertanian;
use Illuminate\Database\Seeder;

class PotensiPertanianSeeder extends Seeder
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
        $pertanian = Pertanian::create([
            'kab_kota_id' => '32', //kab klaten
            'komoditas_id' => '1', //padi
            'luas_tanah' => json_encode([
                'luas_tanah' => '59364',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '354966',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '354966',
                'satuan' => 'ton'
            ]),
            'sumber_data' => 'Dinas Pertanian (olah)',
            'tahun' => '2014',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '32', //kab klaten
            'komoditas_id' => '1', //padi
            'luas_tanah' => json_encode([
                'luas_tanah' => '57579',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '345883',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '345883',
                'satuan' => 'ton'
           ]),
            'sumber_data' => 'Dinas Pertanian (olah)',
            'tahun' => '2015',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '32', //kab klaten
            'komoditas_id' => '5', //cabai
            'luas_tanah' => json_encode([
                'luas_tanah' => '3.917',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '239.0883',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '239.088',
                'satuan' => 'ton'
           ]),
            'sumber_data' => 'Dinas Pertanian (olah)',
            'tahun' => '2014',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '32', //kab klaten
            'komoditas_id' => '5', //cabai
            'luas_tanah' => json_encode([
                'luas_tanah' => '3.855',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '252.371',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '252.371',
                'satuan' => 'ton'
           ]),
            'sumber_data' => 'Dinas Pertanian (olah)',
            'tahun' => '2015',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '32', //kab klaten
            'komoditas_id' => '2', //jagung
            'luas_tanah' => json_encode([
                'luas_tanah' => '10970',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '62869',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '62869',
                'satuan' => 'ton'
           ]),
            'sumber_data' => 'Dinas Pertanian (olah)',
            'tahun' => '2015',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '32', //kab klaten
            'komoditas_id' => '2', //jagung
            'luas_tanah' => json_encode([
                'luas_tanah' => '12535',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '74187',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '74187',
                'satuan' => 'ton'
           ]),
            'sumber_data' => 'Dinas Pertanian (olah)',
            'tahun' => '2014',
        ]);

        //KAB KEBUMEN 25

        //KAB PURWOREJO 9

        //KAB SUKOHARJO 30

        //KAB WONOGIRI 18
        $pertanian = Pertanian::create([
            'kab_kota_id' => '18', //kab klaten
            'komoditas_id' => '1', //padi
            'luas_tanah' => json_encode([
                'luas_tanah' => '60937',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '55',
                'satuan' => 'kw/ha'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '55',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'BPS',
            'tahun' => '2018',
        ]);

        //KAB KARANGANYAR 19

        //KAB GROBOGAN 23

        //KAB BLORA 21
        $pertanian = Pertanian::create([
            'kab_kota_id' => '21', //kab blora
            'komoditas_id' => '1', //padi
            'luas_tanah' => json_encode([
                'luas_tanah' => '1037',
                'satuan' => 'm2'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '1037',
                'satuan' => 'kg/th'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '1037',
                'satuan' => 'kg/th'
           ]),
            'sumber_data' => 'BPS',
            'tahun' => '2018',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '21', //kab blora
            'komoditas_id' => '2', //jagung
            'luas_tanah' => json_encode([
                'luas_tanah' => '47199',
                'satuan' => 'm2'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '245085',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '5193',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'BPS',
            'tahun' => '2018',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '21', //kab blora
            'komoditas_id' => '15', //kedelai
            'luas_tanah' => json_encode([
                'luas_tanah' => '6079',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '15269',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '2512',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'BPS',
            'tahun' => '2018',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '21', //kab blora
            'komoditas_id' => '7', //kacang hijau
            'luas_tanah' => json_encode([
                'luas_tanah' => '1983',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '1916',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '966',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'BPS',
            'tahun' => '2018',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '21', //kab blora
            'komoditas_id' => '4', //kacang tanah
            'luas_tanah' => json_encode([
                'luas_tanah' => '2184',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '3231',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '1479',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'BPS',
            'tahun' => '2018',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '21', //kab blora
            'komoditas_id' => '3', //ketela pohon
            'luas_tanah' => json_encode([
                'luas_tanah' => '1304',
                'satuan' => 'm2'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '1304',
                'satuan' => 'kg/th'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '1304',
                'satuan' => 'kg/th'
           ]),
            'sumber_data' => 'BPS',
            'tahun' => '2018',
        ]);

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
        $pertanian = Pertanian::create([
            'kab_kota_id' => '31', //kota surakarta
            'komoditas_id' => '1', //padi
            'luas_tanah' => json_encode([
                'luas_tanah' => '195',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '1352',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '69.86',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'BPS - Surakarta dalam Angka',
            'tahun' => '2015',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '31', //kota surakarta
            'komoditas_id' => '1', //padi
            'luas_tanah' => json_encode([
                'luas_tanah' => '203',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '1337.7 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '65.83',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'BPS - Surakarta dalam Angka',
            'tahun' => '2016',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '31', //kota surakarta
            'komoditas_id' => '1', //padi
            'luas_tanah' => json_encode([
                'luas_tanah' => '2060000',
                'satuan' => 'm2'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '1337700 ',
                'satuan' => 'kg/th'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '6583',
                'satuan' => 'kg/th'
           ]),
            'sumber_data' => 'BPS - Surakarta dalam Angka',
            'tahun' => '2018',
        ]);

        //KOTA SEMARANG 33

        //KOTA SALATIGA 24

        //KOTA PEKALONGAN 35

        //KOTA TEGAL 11

        //KAB DEMAK 29
        $pertanian = Pertanian::create([
            'kab_kota_id' => '29', //kab klaten
            'komoditas_id' => '1', //padi
            'luas_tanah' => json_encode([
                'luas_tanah' => '991.884',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '643.942 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '643.942',
                'satuan' => 'ton'
           ]),
            'sumber_data' => 'Dinas pertanian dan Pangan Kab. Demak',
            'tahun' => '2017',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '29', //kab klaten
            'komoditas_id' => '2', //jagung
            'luas_tanah' => json_encode([
                'luas_tanah' => '26.326',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '198.232 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '198.232',
                'satuan' => 'ton'
           ]),
            'sumber_data' => 'Dinas pertanian dan Pangan Kab. Demak',
            'tahun' => '2017',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '29', //kab klaten
            'komoditas_id' => '13', //jambu air
            'luas_tanah' => json_encode([
                'luas_tanah' => '109.902',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '9.980 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '9.980',
                'satuan' => 'ton'
           ]),
            'sumber_data' => 'Dinas pertanian dan Pangan Kab. Demak',
            'tahun' => '2017',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '29', //kab klaten
            'komoditas_id' => '14', //belimbing
            'luas_tanah' => json_encode([
                'luas_tanah' => '',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '2709.5 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '2709.5',
                'satuan' => 'ton'
           ]),
            'sumber_data' => 'Dinas pertanian dan Pangan Kab. Demak',
            'tahun' => '2017',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '29', //kab klaten
            'komoditas_id' => '12', //bawang merah
            'luas_tanah' => json_encode([
                'luas_tanah' => '6.128',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '599.050 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '599.050',
                'satuan' => 'ton'
           ]),
            'sumber_data' => 'Dinas pertanian dan Pangan Kab. Demak',
            'tahun' => '2017',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '29', //kab klaten
            'komoditas_id' => '7', //kacang hijau
            'luas_tanah' => json_encode([
                'luas_tanah' => '25.977',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '36.663 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '36.663',
                'satuan' => 'ton'
           ]),
            'sumber_data' => 'Dinas pertanian dan Pangan Kab. Demak',
            'tahun' => '2017',
        ]);


        //KAB JEPARA 37

        //KAB PATI 36

        //KAB SEMARANG 4

        //KAB BOYOLALI 7

        //KAB KLATEN 6
        $pertanian = Pertanian::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '1', //padi
            'luas_tanah' => json_encode([
                'luas_tanah' => '74965',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '380268 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '51.41',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2017',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '5', //cabai
            'luas_tanah' => json_encode([
                'luas_tanah' => '559',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '595.7 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '10.65',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2017',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '2', //jagung
            'luas_tanah' => json_encode([
                'luas_tanah' => '11713',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '90343 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '81.50',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2018',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '15', //kedelai
            'luas_tanah' => json_encode([
                'luas_tanah' => '2562',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '4440 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '1987',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2018',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '12', //bawang merah
            'luas_tanah' => json_encode([
                'luas_tanah' => '11',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '26.2 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '32.91',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2017',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '7', //kacang hijau
            'luas_tanah' => json_encode([
                'luas_tanah' => '240',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '285 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '12.50',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2017',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '4', //kacang tanah
            'luas_tanah' => json_encode([
                'luas_tanah' => '955',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '1527 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '16.79',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2017',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '3', //ketela pohon
            'luas_tanah' => json_encode([
                'luas_tanah' => '395',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '9778 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '224.99',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2017',
        ]);
        $pertanian = Pertanian::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '6', //kacang rambat
            'luas_tanah' => json_encode([
                'luas_tanah' => '337',
                'satuan' => 'Ha'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '665 ',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '19.73',
                'satuan' => 'kw/ha'
           ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2017',
        ]);

        //KOTA MAGELANG 13

        //KAB BREBES 15

        //KAB CILACAP 8

    }
}
