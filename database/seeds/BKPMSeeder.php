<?php

use App\ProfileInvestor;
use App\UserInvestor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BKPMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $investors = [
            [
                'name' => "WANG ZHIFENG",
                'perusahaan' => "Taiqian Fengtai Wood Industry Co., Ltd.",
            ],
            [
                'name' => "SUN LIWEI",
                'perusahaan' => "Shandong Fred Group Co., Ltd.",
            ]
        ];

        foreach ($investors as $investor){
            //dd(str_replace( ' ', '.', strtolower($investor)));
            $email_investor = str_replace( ' ', '.', strtolower($investor['name'])). "@cjip.com";
            $user = UserInvestor::create([
                'name' => $investor['name'],
                'email' => $email_investor,
                'password' => bcrypt('cjibf2019'),
                'remember_token' => Str::random(60),
            ]);

            $profil = ProfileInvestor::create([
                'user_id' => $user->id,
                'investor_name' => $user->name,
                'jabatan' => '-',
                'phone' => '-',
                'nama_perusahaan' => $investor['perusahaan'],
                'bidang_usaha' => '-',
                'alamat' => '-',
                'country' => 'China',
                'badan_hukum' => 'PT',
            ]);
        }
    }
}
