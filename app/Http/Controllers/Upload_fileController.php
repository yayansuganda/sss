<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Upload_fileController extends Controller
{

    public function index()
    {
        return view('upload_file.upload_file');
    }


    public function create()
    {
        $perusahaan = Storage::directories('public');
        foreach ($perusahaan as $value) {
            $nama_perusahaan[str_replace('public/','',$value)] = str_replace('public/','',str_replace('_',' ', $value));
        }

        return view('upload_file.form', compact('nama_perusahaan'));
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //                             'stempel_files' =>  'file|mimes:jpeg,png,jpg|max:500'
        //                           ]);


        // $csvFile = public_path('testing3.json');
        // $strJsonFileContents = file_get_contents($csvFile);

        // dd(json_decode($strJsonFileContents));


        $path_file = $request->file('name_file');

        if ($path_file) {
            $nama_file_stempel = str_replace(' ','_',$request->nama_perusahaan).'-'.str_replace(' ','_',$request->department).'-24_hours-'.date('d-m-Y').'.' . $path_file->getClientOriginalExtension();
            Storage::putFileAs('public/'.str_replace(' ','_',$request->nama_perusahaan).'/'.$request->department, $path_file, $nama_file_stempel);
        }

        $url = Storage::url($request->nama_perusahaan.'/'.$request->department);
        $csvFile = public_path($url.'.json');
        $file_handle = fopen($csvFile, 'w');
        $json = array("company_name" => $request->nama_perusahaan,
                        "manager"=>$request->manager,
                        "department"=>$request->department,
                        "city"=>$request->city,
                        "country" => $request->country
                        );

        $myJSON = json_encode($json);
        fwrite($file_handle, $myJSON);

    }



    public function department($company)
    {

        $data_tabel = Storage::directories('public/'.$company);

        if (!empty($data_tabel)) {
           foreach ($data_tabel as $value) {
                $isi_data = str_replace('public/'.$company.'/','',$value);

                $name_department[str_replace('public/'.$company.'/','',$value)] = str_replace('_',' ',$isi_data);
            }
        } else {
            $name_department = [];
        }


        return $name_department;


        // return json_encode(array(
        // "nama_jabatan" => $nama_jabatan,
        // "nama_golongan_pangkat" => $nama_golongan_pangkat
        // ));
    }



    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Storage::disk('local')->delete(str_replace('|','/',$id));
    }

    public function isi_datatable(Request $request)
    {

        // $request->session()->forget('file');

        if ($request->data_session != null) {
            $request->session()->put('file', $request->data_session);
        }

        $columns = array(
            0 =>'KodeLokasi',
            1 =>'lokasi'
        );

        $data_tabel = Storage::directories('public');

// dd($data_tabel);


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

                $data_tabels = Storage::directories($isi_data);

                foreach ($data_tabels as $values) {
                    $files = Storage::files($values);
                    foreach ($files as $value) {
                        $delete =  route('upload_file.destroy',str_replace('/','|',$value));

                        if (Session::get('file') == $value) {
                            $btn = 'btn-success';
                            $btn_text = 'Set Success';
                        } else {
                            $btn = '';
                            $btn_text = 'Set Data';
                        }
                            $isi = explode('/',$value)[3];

                            if (Session::get('file') == explode('/',$value)[3]) {
                                $checked = "<a class='btn-show btn   btn-success btn-sm' title2 = 'View & Set Data'>Success Set</button></a>";

                            } else {
                                $checked = "<div class='form-check'>
                                                <input class='form-check-input' value='{$isi}' name='set_data' id='set_data' type='radio' onclick='SetDataSession()'/>
                                            </div>
                                            ";
                            }

                            // dd(Session::get('file'));
                        $data[] = array(
                            str_replace('public/','',str_replace('_',' ', $isi_data)) ,
                            explode('/',$value)[3],
                            $checked,
                            "    <a href='javascript:void(0)' data-url='{$delete}' class='btn-delete btn   btn-danger btn-sm' title2='Hapus Data'><i class='fa fa-trash'></i></i>   delete</button></a>
                            "
                        );
                    }
                }



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



