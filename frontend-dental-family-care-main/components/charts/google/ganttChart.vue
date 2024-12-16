<template>
  <div class="col-sm-12 box-col-12">
    <div class="card">
      <div class="card-header">
        <h5>Gantt Chart</h5>
      </div>
      <div class="card-body chart-block overflow-hidden">
        <GChart :type="chartType" :data="chartData" :options="chartOptions" :settings="settings" />
      </div>
    </div>
  </div>
</template>
<script lang="ts" setup>
let primary = ref<string>('#24695c')
let secondary = ref<string>("#ba895d");
primary.value = useCookie('primary_color').value ? useCookie('primary_color').value : '#24695c'
secondary.value = useCookie('secondary_color').value ? useCookie('secondary_color').value : '#ba895d'
const columns = [
  { type: 'string', label: 'Task ID' },
  { type: 'string', label: 'Task Name' },
  { type: 'date', label: 'Start Date' },
  { type: 'date', label: 'End Date' },
  { type: 'number', label: 'Duration' },
  { type: 'number', label: 'Percent Complete' },
  { type: 'string', label: 'Dependencies' },
];
const rows = [
  ['Research', 'Find sources', new Date(2015, 0, 1), new Date(2015, 0, 5), null, 100, null,],
  ['Write', 'Write paper', null, new Date(2015, 0, 9), daysToMilliseconds(3), 25, 'Research,Outline',],
  ['Cite', 'Create bibliography', null, new Date(2015, 0, 7), daysToMilliseconds(1), 20, 'Research'],
  ['Complete', 'Hand in paper', null, new Date(2015, 0, 10), daysToMilliseconds(1), 0, 'Cite,Write',],
  ['Outline', 'Outline paper', null, new Date(2015, 0, 6), daysToMilliseconds(1), 100, 'Research',],
];
const chartType = ref<string>('Gantt');
const chartData = [columns, ...rows];
const chartOptions = {
  height: 275,
  gantt: {
    criticalPathEnabled: false, 
    arrow: {
      angle: 100,
      width: 5,
      color: '#ba895d',
      radius: 0
    },
    palette: [
      {
        "color": primary.value,
        "dark": secondary.value,
        "light": "#222222"
      }
    ]

  }
}
const settings = {
  packages: ['gantt'],
}
function daysToMilliseconds(days: number) {
  return days * 24 * 60 * 60 * 1000;
}
</script>