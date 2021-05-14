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
            text: 'X Chart'
        },
        xAxis: {

            categories: [
                            @foreach ($hasil as $key=>$record)
                            '{{$record[0]}}',
                            @endforeach
                        ]
        },


        series: [{
            name: "Data",
            data: [
                    @foreach ($hasil as $key=>$record)
                            parseFloat('{{$record[1]}}'),
                    @endforeach
                 ]
        }, {
            name: "LC",
            data: [
                    @foreach ($c2 as $key=>$record)
                            parseFloat('{{$record}}'),
                    @endforeach
                 ]
        }, {
            name: "UCL",
            data: [
                    @foreach ($ucl2 as $key=>$record)
                            parseFloat('{{$record}}'),
                    @endforeach
                 ]
        }, {
            name: "LCL",
            data: [
                    @foreach ($lcl2 as $key=>$record)
                            parseFloat('{{$record}}'),
                    @endforeach
                 ]
        }]
    });
</script>

