@include('components.head')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div class="h-60 w-60" id="chart"></div>
<script>
  var options = {
  chart: {
    type: 'pie',
    animations: {
      enabled: false
    }
  },
  series: [44, 55, 13, 33, 12],
  dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val.toFixed(1) + "%"
      }
    },
  legend: {
    show: false
  }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>