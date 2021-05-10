

<div id="container"></div>



 <script>

   Highcharts.chart('container', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: 'Pareto Chart'
    },
    xAxis: [{
        categories: [
                            @foreach ($hasil1 as $key=>$record)
                            '{{$record[0]}}',
                            @endforeach
        ],
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        min:0,
        max:100,
        labels: {
            format: '{value}',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, { // Secondary yAxis
        min:0,
        max:100,
        title: {
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: '{value} %',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || // theme
            'rgba(255,255,255,0.25)'
    },
    series: [{
        type: 'column',
        yAxis: 1,
        data: [
                            @foreach ($hasil as $key=>$record)
                                parseFloat('{{$record}}'),
                            @endforeach
        ],


    }, {
        type: 'spline',
        data: [
                            @foreach ($hasil_persen as $key=>$record)
                                parseFloat('{{$record}}'),
                            @endforeach
        ],
        tooltip: {
            valueSuffix: '%'
        }
    }]
});
</script>

