{!! Form::model("",  [
    'route'=> 'upload_file.store',
    'method'=> 'POST'
]) !!}

<div class="row form-group m-b-10">
    <label class="col-md-4 col-form-label">Name Company</label>
    <div class="col-md-8">
        {!!  Form::select('nama_perusahaan',$nama_perusahaan, null ,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'nama_perusahaan']) !!}
        {{-- {!! Form::text('nama_perusahaan',null, ['class' => 'form-control', 'id'=>'nama_perusahaan']) !!} --}}
    </div>
</div>

<div class="row form-group m-b-10">
    <label class="col-md-4 col-form-label">Department</label>
    <div class="col-md-8">
        {!!  Form::select('department',[], null ,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'department']) !!}
        {{-- {!! Form::text('department',null, ['class' => 'form-control', 'id'=>'department']) !!} --}}
    </div>
</div>

<div class="row form-group m-b-10">
    <label class="col-md-4 col-form-label">Manager</label>
    <div class="col-md-8">
        {!! Form::text('manager',null, ['class' => 'form-control', 'id'=>'manager']) !!}
    </div>
</div>



<div class="row form-group m-b-10">
    <label class="col-md-4 col-form-label">City</label>
    <div class="col-md-8">
        {!! Form::text('city',null, ['class' => 'form-control', 'id'=>'city']) !!}
    </div>
</div>

<div class="row form-group m-b-10">
    <label class="col-md-4 col-form-label">Country</label>
    <div class="col-md-8">
        {!! Form::text('country',null, ['class' => 'form-control', 'id'=>'country']) !!}
    </div>
</div>

<div class="row form-group m-b-10">
    <label class="col-md-4 col-form-label">Upload File</label>
    <div class="col-md-8">
        {!! Form::file('name_file',['id'=>'name_file']) !!}
    </div>
</div>

{!! Form::close() !!}

<script>
    $('.default-select2').css('width', '100%');
    $('.default-select2').select2({
        dropdownParent: $('#modal'),
        placeholder : "---Pilih---",
        allowClear: true
    });


            $('select[name="nama_perusahaan"]').on('change', function() {
                var stateID = $(this).val();
                console.log(stateID);
                if(stateID) {
                    $.ajax({
                        url: '/department/ajax/'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="department"]').empty();
                            $('select[name="department"]').append('<option value="">Pilih</option>');
                            $.each(data, function(key, value) {

                                $('select[name="department"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="department"]').empty();
                }
            });

</script>

