<a href="{{route('department.create2', $company )}}" class="btn btn-xs btn-success btn-show" title="Add Department" title-preview="{{ $company }}" data-toggle="modal">Add Department</a>
<br>
<br>
<table id="data-table-responsive" style="width: 100%;" class="data2 table table-striped table-bordered">
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


<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



    $('.data2').DataTable({
        destroy:true,
        processing: true,
        serverSide: true,
        searching:false,
        ajax:{
                url: "{{ route('table.department') }}",
                dataType: "json",
                type: "POST",
                data:function (d) {
                d.company = "{{ $company }}";
                //d.leasing_id = $( "select#leasing_id option:checked" ).val();
            }
        },
    });

</script>
