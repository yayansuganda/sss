@extends('layouts.app')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Upload File</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">List File Upload</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <ol class="pull-right">
                    <a href="{{route('upload_file.create')}}" class="btn btn-xs btn-success btn-show" title="Upload New File" data-toggle="modal">Upload New File</a>
                </ol>
            </div>
            <h4 class="panel-title">List File Upload</h4>
        </div>
        <div class="panel-body">
            <div class="panel-body">

                <table id="data-table-responsive" class="data table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Name File Upload</th>
                            <th class="text-nowrap">Nama File</th>
                            <th class="text-nowrap">Set Data</th>
                            <th class="text-nowrap" width="30%">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end panel -->
</div>

@endsection

@push('scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});




// $('input:radio[name="postage"]').change(function(){
//     if($(this).val() === 'Yes'){
//        // append stuff
//     }
// });

$(document).ready(function () {




     $('#data-table-responsive').DataTable({
        destroy:true,
        processing: true,
        serverSide: true,
        rowGroup: {
                dataSrc: [ 0 ]
            },
            columnDefs: [ {
                targets: [ 0 ],
                visible: false
            } ],
        searching:false,
        ajax:{
                url: "{{ route('table.upload_file') }}",
                dataType: "json",
                type: "POST",
                data:function (d) {
                    d.data_session = $('input[name="set_data"]:checked').val();

                //d.leasing_id = $( "select#leasing_id option:checked" ).val();
            }
        },
    });
});




 function SetDataSession() {
        $(".data").DataTable().draw(false);

        const Toast = Swal.mixin({
                toast: true,
                position: "center",
                showConfirmButton: false,
                timer: 1500,
                // timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                },
            });

            Toast.fire({
                icon: "success",
                title: "Set Data Success",
            });
    }


</script>
@endpush
