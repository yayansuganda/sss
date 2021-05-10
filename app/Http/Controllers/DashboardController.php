<?php

namespace App\Http\Controllers;

use App\Models\Latihan;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

class DashboardController extends Controller
{
    public function index()
    {
        // $csvFile = public_path('testing.csv');
        // $file_handle = fopen($csvFile, 'r');
        // $data = [];
        // while (  ($line_of_text = fgetcsv($file_handle,1024,';')) !== false ) {
        //     $data[]  = $line_of_text ;
        // }


        // $lava = new Lavacharts();
		// $popularity = $lava->DataTable();
		// $popularity->addStringColumn('Nama Buah')
        //             ->addNumberColumn('Testing');
        // for ($i=1; $i <count($data) ; $i++) {
        //     $popularity->addRow($data[$i]);
        // }
        // $lava->LineChart('Buah', $popularity, [
        //     'title' => 'Grafik'
        // ], 'buah-div');

        return view('dashboard.dashboard');
    }

    public function c_chart()
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
        $ucl = number_format($c + (3*sqrt($c)),2);
        $lcl = number_format($c - (3*sqrt($c)) < 0 ? 0 : $c - (3*sqrt($c)),2);
        $chart_nama = 'C Chart';


        return view('chart_report.cchart',compact('hasil','c','ucl','lcl'));
    }

    public function p_chart()
    {
        $csvFile = public_path('testing.csv');
        $file_handle = fopen($csvFile, 'r');
        $data = [];
        while (  ($line_of_text = fgetcsv($file_handle,1024,';')) !== false ) {
            $data[]  = $line_of_text ;
        }

        $jumlah1 = 0;
        $jumlah2 = 0;
        for ($i=1; $i <count($data) ; $i++) {
            $hasil[] = [$data[$i][0],($data[$i][1]/$data[$i][2])];
            $jumlah1 += floatval($data[$i][1]);
            $jumlah2 += floatval($data[$i][2]);
        }

        $p = $jumlah1 / $jumlah2;
        $q = 1 - $p;
        $n = $jumlah2 / count($hasil);

        $c = number_format($p,2);
        $ucl = number_format($p + (3*sqrt(($p * $q) / $n)),2);
        $lcl = number_format($p - (3*sqrt(($p * $q) / $n)) <= 0 ? 0 : $p - (3*sqrt(($p * $q) / $n)) ,2);

        return view('chart_report.pchart',compact('hasil','c','ucl','lcl'));
    }


    public function np_chart()
    {
        $csvFile = public_path('testing.csv');
        $file_handle = fopen($csvFile, 'r');
        $data = [];
        while (  ($line_of_text = fgetcsv($file_handle,1024,';')) !== false ) {
            $data[]  = $line_of_text ;
        }

        $jumlah1 = 0;
        $jumlah2 = 0;
        for ($i=1; $i <count($data) ; $i++) {
            $hasil[] = [$data[$i][0],$data[$i][1]];
            $jumlah1 += floatval($data[$i][1]);
            $jumlah2 += floatval($data[$i][2]);
        }

        $np = $jumlah1 / count($hasil);

        $c = number_format($np, 2);
        $ucl = number_format($np + (3*sqrt(($np * (1 - ($np / $jumlah2))))),2);
        $lcl = number_format($np - (3*sqrt(($np * (1 - ($np / $jumlah2))))) <= 0 ? 0 : $np - (3*sqrt(($np * (1 - ($np / $jumlah2))))),2);
        return view('chart_report.npchart',compact('hasil','c','ucl','lcl'));
    }


    public function pareto()
    {
        $csvFile = public_path('testing.csv');
        $file_handle = fopen($csvFile, 'r');
        $data = [];
        $jumlah = 0;
        while (  ($line_of_text = fgetcsv($file_handle,1024,';')) !== false ) {
            $data[]  = $line_of_text ;
        }

        for ($i=1; $i < count($data) ; $i++) {
            $jumlah += floatval($data[$i][1]);
            $hasil1[] = [$data[$i][0], $jumlah];
            $hasil2[] = intval($data[$i][1]);
        }

        rsort($hasil2);
        for($i = 0;  $i < count($hasil2); $i++ ){
            $hasil[] = $hasil2[$i];
        }

        for($i = 0;  $i < count($hasil2); $i++ ){
            $hasil_persen[] = ($hasil1[$i][1] / $jumlah) * 100;
        }


        return view('chart_report.pareto',compact('hasil','hasil1','hasil_persen'));
    }



}
