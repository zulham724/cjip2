<?php

use App\CjibfInvestor;
use App\UserInvestor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CjibfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*//C4 Surakarta
        $user = CjibfInvestor::create([
            'kab_kota_id' => 31,
            'profile_id' => 202,
            'meja_id' => 'C4',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 31,
            'profile_id' => 203,
            'meja_id' => 'C4',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 31,
            'profile_id' => 204,
            'meja_id' => 'C4',
            'sektor_interest' => 'Manufacture',
        ]);

        //C8 Wonosobo
        $user = CjibfInvestor::create([
            'kab_kota_id' => 17,
            'profile_id' => 205,
            'meja_id' => 'C8',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 17,
            'profile_id' => 206,
            'meja_id' => 'C8',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 17,
            'profile_id' => 248,
            'meja_id' => 'C8',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 17,
            'profile_id' => 219,
            'meja_id' => 'C8',
            'sektor_interest' => 'Manufacture',
        ]);


        //C9 Blora
        $user = CjibfInvestor::create([
            'kab_kota_id' => 27,
            'profile_id' => 207,
            'meja_id' => 'C9',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 27,
            'profile_id' => 208,
            'meja_id' => 'C9',
            'sektor_interest' => 'Manufacture',
        ]);

        //D1 Banyumas
        $user = CjibfInvestor::create([
            'kab_kota_id' => 14,
            'profile_id' => 209,
            'meja_id' => 'D1',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 14,
            'profile_id' => 250,
            'meja_id' => 'D1',
            'sektor_interest' => 'Manufacture',
        ]);

        //D7 Klaten
        $user = CjibfInvestor::create([
            'kab_kota_id' => 6,
            'profile_id' => 210,
            'meja_id' => 'D7',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 6,
            'profile_id' => 249,
            'meja_id' => 'D7',
            'sektor_interest' => 'Manufacture',
        ]);

        //D8 Grobogan
        $user = CjibfInvestor::create([
            'kab_kota_id' => 23,
            'profile_id' => 212,
            'meja_id' => 'D8',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 23,
            'profile_id' => 213,
            'meja_id' => 'D8',
            'sektor_interest' => 'Manufacture',
        ]);

        //D9 Kota Pekalongan
        $user = CjibfInvestor::create([
            'kab_kota_id' => 35,
            'profile_id' => 247,
            'meja_id' => 'D9',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 35,
            'profile_id' => 214,
            'meja_id' => 'D9',
            'sektor_interest' => 'Manufacture',
        ]);

        //E1 Kota Pekalongan
        $user = CjibfInvestor::create([
            'kab_kota_id' => 12,
            'profile_id' => 215,
            'meja_id' => 'E1',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 12,
            'profile_id' => 216,
            'meja_id' => 'E1',
            'sektor_interest' => 'Manufacture',
        ]);

        //E3 Wonogiri
        $user = CjibfInvestor::create([
            'kab_kota_id' => 18,
            'profile_id' => 217,
            'meja_id' => 'E3',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 18,
            'profile_id' => 234,
            'meja_id' => 'E3',
            'sektor_interest' => 'Manufacture',
        ]);

        //E10 Tegal
        $user = CjibfInvestor::create([
            'kab_kota_id' => 34,
            'profile_id' => 221,
            'meja_id' => 'E10',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 34,
            'profile_id' => 222,
            'meja_id' => 'E10',
            'sektor_interest' => 'Manufacture',
        ]);

        //F1 Salatiga
        $user = CjibfInvestor::create([
            'kab_kota_id' => 24,
            'profile_id' => 223,
            'meja_id' => 'F1',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 24,
            'profile_id' => 224,
            'meja_id' => 'F1',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 24,
            'profile_id' => 225,
            'meja_id' => 'F1',
            'sektor_interest' => 'Manufacture',
        ]);*/

        //F3 Purbalingga
        $user = CjibfInvestor::create([
            'kab_kota_id' => 28,
            'profile_id' => 269,
            'meja_id' => 'F3',
            'sektor_interest' => 'Manufacture',
        ]);
        $user = CjibfInvestor::create([
            'kab_kota_id' => 28,
            'profile_id' => 270,
            'meja_id' => 'F3',
            'sektor_interest' => 'Manufacture',
        ]);

        /* //F4 Kudus
         $user = CjibfInvestor::create([
             'kab_kota_id' => 10,
             'profile_id' => 227,
             'meja_id' => 'F4',
             'sektor_interest' => 'Manufacture',
         ]);
         $user = CjibfInvestor::create([
             'kab_kota_id' => 10,
             'profile_id' => 211,
             'meja_id' => 'F4',
             'sektor_interest' => 'Manufacture',
         ]);
         $user = CjibfInvestor::create([
             'kab_kota_id' => 10,
             'profile_id' => 245,
             'meja_id' => 'F4',
             'sektor_interest' => 'Manufacture',
         ]);
         $user = CjibfInvestor::create([
             'kab_kota_id' => 10,
             'profile_id' => 229,
             'meja_id' => 'F4',
             'sektor_interest' => 'Manufacture',
         ]);

         //F8 Demak
         $user = CjibfInvestor::create([
             'kab_kota_id' => 29,
             'profile_id' => 230,
             'meja_id' => 'F8',
             'sektor_interest' => 'Manufacture',
         ]);
         $user = CjibfInvestor::create([
             'kab_kota_id' => 29,
             'profile_id' => 231,
             'meja_id' => 'F8',
             'sektor_interest' => 'Manufacture',
         ]);
         $user = CjibfInvestor::create([
             'kab_kota_id' => 29,
             'profile_id' => 232,
             'meja_id' => 'F8',
             'sektor_interest' => 'Manufacture',
         ]);

         //F9 kab Pekalongan
         $user = CjibfInvestor::create([
             'kab_kota_id' => 38,
             'profile_id' => 233,
             'meja_id' => 'F9',
             'sektor_interest' => 'Manufacture',
         ]);
         $user = CjibfInvestor::create([
             'kab_kota_id' => 38,
             'profile_id' => 235,
             'meja_id' => 'F9',
             'sektor_interest' => 'Manufacture',
         ]);

         //G2 Sukoharjo
         $user = CjibfInvestor::create([
             'kab_kota_id' => 30,
             'profile_id' => 236,
             'meja_id' => 'G2',
             'sektor_interest' => 'Manufacture',
         ]);
         $user = CjibfInvestor::create([
             'kab_kota_id' => 30,
             'profile_id' => 237,
             'meja_id' => 'G2',
             'sektor_interest' => 'Manufacture',
         ]);
         $user = CjibfInvestor::create([
             'kab_kota_id' => 30,
             'profile_id' => 238,
             'meja_id' => 'G2',
             'sektor_interest' => 'Manufacture',
         ]);



         //G9 brebes
         $user = CjibfInvestor::create([
             'kab_kota_id' => 15,
             'profile_id' => 239,
             'meja_id' => 'G9',
             'sektor_interest' => 'Manufacture',
         ]);
         $user = CjibfInvestor::create([
             'kab_kota_id' => 15,
             'profile_id' => 240,
             'meja_id' => 'G9',
             'sektor_interest' => 'Manufacture',
         ]);

         //C1 temanggung
         $user = CjibfInvestor::create([
             'kab_kota_id' => 20,
             'profile_id' => 241,
             'meja_id' => 'C1',
             'sektor_interest' => 'Manufacture',
         ]);
         $user = CjibfInvestor::create([
             'kab_kota_id' => 20,
             'profile_id' => 242,
             'meja_id' => 'C1',
             'sektor_interest' => 'Manufacture',
         ]);
         $user = CjibfInvestor::create([
             'kab_kota_id' => 20,
             'profile_id' => 243,
             'meja_id' => 'C1',
             'sektor_interest' => 'Manufacture',
         ]);
         $user = CjibfInvestor::create([
             'kab_kota_id' => 20,
             'profile_id' => 246,
             'meja_id' => 'C1',
             'sektor_interest' => 'Manufacture',
         ]);

         //D9 kota pekalongan
         $user = CjibfInvestor::create([
             'kab_kota_id' => 35,
             'profile_id' => 244,
             'meja_id' => 'D9',
             'sektor_interest' => 'Manufacture',
         ]);

         //C10 blora
         $user = CjibfInvestor::create([
             'kab_kota_id' => 21,
             'profile_id' => 218,
             'meja_id' => 'C10',
             'sektor_interest' => 'Manufacture',
         ]);*/
    }
}
