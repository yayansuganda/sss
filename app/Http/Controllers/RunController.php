<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RunController extends Controller
{
    public function run_average()
    {
        $csvFile = public_path('testing.csv');
        $file_handle = fopen($csvFile, 'r');
        $data = [];
        while (  ($line_of_text = fgetcsv($file_handle,1024,';')) !== false ) {
            $data[]  = $line_of_text ;
        }

        $jumlah = 0;
        for ($i=1; $i <count($data) ; $i++) {
            $hasil[] = $data[$i];
            $jumlah += floatval($data[$i][1]);
        }

        $c = number_format($jumlah/count($hasil), 2);


        return view('run.average',compact('hasil','c'));
    }


    public function run_median()
    {
        $csvFile = public_path('testing.csv');
        $file_handle = fopen($csvFile, 'r');
        $data = [];
        while (  ($line_of_text = fgetcsv($file_handle,1024,';')) !== false ) {
            $data[]  = $line_of_text ;
        }

        $jumlah = 0;
        for ($i=1; $i <count($data) ; $i++) {
            $hasil[] = $data[$i];
            $hasil2_urut[] = floatval($data[$i][1]);
            $jumlah += floatval($data[$i][1]);
        }


        sort($hasil2_urut);

        for($i = 1;  $i < count($hasil2_urut); $i++ ){

            $hasil_urut[] = $hasil2_urut[$i];
        }

        $tengah=(count($hasil_urut)-1)/2;
        if ((count($hasil_urut)-1)>1)
        {
            if ((count($hasil_urut)-1)%2==0)
            {
                $median=($hasil_urut[$tengah-1]+$hasil_urut[$tengah])/2;
            }
            else
            {
                $median=$hasil_urut[$tengah];
                // dd($median);
            }
        }

        $c = $median;


        return view('run.median',compact('hasil','c'));
    }
}

