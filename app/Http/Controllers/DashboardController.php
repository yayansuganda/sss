<?php

namespace App\Http\Controllers;

use App\Models\Latihan;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

class DashboardController extends Controller
{
     public function index()
    {
        $csvFile = public_path('testing.csv');
        $file_handle = fopen($csvFile, 'r');
        $data = [];
        while (  ($line_of_text = fgetcsv($file_handle,1024,';')) !== false ) {
            $data[]  = $line_of_text ;
        }

        $lava = new Lavacharts();
		$popularity = $lava->DataTable();
		$popularity->addStringColumn('Nama Buah')
                    ->addNumberColumn('Testing');
        for ($i=1; $i <count($data) ; $i++) {
            $popularity->addRow($data[$i]);
        }
        $lava->LineChart('Buah', $popularity, [
            'title' => 'Grafik'
        ], 'buah-div');

        return view('dashboard.dashboard',compact('lava'));
    }



}
