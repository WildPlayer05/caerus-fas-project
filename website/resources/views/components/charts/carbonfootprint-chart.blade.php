
<div class="-z-50 max-w-sm w-full bg-white  p-4 md:p-6">




    <!-- Donut Chart -->
    <div class="py-6" id="donut-chart"></div>
    <div class="grid grid-cols-1 items-center border-gray-200 justify-between">
    </div>
</div>
<script>

    const getChartOptions = () => {
        return {
            series: [{{$totEmissionsMC}}, {{$totEmissionsKW}}],
            colors: ["#16BDCA", "#FDBA8C"],
            chart: {
                height: 320,
                width: "100%",
                type: "donut",
            },
            stroke: {
                colors: ["transparent"],
                lineCap: "",
            },
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontFamily: "Inter, sans-serif",
                                offsetY: 20,
                            },
                            total: {
                                showAlways: true,
                                show: true,
                                label: "Total footprint",
                                fontFamily: "Inter, sans-serif",
                                formatter: function (w) {
                                    const sum = w.globals.seriesTotals.reduce((a, b) => {
                                        return a + b
                                    }, 0)
                                    return  sum.toFixed(2) + ' CO₂'
                                },
                            },
                            value: {
                                show: true,
                                fontFamily: "Inter, sans-serif",
                                offsetY: -20,
                                formatter: function (value) {
                                    return value + " CO₂"
                                },
                            },
                        },
                        size: "80%",
                    },
                },
            },
            grid: {
                padding: {
                    top: -2,
                },
            },
            labels: ["Gas", "Electricity"],
            dataLabels: {
                enabled: false,
            },
            legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return value + " CO₂"
                    },
                },
            },
            xaxis: {
                labels: {
                    formatter: function (value) {
                        return value  + " CO₂"
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

    if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
        chart.render();


    }
</script>
