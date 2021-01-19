<?php

namespace App\Exports;

use App\KabKota;
use App\Models\UMKM\Umkm;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UmkmNewExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $year;
    protected $kabkota;

    public function __construct($year)
    {
        $this->year = $year;
        //dd($this->kabkota);
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $this->kabkota = KabKota::all();
        //dd($this->kabkota);
        $sheets = [];

            foreach ($this->kabkota as $kab){
                //dd($kab);
            $sheets[] = new UmkmNewPerSheetExport($this->year, $kab->id);
            }


        return $sheets;
    }
}
