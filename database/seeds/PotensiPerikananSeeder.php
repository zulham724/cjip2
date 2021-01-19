<?php

use App\Perikanan;
use Illuminate\Database\Seeder;

class PotensiPerikananSeeder extends Seeder
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
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '49', //cumi
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '121.5',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '54', //teri
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '6.8',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '40', //bawal
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '26.9',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '50', //kakap
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '14.3',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '42', //udang
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '9.2',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '48', //belaanak
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '4.7',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '53', //rajungan
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '10.7',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '66', //kerapu
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '23',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => 'Rp 14028',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '64', //kembung
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '52.2',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => 'Rp 1318000',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '65', //manyung
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '300.9',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => 'Rp 4387000',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '62', //tengiri
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '56',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '61', //tongkol
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '166.2',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '36', //kab pati
            'komoditas_id' => '61', //tongkol
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '166.2',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '',
                'satuan' => ''
            ]),
            'sumber_data' => 'Kabupaten Dalam Angka Tahun 2017',
            'tahun' => '2017',
        ]);


        //KAB SEMARANG 4

        //KAB BOYOLALI 7
        $ikan = Perikanan::create([
            'kab_kota_id' => '7', //kab pati
            'komoditas_id' => '41', //lele
            'luas_perairan' => json_encode([
                'luas_perairan' => '',
                'satuan' => ''
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '57',
                'satuan' => 'ton'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '700',
                'satuan' => 'kg/th'
            ]),
            'sumber_data' => '',
            'tahun' => '2017',
        ]);

        //KAB KLATEN 6
        $ikan = Perikanan::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '41', //lele
            'luas_perairan' => json_encode([
                'luas_perairan' => '136059',
                'satuan' => 'm2'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '6616391',
                'satuan' => 'kg/th'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '48.63',
                'satuan' => 'm2'
            ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2017',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '44', //nila
            'luas_perairan' => json_encode([
                'luas_perairan' => '235663',
                'satuan' => 'm2'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '14809.447',
                'satuan' => 'kg/th'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '62.84',
                'satuan' => 'm2'
            ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2017',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '40', //bawal
            'luas_perairan' => json_encode([
                'luas_perairan' => '21165',
                'satuan' => 'm2'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '2438810',
                'satuan' => 'kg/th'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '115.23',
                'satuan' => 'm2'
            ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2017',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '92', //patin
            'luas_perairan' => json_encode([
                'luas_perairan' => '1124',
                'satuan' => 'm2'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '9988',
                'satuan' => 'kg/th'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '8.89',
                'satuan' => 'm2'
            ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2017',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '39', //gurami
            'luas_perairan' => json_encode([
                'luas_perairan' => '38145',
                'satuan' => 'm2'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '1155333',
                'satuan' => 'kg/th'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '30.29',
                'satuan' => 'm2'
            ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2017',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '60', //ikan mas
            'luas_perairan' => json_encode([
                'luas_perairan' => '10013',
                'satuan' => 'm2'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '24875',
                'satuan' => 'kg/th'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '2.48',
                'satuan' => 'm2'
            ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2016',
        ]);
        $ikan = Perikanan::create([
            'kab_kota_id' => '6', //kab klaten
            'komoditas_id' => '43', //ikan sidat
            'luas_perairan' => json_encode([
                'luas_perairan' => '1100',
                'satuan' => 'm2'
            ]),
            'jml_produksi' => json_encode([
                'jml_produktifitas' => '45751',
                'satuan' => 'kg/th'
            ]),
            'produktifitas' =>json_encode([
                'produktifitas' => '41.59',
                'satuan' => 'm2'
            ]),
            'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
            'tahun' => '2016',
        ]);

        //KOTA MAGELANG 13

        //KAB BREBES 15

        //KAB CILACAP 8


    }
}
