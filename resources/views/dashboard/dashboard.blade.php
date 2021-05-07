@extends('layouts.app')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;"></a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Testing</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">

            </div>
            <h4 class="panel-title">Testing</h4>
        </div>
        <div class="panel-body">
            <div class="panel-body">

           <div id="buah-div"></div>

            {!!   $lava->render('LineChart', 'Buah', 'buah-div');  !!}

        </div>
    </div>
    <!-- end panel -->
</div>

@endsection
