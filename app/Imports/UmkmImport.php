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
use phpDocumentor\Reflection\Types\Object_;

class UmkmImport implements ToCollection, WithHeadingRow, WithChunkReading
{

    private $kabkota=null;
    private $tahun= null;
    private $dataToStore;

    public function __construct($kabkota, $tahun)
    {
        $this->kabkota=$kabkota;
        $this->tahun=$tahun;
    }
    public function collection(Collection $rows)
    {
        $trimmed = collect();

        //dd(count($rows));

        foreach ($rows as $row){
            //dd($row);

            switch ($row['kabkota_proyek']){
                case 'Kota Pekalongan' :
                    $kab = 1;
                    break;
                case 'Kota Semarang' :
                    $kab = 2;
                    break;
                case 'Kota Salatiga' :
                    $kab = 3;
                    break;
                case 'Kota Magelang' :
                    $kab = 4;
                    break;
                case 'Kota Surakarta' :
                    $kab = 5;
                    break;
                case 'Kota Tegal' :
                    $kab = 6;
                    break;
                case 'Kab. Pekalongan' :
                    $kab = 7;
                    break;
                case 'Kab. Jepara' :
                    $kab = 8;
                    break;
                case 'Kab. Pati' :
                    $kab = 9;
                    break;
                case 'Kab. Pemalang' :
                    $kab = 10;
                    break;
                case 'Kab. Magelang':
                    $kab = 11;
                    break;
                case 'Kab. Sukoharjo' :
                    $kab = 12;
                    break;
                case 'Kab. Demak' :
                    $kab = 13;
                    break;
                case 'Kab. Purbalingga' :
                    $kab = 14;
                    break;
                case 'Kab. Batang' :
                    $kab = 15;
                    break;
                case 'Kab. Rembang' :
                    $kab = 16;
                    break;
                case 'Kab. Kebumen' :
                    $kab = 17;
                    break;
                case 'Kab. Grobogan':
                    $kab = 18;
                    break;
                case 'Kab. Sragen' :
                    $kab = 19;
                    break;
                case 'Kab. Blora' :
                    $kab = 20;
                    break;
                case 'Kab. Temanggung' :
                    $kab = 21;
                    break;
                case 'Kab. Karanganyar' :
                    $kab = 22;
                    break;
                case 'Kab. Wonogiri' :
                    $kab = 23;
                    break;
                case 'Kab. Wonosobo' :
                    $kab = 24;
                    break;
                case 'Kab. Kendal' :
                    $kab = 25;
                    break;
                case 'Kab. Brebes' :
                    $kab = 26;
                    break;
                case 'Kab. Banyumas' :
                    $kab = 27;
                    break;
                case 'Kab. Banjarnegara' :
                    $kab = 28;
                    break;
                case 'Kab. Kudus' :
                    $kab = 29;
                    break;
                case 'Kab. Purworejo' :
                    $kab = 30;
                    break;
                case 'Kab. Cilacap' :
                    $kab = 31;
                    break;
                case 'Kab. Boyolali' :
                    $kab = 32;
                    break;
                case 'Kab. Klaten' :
                    $kab = 33;
                    break;
                case 'Kab. Tegal' :
                    $kab = 34;
                    break;
                case 'Kab. Semarang' :
                    $kab = 35;
                    break;

            }
            // dd($row['jumlah_investasi'] <= 500000000);
            $trim_kbli = preg_replace("/[^0-9,]/", "", isset($row['kbli']));
            $kbli = collect();
            $umkm = $trimmed->where('nib', $row['nib'])->first();
            //dd($umkm);
            //dd($row);
            //dd(isset($umkm));
            $kblis = preg_split ("/\,/", $trim_kbli);
            foreach ($kblis as $k){
                if (!in_array($k, $kbli->toArray())){
                    $kbli->push($k);
                }
            }

            dd($kbli);
            if (isset($umkm)){
                $cek = $umkm['nib'] !== $row['nib'];
                //dd($cek);
                if ($row['nilai_investasi'] <= 500000000 and $row['jenis_perusahaan'] !== 'PT' and $cek == true){
                    //dd(json_encode($kbli));
                    $nilai_investasi = array(
                        'nilai_investasi' => $row['nilai_investasi'],
                        'tahun' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_nib'])->format('Y')
                    );
                    //dd(array_sum($nilai_investasi['nilai_investasi']));
                    $tambahan = array(
                        'jenis' => null,
                        'nilai_tambahan' => null,
                        'tahun' => null,
                    );

                    //dd((array_sum(array_column($tambahan, 'nilai_tambahan'))));
                    $total = array(
                        'total' => $row['nilai_investasi']
                    );

                    $merge = array(
                        'nilai_investasi' => $nilai_investasi,
                        'tambahan' => $tambahan,
                        'total' => $total
                    );
                    $data = array(
                        'nib' => $row['nib'],
                        'nama_perusahaan' => $row['nama_perusahaan'],
                        'jenis_perusahaan' => $row['jenis_perusahaan'],
                        'alamat' => $row['alamat_proyek'],
                        'kab_kota_id' => $kab,
                        'tenaga_kerja' => $row['tenaga_kerja'],
                        'kbli' => json_encode($kbli),
                        'jumlah_investasi' => $row['nilai_investasi'],
                        'tgl_terbit_oss' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_nib']),
                        'status_pm' => $row['status_pm'],
                        'kecamatan' => $row['kecamatan_proyek'],
                        'kelurahan' => $row['kelurahan_proyek'],
                        'tahun' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_nib'])->format('Y'),
                        'uraian_usaha' => $row['uraian_usaha'],
                        'status_nib' => $row['status_nib'],
                        'is_kawasan_industri' => $row['is_kawasan_industri'],
                        'investasi' => json_encode($merge)
                    );
                    $trimmed->push($data);
                    //dd($data);
                }
            }
            else{
                if ($row['nilai_investasi'] <= 500000000 and $row['jenis_perusahaan'] !== 'PT'){
                    //dd(json_encode($kbli));
                    $nilai_investasi = array(
                        'nilai_investasi' => $row['nilai_investasi'],
                        'tahun' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_nib'])->format('Y')
                    );
                    //dd(array_sum($nilai_investasi['nilai_investasi']));
                    $tambahan = array(
                        'jenis' => null,
                        'nilai_tambahan' => null,
                        'tahun' => null,
                    );

                    //dd((array_sum(array_column($tambahan, 'nilai_tambahan'))));
                    $total = array(
                        'total' => $row['nilai_investasi']
                    );

                    $merge = array(
                        'nilai_investasi' => $nilai_investasi,
                        'tambahan' => $tambahan,
                        'total' => $total
                    );
                    $data = array(
                        'nib' => $row['nib'],
                        'nama_perusahaan' => $row['nama_perusahaan'],
                        'jenis_perusahaan' => $row['jenis_perusahaan'],
                        'alamat' => $row['alamat_proyek'],
                        'kab_kota_id' => $kab,
                        'tenaga_kerja' => $row['tenaga_kerja'],
                        'kbli' => json_encode($kbli),
                        'jumlah_investasi' => $row['nilai_investasi'],
                        'tgl_terbit_oss' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_nib']),
                        'status_pm' => $row['status_pm'],
                        'kecamatan' => $row['kecamatan_proyek'],
                        'kelurahan' => $row['kelurahan_proyek'],
                        'tahun' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_nib'])->format('Y'),
                        'uraian_usaha' => $row['uraian_usaha'],
                        'status_nib' => $row['status_nib'],
                        'is_kawasan_industri' => $row['is_kawasan_industri'],
                        'investasi' => json_encode($merge)
                    );
                    $trimmed->push($data);
                    //dd($data);
                }
            }


        }

        //dd($trimmed->take(15));
        //dd(count($trimmed));
        $this->dataToStore = $trimmed;
        return $this->olah($trimmed);
        //dd($this->dataToStore[0]);
    }

    public function chunkSize(): int
    {
        return 50000;
    }

    /*public function dataToStore()
    {
        //dd($this->dataToStore);
        return $this->dataToStore;
    }*/

    public function olah($trimmed)
    {
        //dd($trimmed);
        $client = new \GuzzleHttp\Client();
        //dd(count($trimmed));
        $trim = array(
            'Kab',
            'Kota',
            'Kabupaten',
            '.',
            ','
        );

        foreach ($trimmed as $umkm){
            //dd($umkm);
            //dd(count($umkmStore));
            $umkmcek = Umkm::where('nib', $umkm['nib'])->first();
            //dump($umkmcek->nib !== $umkm['nib']);
            $store = new Umkm();
            //dd(isset($umkmcek));
            /*if ($umkm['kecamatan'] !== null){
                $response = $client->request('GET', 'http://mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$umkm['kecamatan'].str_replace($trim, '', $umkm['kota']).' Jawa Tengah'.'&maxResults=1');
            }
            elseif ($umkm['kecamatan'] == null && $umkm['kelurahan'] !== null){
                $response = $client->request('GET', 'http://mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$umkm['kelurahan'].'+'.str_replace($trim, '', $umkm['kota']).' Jawa Tengah'.'&maxResults=1');
            }
            elseif ($umkm['kecamatan'] == null && $umkm['kelurahan'] == null && $umkm['kota'] !== null){
                $response = $client->request('GET', 'http://mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$umkm['kota'].'+'.str_replace($trim, '', $umkm['kota']).' Jawa Tengah'.'&maxResults=1');
            }*/

            //dd($response);

            //$response = $client->request('GET', 'http://open.mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$umkm['kelurahan'].' '.$umkm['kecamatan'].' '.$umkm['kota']);
            //dd($response);
            /*$response->getStatusCode(); // 200
            $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
            $coordinate = json_decode($response->getBody(), JSON_PRETTY_PRINT);*/

            //dump($coordinate['results'][0]['locations']);
            //dump($coordinate);
            /*$coord = $coordinate['results'][0]['locations'][0]['latLng'];
            $lng = $coord['lng'];
            $lat = $coord['lat'];*/


            //sleep(1);
            //dump($kbli !== $row['kelompok']);

                $rowcek = Umkm::where('nib', $umkm['nib'])->first();
                $store = new Umkm();
                if ($umkm['jumlah_investasi'] <= 500000000 || $umkm['jumlah_investasi'] == null){
                    /*$data = array(
                        'nib' => $row['nib'],
                        'nama_perusahaan' => $row['nama_perusahaan'],
                        'alamat' => $row['alamat_proyek'],
                        'kab_kota_id' => $this->kabkota,
                        'tenaga_kerja' => $row['tenaga_kerja'],
                        'kbli' => $row['kbli'],
                        'nilai_investasi' => $row['nilai_investasi'],
                        'tanggal_nib' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_nib']),
                        'status_pm' => $row['status_pm'],
                        'status_nib' => $row['status_nib'],
                        'is_kawasan_industri' => $row['is_kawasan_industri'],
                        'uraian_usaha' => $row['uraian_usaha'],
                        'kecamatan' => $row['kecamatan_proyek'],
                        'kelurahan' => $row['kelurahan_proyek'],
                        'kota' => $row['kabkota_proyek'],
                        'tahun' => $this->tahun,
                    );
                    $trimmed->push($data);*/

                    if (isset($rowcek)) {
                        if ($rowcek->nib !== $umkm['nib']) {
                            $store->nib = $umkm['nib'];
                            $store->nama_perusahaan = $umkm['nama_perusahaan'];
                            $store->jenis_perusahaan = $umkm['jenis_perusahaan'];
                            $store->alamat = $umkm['alamat'];
                            $store->kab_kota_id = $umkm['kab_kota_id'];
                            $store->tenaga_kerja = $umkm['tenaga_kerja'];
                            $store->kbli = $umkm['kbli'];
                            $store->jumlah_investasi = $umkm['jumlah_investasi'];
                            $store->tgl_terbit_oss = $umkm['tgl_terbit_oss'];
                            $store->status_pm = $umkm['status_pm'];
                            $store->lat = 0 /*$lat*/;
                            $store->lng = 0 /*$lng*/;
                            $store->kelurahan = $umkm['kelurahan'];
                            $store->kecamatan = $umkm['kecamatan'];
                            $store->tahun = $umkm['tgl_terbit_oss']->format('Y');
                            $store->status_nib = $umkm['status_nib'];
                            $store->is_kawasan_industri = $umkm['is_kawasan_industri'];
                            $store->uraian_usaha = $umkm['uraian_usaha'];
                            $store->investasi = $umkm['investasi'];
                            //dump($store);
                            //dd($store);
                            $store->save();
                        }
                        else{
                            if ($rowcek->jumlah_investasi < $umkm['nilai_investasi']) {
                                $rowcek->nama_perusahaan = $umkm['nama_perusahaan'];
                                $rowcek->jenis_perusahaan = $umkm['jenis_perusahaan'];
                                $rowcek->alamat = $umkm['alamat'];
                                $rowcek->kab_kota_id = $umkm['kab_kota_id'];
                                $rowcek->tenaga_kerja = $umkm['tenaga_kerja'];
                                $rowcek->kbli = $umkm['kbli'];
                                $rowcek->jumlah_investasi = $umkm['jumlah_investasi'];
                                $rowcek->tgl_terbit_oss = $umkm['tgl_terbit_oss'];
                                $rowcek->status_pm = $umkm['status_pm'];
                                $rowcek->lat = 0 /*$lat*/;
                                $rowcek->lng = 0 /*$lng*/;
                                $rowcek->kelurahan = $umkm['kelurahan'];
                                $rowcek->kecamatan = $umkm['kecamatan'];
                                $rowcek->tahun = $umkm['tgl_terbit_oss']->format('Y');
                                $rowcek->status_nib = $umkm['status_nib'];
                                $rowcek->is_kawasan_industri = $umkm['is_kawasan_industri'];
                                $rowcek->uraian_usaha = $umkm['uraian_usaha'];
                                $rowcek->investasi = $umkm['investasi'];
                                //dump($store);
                                //dd($rowcek);
                                $rowcek->update();

                            }
                        }
                    }
                    else{
                        $store->nib = $umkm['nib'];
                        $store->nama_perusahaan = $umkm['nama_perusahaan'];
                        $store->jenis_perusahaan = $umkm['jenis_perusahaan'];
                        $store->alamat = $umkm['alamat'];
                        $store->kab_kota_id = $umkm['kab_kota_id'];
                        $store->tenaga_kerja = $umkm['tenaga_kerja'];
                        $store->kbli = $umkm['kbli'];
                        $store->jumlah_investasi = $umkm['jumlah_investasi'];
                        $store->tgl_terbit_oss =$umkm['tgl_terbit_oss'];
                        $store->status_pm = $umkm['status_pm'];
                        $store->lat = 0 /*$lat*/;
                        $store->lng = 0 /*$lng*/;
                        $store->kelurahan = $umkm['kelurahan'];
                        $store->kecamatan = $umkm['kecamatan'];
                        $store->tahun = $umkm['tgl_terbit_oss']->format('Y');
                        $store->status_nib = $umkm['status_nib'];
                        $store->is_kawasan_industri = $umkm['is_kawasan_industri'];
                        $store->uraian_usaha = $umkm['uraian_usaha'];
                        $store->investasi = $umkm['investasi'];
                        //dd($store);
                        $store->save();
                    }
                    //dump($data);
                }

        }


        return redirect()->route('show.umkm-baru')->with('success', 'berhasil');
    }

}
