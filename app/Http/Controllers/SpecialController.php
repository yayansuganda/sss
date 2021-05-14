<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialController extends Controller
{
    public function special_cusum()
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
            unset($data[$i][0]);
            $data_v[] = $data[$i];
        }

        for ($j=0; $j <count($data_v) ; $j++) {
            $xave[] = array_sum($data_v[$j]) / count($data_v[$j]);
        }

        $average = array_sum($xave) / count($xave);

        for ($k=0; $k <count($xave) ; $k++) {
             $data_xave[] = pow($xave[$k] - $average, 2);
        }

        $stdev = sqrt(array_sum($data_xave)/(count($data_xave) - 1));
        $k = $stdev / 2;
        $fir = 0;
        $upper_cusum = 4*$stdev;
        $lower_cusum = -4*$stdev;

        $c_plus = [];
        $c_minus = [];
        for ($l=0; $l <count($xave) ; $l++) {
            $c_plus[] = $l == 0 ? ($xave[$l] - ($average + $k) + $fir <= 0 ? 0 : $xave[$l] - ($average + $k) + $fir ) : ($xave[$l] - ($average + $k) + $c_plus[$l - 1] <= 0 ? 0 : $xave[$l] - ($average + $k) + $c_plus[$l - 1]);
            $c_minus[] = $l == 0 ? ($xave[$l] - ($average - $k) + $fir >= 0 ? 0 : $xave[$l] - ($average - $k) + $fir ) : ($xave[$l] - ($average - $k) + $c_minus[$l - 1] >= 0 ? 0 : $xave[$l] - ($average - $k) + $c_minus[$l - 1]);
        }


        return view('special.cusum',compact('hasil','c_plus','c_minus','upper_cusum','lower_cusum'));
    }
}
