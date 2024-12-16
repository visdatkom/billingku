<template>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Default:</h5>
            </div>
            <div class="card-body">
                <form class="theme-form">
                    <div>
                        <div class="clockpicker">
                            <datepicker v-model="time" timePicker />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>


const time = ref({
    hours: new Date().getHours(),
    minutes: new Date().getMinutes()
});
</script>