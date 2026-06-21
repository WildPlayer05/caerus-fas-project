<div class="max-w-sm w-full bg-white rounded-lg shadow p-4 md:p-6">

    <div class="flex justify-between items-start w-full">
        <div class="flex-col items-center">
            <div class="flex items-center mb-1">
                <h5 class="text-xl font-bold leading-none text-gray-900 me-1">{{$text}}: <h1 class="px-2 text-lg text-gray-700">@if ($type == 'money') €{{number_format((float)$total, 2)}} @else {{$total}} @endif</h1></h5>
            </div>
        </div>
    </div>

    <div class="py-6" id="{{$title}}"></div>
</div>
<script>
    const getChartOptions{{$title}} = () => {
        return {
            @if ($type == 'money')
            series : [{{number_format((float)$data, 2)}},{{number_format((float)$total-$data, 2)}}],
            @else
            series : [{{$data}},{{$total-$data}}],
            @endif

            colors: ["#1C64F2", "#16BDCA"],
            chart: {
                height: 420,
                width: "100%",
                type: "pie",
            },
            stroke: {
                colors: ["white"],
                lineCap: "",
            },
            plotOptions: {
                pie: {
                    labels: {
                        show: true,
                    },
                    size: "100%",
                    dataLabels: {
                        offset: -25
                    }
                },
            },
            labels: ["{{$type1}}", "{{$type2}}"],
            dataLabels: {
                enabled: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return @if ($type == 'money') '€' + @endif value
                    },
                },
            },
            xaxis: {
                labels: {
                    formatter: function (value) {
                        return value
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
        }
    }

    if (document.getElementById("{{$title}}") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("{{$title}}"), getChartOptions{{$title}}());
        chart.render();
    }

</script>
