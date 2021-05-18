<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Spc_variabelController extends Controller
{
    public function xmr_individuals()
    {
        $path_url = explode('-',"Jakarta_Bus-Bus_Schedule_Planning-24_hours-17-05-2021.txt");
        $url = Storage::url($path_url[0].'/'.$path_url[1].'/'.Session::get('file'));
        $csvFile = public_path($url);
        $file_handle = fopen($csvFile, 'r');
        $data = [];
        while (  ($line_of_text = fgetcsv($file_handle,1024,'	')) !== false ) {
            $data[]  = $line_of_text ;
        }

        $jumlah = 0;
        for ($i=1; $i <count($data) ; $i++) {
            $hasil[] = $data[$i];
            $jumlah += floatval($data[$i][1]);
        }

        for ($j=0; $j <count($hasil) ; $j++) {
            $hasil2[] = $j == 0 ? 0 : abs($hasil[$j][1] - $hasil[$j-1][1]);
            $hasil3[] = floatval($hasil[$j][1]);
        }

        $rata_rata_r = array_sum($hasil2) / (count($hasil2) - 1);
        $c = $rata_rata_r;
        $ucl = 3.267*$c;
        $lcl = 0*$c;

        $rata_rata_x = array_sum($hasil3) / count($hasil3);
        $c2 = $rata_rata_x;
        $ucl2 = $c2 + (2.660 * $c);
        $lcl2 = $c2 - (2.660 * $c);

        // dd($hasil2, $hasil3);

        return view('spc_variabel.xmr_individuals',compact('hasil','hasil2','c','ucl','lcl','c2','ucl2','lcl2'));
    }

    public function xmr_median_r()
    {
        $path_url = explode('-',"Jakarta_Bus-Bus_Schedule_Planning-24_hours-17-05-2021.txt");
        $url = Storage::url($path_url[0].'/'.$path_url[1].'/'.Session::get('file'));
        $csvFile = public_path($url);
        $file_handle = fopen($csvFile, 'r');
        $data = [];
        while (  ($line_of_text = fgetcsv($file_handle,1024,'	')) !== false ) {
            $data[]  = $line_of_text ;
        }

        $jumlah = 0;
        for ($i=1; $i <count($data) ; $i++) {
            $hasil[] = $data[$i];
            $jumlah += floatval($data[$i][1]);
        }

        for ($j=0; $j <count($hasil) ; $j++) {
            $hasil2[] = $j == 0 ? 0 : abs($hasil[$j][1] - $hasil[$j-1][1]);
            $hasil2_urut[] = $j == 0 ? 0 : abs($hasil[$j][1] - $hasil[$j-1][1]);
            $hasil3[] = floatval($hasil[$j][1]);
        }

        sort($hasil2_urut);

        for($i = 1;  $i < count($hasil2_urut); $i++ ){

            $hasil_urut[] = $hasil2_urut[$i];
        }


        $tengah=(count($hasil_urut)-1)/2;
        if ((count($hasil_urut)-1)>1)
        {
            if ((count($hasil_urut))%2==0)
            {
                $median=($hasil_urut[$tengah+1]+$hasil_urut[$tengah])/2;
            }
            else
            {
                $median=$hasil_urut[$tengah];
                // dd($median);
            }
        }


        $c = $median;
        $ucl = 3.865*$c;
        $lcl = 0;

        $rata_rata_x = array_sum($hasil3) / count($hasil3);
        $c2 = $rata_rata_x;
        $ucl2 = $c2 + (3.145 * $c);
        $lcl2 = $c2 - (3.145 * $c);

        // dd($hasil2, $hasil3);

        return view('spc_variabel.xmr_median_r',compact('hasil','hasil2','c','ucl','lcl','c2','ucl2','lcl2'));
    }

    public function xmr_trend()
    {
        $path_url = explode('-',"Jakarta_Bus-Bus_Schedule_Planning-24_hours-17-05-2021.txt");
        $url = Storage::url($path_url[0].'/'.$path_url[1].'/'.Session::get('file'));
        $csvFile = public_path($url);
        $file_handle = fopen($csvFile, 'r');
        $data = [];
        while (  ($line_of_text = fgetcsv($file_handle,1024,'	')) !== false ) {
            $data[]  = $line_of_text ;
        }

        $jumlah = 0;
        for ($i=1; $i <count($data) ; $i++) {
            $hasil[] = $data[$i];
            $jumlah += floatval($data[$i][1]);
        }

        for ($j=0; $j <count($hasil) ; $j++) {
            $hasil2[] = $j == 0 ? 0 : abs($hasil[$j][1] - $hasil[$j-1][1]);
            $hasil3[] = floatval($hasil[$j][1]);
            $t[] = $j + 1;
            $tx[] =  ($j + 1) * floatval($hasil[$j][1]);
            $isi_data[] = floatval($hasil[$j][1]);

            $t2[] = pow(($j + 1), 2);
        }

        $slope = (array_sum($tx) - ((array_sum($t) * array_sum($isi_data))/count($t))) / (array_sum($t2) - (pow(array_sum($t),2)/count($t)));
        $bvalue = (array_sum($isi_data) / count($isi_data)) - ($slope * (array_sum($t)/count($t)));




        $rata_rata_r = array_sum($hasil2) / (count($hasil2) - 1);
        $c = $rata_rata_r;
        $ucl = 3.267*$c;
        $lcl = 0*$c;

        for ($k=0; $k <count($t) ; $k++) {
            $c2[] = $slope * $t[$k] + $bvalue;
            $ucl2[] = $c2[$k] + 2.66 * $c;
            $lcl2[] = $c2[$k] - 2.66 * $c;
        }

        // dd($hasil2, $hasil3);

        return view('spc_variabel.xmr_trend',compact('hasil','hasil2','c','ucl','lcl','c2','ucl2','lcl2'));
    }
}



