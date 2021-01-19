<?php

namespace App\Imports;

use App\KabKota;
use App\Models\UMKM\Kbli;
use App\Models\UMKM\Umkm;
use Illuminate\Support\Carbon as CarbonAlias;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TrimUmkmImport implements ToCollection, WithHeadingRow, WithChunkReading
{

    private $kabkota=null;
    private $tahun= null;
    public function __construct($kabkota, $tahun)
    {
        $this->kabkota=$kabkota;
        $this->tahun=$tahun;
    }
    public function collection(Collection $rows)
    {
        $client = new \GuzzleHttp\Client();
        foreach ($rows as $row){
            $trim_kbli = preg_replace("/[^0-9,]/", "", $row['kbli']);
            //dump($trim_kbli);
            $kbli = collect();
            $kblis = preg_split ("/\,/", $trim_kbli);
            foreach ($kblis as $k){
                if (!in_array($k, $kbli->toArray())){
                    $kbli->push($k);
                }
            }

            //dd(json_encode($kbli));
            //dd($row);
            if ($row['jumlah_investasi'] <= 500000000){
                $umkm = Umkm::where('nib', $row['nib'])->first();

                //dd($rows[1]);
                if (isset($umkm)){
                    if ($row['kecamatan'] !== null){
                        $response = $client->request('GET', 'http://open.mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$row['kecamatan']);
                        $response->getStatusCode(); // 200
                        $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
                        $coordinate = json_decode($response->getBody(), JSON_PRETTY_PRINT);
                        //dd(count($coordinate['results'][0]['locations']));
                        //dd($coordinate);

                        for ($i=0;$i<count($coordinate['results'][0]['locations']);$i++){
                            //dump($coordinate['results'][0]['locations'][$i]['adminArea3'] == 'Central Java');
                            $coord = $coordinate['results'][0]['locations'][$i]['latLng'];
                            if ($coordinate['results'][0]['locations'][$i]['adminArea3'] == 'Central Java'){

                                $lng = $coord['lng'];
                                $lat = $coord['lat'];
                            }
                            else{
                                $response = $client->request('GET', 'http://open.mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$row['kelurahan']);
                                $response->getStatusCode(); // 200
                                $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
                                $coordinate = json_decode($response->getBody(), JSON_PRETTY_PRINT);
                                for ($i=0;$i<count($coordinate['results'][0]['locations']);$i++){
                                    //dump($coordinate['results'][0]['locations'][$i]['adminArea3'] == 'Central Java');
                                    $coord = $coordinate['results'][0]['locations'][$i]['latLng'];
                                    if ($coordinate['results'][0]['locations'][$i]['adminArea3'] == 'Central Java'){

                                        $lng = $coord['lng'];
                                        $lat = $coord['lat'];
                                    }
                                    else{
                                        $response = $client->request('GET', 'http://open.mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$row['kab_kota']);
                                        $response->getStatusCode(); // 200
                                        $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
                                        $coordinate = json_decode($response->getBody(), JSON_PRETTY_PRINT);
                                        for ($y=0;$y<count($coordinate['results'][0]['locations']);$y++){
                                            $coord = $coordinate['results'][0]['locations'][$y]['latLng'];
                                            if ($coordinate['results'][0]['locations'][$y]['adminArea3'] == 'Central Java'){

                                                $lng = $coord['lng'];
                                                $lat = $coord['lat'];
                                            }
                                        }
                                    }
                                    //dd($coordinate);
                                }
                            }
                            //dd($coordinate);
                        }
                        //dd($lat);
                        //die();

                    }
                    else{
                        $lat = 0;
                        $lng = 0;
                    }
                    if ($umkm->nib !== $row['nib']){
                        //dd($row['kelompok']);

                        Umkm::create([
                            'nib' => $row['nib'],
                            'nama_perseroan' => $row['nama_perseroan'],
                            'alamat_pendirian' => $row['alamat_pendirian'],
                            'nama_pendaftar' => $row['nama_pendaftar'],
                            'kab_kota_id' => $this->kabkota,
                            'jumlah_tki' => $row['jumlah_tki_l'],
                            'jumlah_tka' => $row['jumlah_tki_p'],
                            'kbli' => json_encode($kbli),
                            'total_modal' => $row['total_modal'],
                            'jumlah_investasi' => $row['jumlah_investasi'],
                            'tgl_terbit_oss' => CarbonAlias::createFromFormat('Y-m-d', $row['tanggal_terbit_oss']),
                            'status_pm' => $row['status_penanaman_modal'],
                            'nama_pemegang_saham' => $row['nama_pemegang_saham'],
                            'lat' => $lat,
                            'lng' => $lng,
                            'tahun' => $this->tahun,
                        ]);
                    }
                    else{
                        if ($umkm->jumlah_investasi < $row['jumlah_investasi']){
                            $umkm->nama_perseroan = $row['nama_perseroan'];
                            $umkm->alamat_pendirian = $row['alamat_pendirian'];
                            $umkm->nama_pendaftar = $row['nama_pendaftar'];
                            $umkm->kab_kota_id = $this->kabkota;
                            $umkm->jumlah_tki = $row['jumlah_tki_l'];
                            $umkm->jumlah_tka = $row['jumlah_tki_p'];
                            $umkm->kbli = json_encode($kbli);
                            $umkm->total_modal = $row['total_modal'];
                            $umkm->jumlah_investasi = $row['jumlah_investasi'];
                            $umkm->tgl_terbit_oss = CarbonAlias::createFromFormat('Y-m-d', $row['tanggal_terbit_oss']);
                            $umkm->status_pm = $row['status_penanaman_modal'];
                            $umkm->nama_pemegang_saham = $row['nama_pemegang_saham'];
                            $umkm->lat = $lat;
                            $umkm->lng = $lng;
                            $umkm->tahun = $this->tahun;
                            $umkm->update();
                        }
                    }
                }
                else{
                    if ($row['kecamatan'] !== null){
                        $response = $client->request('GET', 'http://open.mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$row['kecamatan']);
                        $response->getStatusCode(); // 200
                        $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
                        $coordinate = json_decode($response->getBody(), JSON_PRETTY_PRINT);
                        //dd(count($coordinate['results'][0]['locations']));
                        //dd($coordinate);

                        for ($i=0;$i<count($coordinate['results'][0]['locations']);$i++){
                            //dump($coordinate['results'][0]['locations'][$i]['adminArea3'] == 'Central Java');
                            $coord = $coordinate['results'][0]['locations'][$i]['latLng'];
                            if ($coordinate['results'][0]['locations'][$i]['adminArea3'] == 'Central Java'){

                                $lng = $coord['lng'];
                                $lat = $coord['lat'];
                            }
                            else{
                                $response = $client->request('GET', 'http://open.mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$row['kelurahan']);
                                $response->getStatusCode(); // 200
                                $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
                                $coordinate = json_decode($response->getBody(), JSON_PRETTY_PRINT);
                                for ($i=0;$i<count($coordinate['results'][0]['locations']);$i++){
                                    //dump($coordinate['results'][0]['locations'][$i]['adminArea3'] == 'Central Java');
                                    $coord = $coordinate['results'][0]['locations'][$i]['latLng'];
                                    if ($coordinate['results'][0]['locations'][$i]['adminArea3'] == 'Central Java'){

                                        $lng = $coord['lng'];
                                        $lat = $coord['lat'];
                                    }
                                    else{
                                        $response = $client->request('GET', 'http://open.mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$row['kab_kota']);
                                        $response->getStatusCode(); // 200
                                        $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
                                        $coordinate = json_decode($response->getBody(), JSON_PRETTY_PRINT);
                                        for ($y=0;$y<count($coordinate['results'][0]['locations']);$y++){
                                            $coord = $coordinate['results'][0]['locations'][$y]['latLng'];
                                            if ($coordinate['results'][0]['locations'][$y]['adminArea3'] == 'Central Java'){

                                                $lng = $coord['lng'];
                                                $lat = $coord['lat'];
                                            }
                                        }
                                    }
                                    //dd($coordinate);
                                }
                            }
                            //dd($coordinate);
                        }
                        //dd($lat);
                        //die();

                    }
                    else{
                        $lat = 0;
                        $lng = 0;
                    }
                    Umkm::create([
                        'nib' => $row['nib'],
                        'nama_perseroan' => $row['nama_perseroan'],
                        'alamat_pendirian' => $row['alamat_pendirian'],
                        'nama_pendaftar' => $row['nama_pendaftar'],
                        'kab_kota_id' => $this->kabkota,
                        'jumlah_tki' => $row['jumlah_tki_l'],
                        'jumlah_tka' => $row['jumlah_tki_p'],
                        'kbli' => json_encode($kbli),
                        'total_modal' => $row['total_modal'],
                        'jumlah_investasi' => $row['jumlah_investasi'],
                        'tgl_terbit_oss' => CarbonAlias::createFromFormat('Y-m-d', $row['tanggal_terbit_oss']),
                        'status_pm' => $row['status_penanaman_modal'],
                        'nama_pemegang_saham' => $row['nama_pemegang_saham'],
                        'lat' => $lat,
                        'lng' => $lng,
                        'tahun' => $this->tahun,
                    ]);
                }
            }

            sleep(1);
            //dump($lat.'-'.$lng);
        }
        //die();

    }

    public function chunkSize(): int
    {
        return 1000;
    }


}
