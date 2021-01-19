<?php

use App\Peternakan;
use Illuminate\Database\Seeder;

class PotensiPeternakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        {


            //KAB BANYUMAS 14


            //KAB BANJARNEGARA 12


            //KAB PURBALINGGA 28

            //KAB WONOSOBO 17


            //KAB MAGELANG 32

            //KAB KEBUMEN 25

            //KAB PURWOREJO 9

            //KAB SUKOHARJO 30

            //KAB WONOGIRI 18

            //KAB KARANGANYAR 19

            //KAB GROBOGAN 23

            //KAB BLORA 21
            $peternakan = Peternakan::create([
                'kab_kota_id' => '21', //kab blora
                'komoditas_id' => '73', //bebek
                'jml_populasi' => json_encode([
                    'jml_populasi' => '98777',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '97666',
                    'satuan' => 'kg/th'
                ]),
                'jml_produksi' => json_encode([
                    'jml_produksi' => '97665',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'BPS',
                'tahun' => '2018',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '21', //kab blora
                'komoditas_id' => '69', //kerbau
                'jml_populasi' => json_encode([
                    'jml_populasi' => '80000',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '75000',
                    'satuan' => 'kg/th'
                ]),
                'jml_produksi' => json_encode([
                    'jml_produksi' => '75000',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'BPS',
                'tahun' => '2018',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '21', //kab blora
                'komoditas_id' => '70', //kambing
                'jml_populasi' => json_encode([
                    'jml_populasi' => '95555',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '95550',
                    'satuan' => 'kg/th'
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '95550',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'BPS',
                'tahun' => '2018',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '21', //kab blora
                'komoditas_id' => '67', //sapi perah
                'jml_populasi' => json_encode([
                    'jml_populasi' => '90000',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '85000',
                    'satuan' => 'kg/th'
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '85000',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'BPS',
                'tahun' => '2018',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '21', //kab blora
                'komoditas_id' => '68', //sapi potong
                'jml_populasi' => json_encode([
                    'jml_populasi' => '95500',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '95000',
                    'satuan' => 'kg/th'
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '95000',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'BPS',
                'tahun' => '2018',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '21', //kab blora
                'komoditas_id' => '72', //ayam petelur
                'jml_populasi' => json_encode([
                    'jml_populasi' => '96665',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '96655',
                    'satuan' => 'kg/th'
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '96655',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'BPS',
                'tahun' => '2018',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '21', //kab blora
                'komoditas_id' => '72', //ayam petelur
                'jml_populasi' => json_encode([
                    'jml_populasi' => '96665',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '96655',
                    'satuan' => 'kg/th'
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '96655',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'BPS',
                'tahun' => '2018',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '21', //kab blora
                'komoditas_id' => '71', //ayam pedaging
                'jml_populasi' => json_encode([
                    'jml_populasi' => '96665',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '96655',
                    'satuan' => 'kg/th'
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '96655',
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
            $peternakan = Peternakan::create([
                'kab_kota_id' => '34', //kab boyolali
                'komoditas_id' => '76', //ayam pedaging
                'jml_populasi' => json_encode([
                    'jml_populasi' => '174',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '',
                    'satuan' => ''
                ]),
                'sumber_data' => 'BPS',
                'tahun' => '2016',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '34', //kab boyolali
                'komoditas_id' => '74', //ayam pedaging
                'jml_populasi' => json_encode([
                    'jml_populasi' => '40757',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '',
                    'satuan' => ''
                ]),
                'sumber_data' => 'BPS',
                'tahun' => '2016',
            ]);

            //KOTA SURAKARTA 31

            //KOTA SEMARANG 33

            //KOTA SALATIGA 24

            //KOTA PEKALONGAN 35

            //KOTA TEGAL 11

            //KAB DEMAK 29
            $peternakan = Peternakan::create([
                'kab_kota_id' => '29', //kab demak
                'komoditas_id' => '73', //bebek
                'jml_populasi' => json_encode([
                    'jml_populasi' => '239.741',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '98777',
                    'satuan' => 'kg/th'
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '239.741',
                    'satuan' => 'ekor'
                ]),
                'sumber_data' => 'Dinas pertanian dan Pangan Kab. Demak',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '29', //kab demak
                'komoditas_id' => '74', //domba
                'jml_populasi' => json_encode([
                    'jml_populasi' => '77.741',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '',
                    'satuan' => ''
                ]),
                'sumber_data' => 'Dinas pertanian dan Pangan Kab. Demak',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '29', //kab demak
                'komoditas_id' => '69', //kerbau
                'jml_populasi' => json_encode([
                    'jml_populasi' => '3.002',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '3.002',
                    'satuan' => 'ekor'
                ]),
                'sumber_data' => 'Dinas pertanian dan Pangan Kab. Demak',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '29', //kab demak
                'komoditas_id' => '70', //kambing
                'jml_populasi' => json_encode([
                    'jml_populasi' => '49.623',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '96665',
                    'satuan' => 'kg/th'
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '96665',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'BPS dan dinas Pertanian dan Pangan Kab Demak',
                'tahun' => '2018',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '29', //kab demak
                'komoditas_id' => '81', //kelinci
                'jml_populasi' => json_encode([
                    'jml_populasi' => '4000',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '4000',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas pertanian dan Pangan Kab. Demak',
                'tahun' => '2018',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '29', //kab demak
                'komoditas_id' => '77', //ayam boiler
                'jml_populasi' => json_encode([
                    'jml_populasi' => '14252200',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '14252200',
                    'satuan' => 'ekor'
                ]),
                'sumber_data' => 'Dinas pertanian dan Pangan Kab. Demak',
                'tahun' => '2018',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '29', //kab demak
                'komoditas_id' => '68', //sapi potong
                'jml_populasi' => json_encode([
                    'jml_populasi' => '5.632',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '96555',
                    'satuan' => 'kg/th'
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '14252200',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'BPS dan Dinas pertanian dan Pangan Kab. Demak',
                'tahun' => '2018',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '29', //kab demak
                'komoditas_id' => '68', //puyuh
                'jml_populasi' => json_encode([
                    'jml_populasi' => '190.400',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '96555',
                    'satuan' => 'kg/th'
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '190.400',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas Pertanian dan Pangan Kab. Demak',
                'tahun' => '2017',
            ]);
            //KAB JEPARA 37

            //KAB PATI 36

            //KAB SEMARANG 4

            //KAB BOYOLALI 7
            $peternakan = Peternakan::create([
                'kab_kota_id' => '7', //kab boyolali
                'komoditas_id' => '79', //itik
                'jml_populasi' => json_encode([
                    'jml_populasi' => '172056',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '',
                    'satuan' => ''
                ]),
                'sumber_data' => 'BPS Boyolali',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '7', //kab boyolali
                'komoditas_id' => '76', //kuda
                'jml_populasi' => json_encode([
                    'jml_populasi' => '303',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '',
                    'satuan' => ''
                ]),
                'sumber_data' => 'BPS Boyolali',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '7', //kab boyolali
                'komoditas_id' => '74', //domba
                'jml_populasi' => json_encode([
                    'jml_populasi' => '48644',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '9668',
                    'satuan' => 'ekor'
                ]),
                'sumber_data' => 'BPS Boyolali',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '7', //kab boyolali
                'komoditas_id' => '69', //kerbau
                'jml_populasi' => json_encode([
                    'jml_populasi' => '841',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '9668',
                    'satuan' => 'ekor'
                ]),
                'sumber_data' => 'BPS Boyolali',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '7', //kab boyolali
                'komoditas_id' => '70', //kambing
                'jml_populasi' => json_encode([
                    'jml_populasi' => '88051',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '2630',
                    'satuan' => 'ekor'
                ]),
                'sumber_data' => 'BPS Boyolali',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '7', //kab boyolali
                'komoditas_id' => '67', //sapi perah
                'jml_populasi' => json_encode([
                    'jml_populasi' => '86363',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '',
                    'satuan' => ''
                ]),
                'sumber_data' => 'BPS Boyolali',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '7', //kab boyolali
                'komoditas_id' => '68', //sapi potong
                'jml_populasi' => json_encode([
                    'jml_populasi' => '86988',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '37769',
                    'satuan' => 'ekor'
                ]),
                'sumber_data' => 'BPS Boyolali',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '7', //kab boyolali
                'komoditas_id' => '72', //ayam petelur
                'jml_populasi' => json_encode([
                    'jml_populasi' => '1872923',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '',
                    'satuan' => ''
                ]),
                'sumber_data' => 'BPS Boyolali',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '7', //kab boyolali
                'komoditas_id' => '71', //ayam pedaging
                'jml_populasi' => json_encode([
                    'jml_populasi' => '3488943',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '',
                    'satuan' => ''
                ]),
                'sumber_data' => 'BPS Boyolali',
                'tahun' => '2017',
            ]);

            //KAB KLATEN 6
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '79', //itik
                'jml_populasi' => json_encode([
                    'jml_populasi' => '373145',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '65613',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '73', //bebek
                'jml_populasi' => json_encode([
                    'jml_populasi' => '373145',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '65613',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '74', //domba
                'jml_populasi' => json_encode([
                    'jml_populasi' => '43662',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '69168',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '69', //kerbau
                'jml_populasi' => json_encode([
                    'jml_populasi' => '606',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '',
                    'satuan' => ''
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '70', //kambing
                'jml_populasi' => json_encode([
                    'jml_populasi' => '88716',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '234414',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '81', //kelinci
                'jml_populasi' => json_encode([
                    'jml_populasi' => '6170',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '285',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '78', //ayam layer
                'jml_populasi' => json_encode([
                    'jml_populasi' => '2836791',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '6627994',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '67', //sapi perah
                'jml_populasi' => json_encode([
                    'jml_populasi' => '6134',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '4098765',
                    'satuan' => 'liter'
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '77', //ayam boiler
                'jml_populasi' => json_encode([
                    'jml_populasi' => '2898344',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '4475371',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '68', //sapi potong
                'jml_populasi' => json_encode([
                    'jml_populasi' => '97954',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '1864400',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '72', //ayam petelur
                'jml_populasi' => json_encode([
                    'jml_populasi' => '2836791',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '6627994',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '80', //puyuh
                'jml_populasi' => json_encode([
                    'jml_populasi' => '427173',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '27356',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            $peternakan = Peternakan::create([
                'kab_kota_id' => '6', //kab boyolali
                'komoditas_id' => '71', //ayam pedaging
                'jml_populasi' => json_encode([
                    'jml_populasi' => '2898344',
                    'satuan' => 'ekor'
                ]),
                'kebutuhan_konsumsi' => json_encode([
                    'kebutuhan_konsumsi' => '',
                    'satuan' => ''
                ]),
                'jml_produksi' =>json_encode([
                    'jml_produksi' => '4475371',
                    'satuan' => 'kg/th'
                ]),
                'sumber_data' => 'Dinas Pertanian, Ketahanan Pangan dan Perikanan',
                'tahun' => '2017',
            ]);
            //KOTA MAGELANG 13

            //KAB BREBES 15

            //KAB CILACAP 8

        }
    }

}
