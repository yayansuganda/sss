@extends('layouts.app')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Data Department</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Data Department</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <ol class="pull-right">
                    <a href="{{route('department.create')}}" class="btn btn-xs btn-success btn-show" title="Add Department" data-toggle="modal">Add Department</a>
                </ol>
            </div>
            <h4 class="panel-title">Data Department</h4>
        </div>
        <div class="panel-body">
            <div class="panel-body">

                <table id="data-table-responsive" class="data table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-nowrap" width="5%">No</th>
                            <th class="text-nowrap">Name Department</th>
                            <th class="text-nowrap" width="15%">Action</th>
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



$(document).ready(function () {
    $('#data-table-responsive').DataTable({
        destroy:true,
        processing: true,
        serverSide: true,
        // searching:false,
        ajax:{
                url: "{{ route('table.department') }}",
                dataType: "json",
                type: "POST",
                data:function (d) {
                //d.id_polda = $('input[name=id_polda]').val();
                //d.leasing_id = $( "select#leasing_id option:checked" ).val();
            }
        },
    });
});

</script>
@endpush
