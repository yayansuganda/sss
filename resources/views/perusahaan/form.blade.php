{!! Form::model("",  [
    'route'=> 'perusahaan.store',
    'method'=> 'POST'
]) !!}

<div class="row form-group m-b-10">
    <label class="col-md-4 col-form-label">Name Company</label>
    <div class="col-md-8">
        {{-- {!!  Form::select('nama_perusahaan',$nama_perusahaan, null ,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'nama_perusahaan']) !!} --}}
        {!! Form::text('nama_perusahaan',null, ['class' => 'form-control', 'id'=>'nama_perusahaan']) !!}
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

</script>

