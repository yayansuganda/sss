

<div id="container"></div>



 <script>

    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container'
        },
        title: {
            text: 'Average'
        },
        xAxis: {

            categories: [
                            @foreach ($hasil as $key=>$record)
                            '{{$record[0]}}',
                            @endforeach
                        ]
        },

        yAxis: {
        plotLines: [{
                color: 'BLUE',
                width: 2,
                value: '{{ $c }}',
                label: {
                    text: 'LC : {{ $c }}'
                }
            }]
        },

        series: [{
            name: "Data",
            data: [
                    @foreach ($hasil as $key=>$record)
                            parseInt('{{$record[1]}}'),
                    @endforeach
                 ]
        }]
    });
</script>

