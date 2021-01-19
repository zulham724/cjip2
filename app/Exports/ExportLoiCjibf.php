<?php


namespace App\Exports;


use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExportLoiCjibf implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {
        $sheets = [];


            $sheets[] = new ExportAllLoi();
            $sheets[] = new LoiNegara();
            $sheets[] = new LoiSektor();
            $sheets[] = new LoiLokasi();


        return $sheets;
    }
}