<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('department.department');
    }


    public function create()
    {
        $perusahaan = Storage::directories('public');
        foreach ($perusahaan as $value) {
            $nama_perusahaan[str_replace('public/','',$value)] = str_replace('public/','',str_replace('_',' ', $value));
        }

        return view('department.form',compact('nama_perusahaan'));
    }

     public function create2($id)
    {
        $company = $id;

        return view('department.form',compact('company'));
    }

    public function store(Request $request)
    {


        Storage::makeDirectory('public/'.$request->company.'/'.str_replace(' ','_',$request->name_department));

        // $url = Storage::url(str_replace('','_',$request->nama_perusahaan).'/company.txt');

        // $csvFile = public_path($url);
        // $file_handle = fopen($csvFile, 'a');



        // fwrite($file_handle, '1');
        // fwrite($file_handle, '2');
        // fwrite($file_handle, '3');
    }



    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Storage::deleteDirectory(str_replace('|','/',$id));
    }

    public function isi_datatable(Request $request)
    {
        $columns = array(
            0 =>'No',
            1 =>'lokasi'
        );



        $data_tabel = Storage::directories('public/'.$request->company);



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

                if (!empty($isi_data)) {
                    $delete =  route('department.destroy', str_replace('/','|',$isi_data));

                    $no++;
                    $data[] = array(
                        $no,
                        str_replace('public/'.$request->company.'/','',$isi_data) ,
                        "
                            <a <a href='javascript:void(0)' data-url='{$delete}' class='btn-delete btn   btn-danger btn-sm' title2='Hapus Data'><i class='fa fa-trash'></i></i>   Delete</button></a>
                        "
                    );
                }
//  public/PT._XYZ_opportunity_logs/


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
