

<div id="container"></div>



 <script>

    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container'
        },
        title: {
            text: 'NP Chart'
        },
        xAxis: {

            categories: [
                            @foreach ($hasil as $key=>$record)
                            '{{$record[0]}}',
                            @endforeach
                        ]
        },

        yAxis: {
        min : '{{ $lcl }}',
        max : '{{ $ucl }}',
        plotLines: [{
                color: 'GREEN',
                width: 2,
                value: '{{ $ucl }}',
                label: {
                    text: 'UCL : {{ $ucl }}'
                }
            }, {
                color: 'BLUE',
                width: 2,
                value: '{{ $c }}',
                label: {
                    text: 'LC : {{ $c }}'
                }
            }, {
                color: 'RED',
                width: 2,
                value: '{{ $lcl }}',
                label: {
                    text: 'LCL : {{ $lcl }}'
                }
            }]
        },

        series: [{
            name: "Data",
            data: [
                    @foreach ($hasil as $key=>$record)
                        parseFloat('{{$record[1]}}'),
                    @endforeach
                 ]
        }]
    });
</script>

