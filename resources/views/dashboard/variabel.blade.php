@extends('layouts.app')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;"></a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">SPC Variabel</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">

            </div>
            <h4 class="panel-title">SPC Variabel</h4>
        </div>
        <div class="panel-body">

            <table id="data-table-responsive" class="data table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-nowrap" >No</th>
                            <th class="text-nowrap" >Report Name</th>
                            <th class="text-nowrap" >View HP Chart</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>XmR Individuals</td>
                            <td><a href="{{ url('xmr_individuals') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View HP Chart</button></a></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>XmR Median R</td>
                            <td><a href="{{ url('xmr_median_r') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View HP Chart</button></a></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>XmR Trend</td>
                            <td><a href="{{ url('xmr_trend') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View HP Chart</button></a></td>
                        </tr>



                    </tbody>
                </table>

        </div>
    </div>
    <!-- end panel -->
</div>

@endsection
