<?php

namespace App\Imports;

use App\Models\UMKM\Kbli;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class KbliImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row){

            $kbli = Kbli::where('kelompok', $row['kelompok'])->first();
            //dd($rows[1]);
            if (isset($kbli)){
                if ($kbli->kelompok !== $row['kelompok']){
                    //dd($row['kelompok']);
                    Kbli::create([
                        'kelompok' => $row['kelompok'],
                        'judul_kelompok' => $row['judul_kelompok'],
                        'desk_kelompok' => $row['deskripsi_kelompok']
                    ]);
                }
                else{
                    Kbli::create([
                        'kelompok' => $row['kelompok'],
                        'judul_kelompok' => $row['judul_kelompok'],
                        'desk_kelompok' => $row['deskripsi_kelompok']
                    ]);
                }
            }
            else{
                Kbli::create([
                    'kelompok' => $row['kelompok'],
                    'judul_kelompok' => $row['judul_kelompok'],
                    'desk_kelompok' => $row['deskripsi_kelompok']
                ]);
            }



            //dump($kbli !== $row['kelompok']);
        }
        //die();

    }

    public function headingRow(): int
    {
        return 2;
    }


}
