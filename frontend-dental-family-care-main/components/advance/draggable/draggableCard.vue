<template>
    <ClientOnly>
        <draggable class="row">
            <div class="col-sm-12  col-xl-6 " v-for="(element, index) in cards" :key="index">
                <div class="card">
                    <div class="card-header pb-0" v-html="element.title"></div>
                    <div class="card-body">
                        <p v-text="element.description"></p>
                    </div>
                </div>
            </div>
        </draggable>
    </ClientOnly>
</template>
<script lang="ts" setup>
import { useCardStore } from "~/store/card"
let VueDraggableNext = inject('VueDraggableNext')
const store = useCardStore()
const cards = store.draggabler
const draggable = VueDraggableNext
</script>