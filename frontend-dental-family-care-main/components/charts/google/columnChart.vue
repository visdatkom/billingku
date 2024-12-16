<template>
  <div class="col-sm-12 col-xl-6 box-col-6">
    <div class="card">
      <div class="card-header">
        <h5>Column Chart <span class="digits">1 </span></h5>
      </div>
      <div class="card-body chart-block">
        <GChart class="chart-overflow" id="column-chart1" :settings="{ packages: ['bar'] }" :data="areaChart.chartData_1"
          :options="verticalChartOptions" :createChart="(el, google) => new google.charts.Bar(el)"
          @ready="onChartReady" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-xl-6 box-col-6">
    <div class="card">
      <div class="card-header">
        <h5>Column Chart <span class="digits">2</span></h5>
      </div>
      <div class="card-body chart-block">
        <GChart class="chart-overflow" id="column-chart2" :settings="{ packages: ['bar'] }" :data="areaChart.chartData_1"
          :options="horizontalChartOptions" :createChart="(el, google) => new google.charts.Bar(el)"
          @ready="onChartReady" />
      </div>
    </div>
  </div>
</template>
<script lang="ts" setup>

let primary = ref<string>('#24695c')
let secondary = ref<string>("#ba895d");
const chartsLib = ref(null)
primary.value = useCookie('primary_color').value ? useCookie('primary_color').value : '#24695c'
secondary.value = useCookie('secondary_color').value ? useCookie('secondary_color').value : '#ba895d'
const areaChart = {
  chartData_1: [
    ['Year', 'Sales', 'Expenses', 'Profit'],
    ['2014', 1e3, 400, 250],
    ['2015', 1170, 460, 300],
    ['2016', 660, 1120, 400],
    ['2017', 1030, 540, 450]
  ],
}
const verticalChartOptions = computed(() => {
  if (!chartsLib.value) return null;
  return chartsLib.value.charts.Bar.convertOptions({
    chart: {
      title: 'Company Performance',
      subtitle: 'Sales, Expenses, and Profit: 2014-2017'
    },
    bars: 'vertical',
    vAxis: {
      format: 'decimal'
    },
    height: 400,
    width: '100%',
    colors: [primary.value, secondary.value, '#e2c636']
  });
})
const horizontalChartOptions = computed(() => {
  if (!chartsLib.value) return null;
  return chartsLib.value.charts.Bar.convertOptions({
    chart: {
      title: 'Company Performance',
      subtitle: 'Sales, Expenses, and Profit: 2014-2017'
    },
    bars: 'horizontal',
    vAxis: {
      format: 'decimal'
    },
    height: 400,
    width: '100%',
    colors: [primary.value, secondary.value, '#e2c636']
  });
})
function onChartReady(chart: null, google: null): void {
  chartsLib.value = google;
}

</script>