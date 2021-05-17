<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    public function index()
    {
        return view('perusahaan.perusahaan');
    }


    public function create()
    {
        return view('perusahaan.form');
    }

    public function store(Request $request)
    {

        Storage::makeDirectory('public/'.str_replace(' ','_',$request->nama_perusahaan));

    }


    public function show($id)
    {
         $company = $id;

        return view('department.show',compact('company'));

    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Storage::deleteDirectory('public/'.$id);
    }

    public function isi_datatable(Request $request)
    {
        $columns = array(
            0 =>'No',
            1 =>'lokasi'
        );


        $data_tabel = Storage::directories('public');

        $totalFiltered =count($data_tabel);

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.1.dir');



        $data = array();
        $no = 0;
        if(!empty($data_tabel))
        {
            foreach ($data_tabel as $isi_data)
            {
                $delete =  route('perusahaan.destroy',str_replace('public/','',$isi_data));
                $show =  route('perusahaan.show',str_replace('public/','',$isi_data));
                $title = str_replace('public/','',str_replace('_',' ', $isi_data));
                $no++;
                $data[] = array(
                    $no,
                    str_replace('public/','',str_replace('_',' ', $isi_data)) ,
                    "
                        <a href='javascript:void(0)' data-url='{$show}' class='btn-preview btn   btn-primary btn-sm' title='$title'><i class='fa fa-plus'></i></i>   Add Department</button></a>
                        <a href='javascript:void(0)' data-url='{$delete}' class='btn-delete btn   btn-danger btn-sm' title2='Hapus Data'><i class='fa fa-trash'></i></i>   Delete Company</button></a>
                    "
                );

            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval(count($data_tabel)),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
            );

        echo json_encode($json_data);
    }
}
