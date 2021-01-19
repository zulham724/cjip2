<?php

namespace App\Exports;

use App\KabKota;
use App\Models\UMKM\Umkm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UmkmNewPerSheetExport implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $kabkota;
    private $year;

    public function __construct($year,$kabkota)
    {
        $this->kabkota = $kabkota;
        $this->year  = $year;
    }

    public function collection()
    {
        //dd(Umkm::where('kab_kota_id', 12)->where('tahun', $this->year)->get());
        return Umkm::where('kab_kota_id', $this->kabkota)->where('tahun', $this->year)->get();
    }

    public function title(): string
    {
        $kab = KabKota::where('id', $this->kabkota)->first();
        return $kab->nama;
    }

    public function headings(): array
    {
        return [
            '#',
            'NIB',
            'Nama Perseroan',
            'Alamat Pendirian',
            'Kab/Kota Id',
            'Jml TKI L',
            'Jml TKI P',
            'KBLI',
            'Total Modal',
            'Jumlah Investasi',
            'Tanggal Terbit OSS',
            'Status PM',
            'Nama Pemegang',
            'Negara Asala',
            'Masa Berlaku',
            'Latitude',
            'Longitude',
            'Kelurahan',
            'Kecamatan',
            'Tahun',
            'Tambahan',
        ];
    }
}
