<template>
    <Icon name="lucide:message-square" class="fs-1" size="20" />
    <ul class="chat-dropdown onhover-show-div">
        <li v-for="(item, index) in data" :key="index">
            <div class="media"><img class="img-fluid rounded-circle me-3" :src="item.img" alt="">
                <div class="media-body"><span>{{ item.name }}</span>
                    <p class="f-12 light-font">{{ item.about }}</p>
                </div>
                <p class="f-12">{{ item.time }}</p>
            </div>
        </li>
        <li class="text-center"> <a class="f-w-700" href="/app/chat">See All </a></li>
    </ul>
</template>
<script lang="ts" setup>
import { useHeaderStore } from "~/store/header"
const store = useHeaderStore()
const data = store.chat
</script>