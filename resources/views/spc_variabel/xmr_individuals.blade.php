<div class="card card-outline-default text-center bg-white">
    <div class="card-block">
        <div id="container2"></div>

    </div>
</div>

<div class="card card-outline-default text-center bg-white">
    <div class="card-block">
        <div id="container"></div>

    </div>
</div>


 <script>

    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container'
        },
        title: {
            text: 'Moving Range Chart'
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
                    @foreach ($hasil2 as $key=>$record)
                            parseFloat('{{$record}}'),
                    @endforeach
                 ]
        }]
    });

    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container2'
        },
        title: {
            text: 'Individuals X Chart'
        },
        xAxis: {

            categories: [
                            @foreach ($hasil as $key=>$record)
                            '{{$record[0]}}',
                            @endforeach
                        ]
        },

        yAxis: {
        min : '{{ $lcl2 }}',
        max : '{{ $ucl2 }}',
        plotLines: [{
                color: 'GREEN',
                width: 2,
                value: '{{ $ucl2 }}',
                label: {
                    text: 'UCL : {{ $ucl2 }}'
                }
            }, {
                color: 'BLUE',
                width: 2,
                value: '{{ $c2 }}',
                label: {
                    text: 'LC : {{ $c2 }}'
                }
            }, {
                color: 'RED',
                width: 2,
                value: '{{ $lcl2 }}',
                label: {
                    text: 'LCL : {{ $lcl2 }}'
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

