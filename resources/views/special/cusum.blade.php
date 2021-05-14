

<div id="container"></div>



 <script>

    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container'
        },
        title: {
            text: 'Cusum'
        },
        xAxis: {

            categories: [
                            @foreach ($hasil as $key=>$record)
                            '{{$record[0]}}',
                            @endforeach
                        ]
        },

        yAxis: {
        min : '{{ $lower_cusum }}',
        max : '{{ $upper_cusum }}',
        plotLines: [{
                color: 'RED',
                width: 2,
                value: '{{ $upper_cusum }}',
                label: {
                    text: 'Upper Cusum : {{ $upper_cusum }}'
                }
            },{
                color: 'RED',
                width: 2,
                value: '{{ $lower_cusum }}',
                label: {
                    text: 'Lower Cusum : {{ $lower_cusum }}'
                }
            }]
        },

        series: [{
            name: "C +",
            data: [
                    @foreach ($c_plus as $key=>$record)
                            parseInt('{{$record}}'),
                    @endforeach
                 ]
        }, {
            name: "C -",
            data: [
                    @foreach ($c_minus as $key=>$record)
                            parseInt('{{$record}}'),
                    @endforeach
                 ]
        }]
    });
</script>

