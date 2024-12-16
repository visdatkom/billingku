<template>
    <div class="xl-50 col-xl-5 box-col-6">
        <div class="small-chart-widget chart-widgets-small">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Turnover</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <div class="row">
                            <div class="col-12">
                                <div id="chart-widget7">
                                    <ClientOnly>
                                        <apexchart type="area" height="320" ref="chart" :options="chartOptions"
                                            :series="series"></apexchart>
                                    </ClientOnly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
// import chart from "~/data/chart.json"
import { monthDataSeries1 } from "~/data/chart-data"
let primary = ref<string>('#24695c')
let secondary = ref<string>("#ba895d");
primary.value = useCookie('primary_color').value ? useCookie('primary_color').value : '#24695c'
secondary.value = useCookie('secondary_color').value ? useCookie('secondary_color').value : '#ba895d'
const series = [
    {
        data: monthDataSeries1[0].prices,
    }
]
const chartOptions = {
    chart: {
        height: 320,
        type: "area",
        zoom: {
            enabled: false,
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        curve: "straight",
    },
    fill: {
        colors: [primary.value],
        type: "gradient",
        gradient: {
            shade: "light",
            type: "vertical",
            shadeIntensity: 0.4,
            inverseColors: false,
            opacityFrom: 0.9,
            opacityTo: 0.8,
            stops: [0, 100],
        },
    },

    colors: [primary.value],
    labels: monthDataSeries1[0].dates,
    xaxis: {
        type: "datetime",
    },
    yaxis: {
        opposite: false,
    },
    legend: {
        horizontalAlign: "left",
    },
}
onMounted(() => {
    series[0].data = monthDataSeries1[0].prices;
})
</script>