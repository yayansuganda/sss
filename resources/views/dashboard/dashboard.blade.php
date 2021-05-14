@extends('layouts.app')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;"></a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Six Sigma</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">

            </div>
            <h4 class="panel-title">Six Sigma</h4>
        </div>
        <div class="panel-body">

            <table id="data-table-responsive" class="data table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-nowrap" >No</th>
                            <th class="text-nowrap" >Report Name</th>
                            <th class="text-nowrap" >View Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>C Chart</td>
                            <td><a href="{{ url('cchart') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>P Chart</td>
                            <td><a href="{{ url('pchart') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>NP Chart</td>
                            <td><a href="{{ url('npchart') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Pareto Chart</td>
                            <td><a href="{{ url('pareto') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>U Chart</td>
                            <td><a href="{{ url('uchart') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>G Chart</td>
                            <td><a href="{{ url('gchart') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>T Chart</td>
                            <td><a href="{{ url('tchart') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>

                        <tr>
                            <td>8</td>
                            <td>XmR Individuals</td>
                            <td><a href="{{ url('xmr_individuals') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>

                        <tr>
                            <td>9</td>
                            <td>XmR Median R</td>
                            <td><a href="{{ url('xmr_median_r') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>

                        <tr>
                            <td>10</td>
                            <td>XmR Trend</td>
                            <td><a href="{{ url('xmr_trend') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>

                        <tr>
                            <td>11</td>
                            <td>Cusum</td>
                            <td><a href="{{ url('special_cusum') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>

                        <tr>
                            <td>12</td>
                            <td>RunChart - Average</td>
                            <td><a href="{{ url('run_average') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>

                        <tr>
                            <td>13</td>
                            <td>RunChart - Median</td>
                            <td><a href="{{ url('run_median') }}" class="btn-show btn btn-block btn-primary btn-secondary btn-sm" title="Detail"><i class="fa fa-eye"></i> View Report</button></a></td>
                        </tr>

                    </tbody>
                </table>

        </div>
    </div>
    <!-- end panel -->
</div>

@endsection
