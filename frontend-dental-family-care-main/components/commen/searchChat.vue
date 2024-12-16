<template>
    <div class="col call-chat-sidebar col-sm-12">
        <div class="card">
            <div class="card-body chat-body">
                <div class="chat-box">
                    <div class="chat-left-aside">
                        <div class="media">
                            <img class="rounded-circle user-image" src="/images/user/1.jpg" alt="" />
                            <div class="about">
                                <div class="name f-w-600">Mark Jecno</div>
                                <div class="status">Status...</div>
                            </div>
                        </div>
                        <div class="people-list custom-scrollbar" id="people-list">
                            <div class="search">
                                <form class="theme-form">
                                    <div class="form-group">
                                        <input v-model="search" v-on:keyup="setSerchUsers" class="form-control" type="text"
                                            placeholder="search" /><i class="fa fa-search"></i>
                                    </div>
                                </form>
                            </div>
                            <ul class="list custom-scrollbar" v-if="search == ''">
                                <li class="clearfix" v-for="(user, index) in activeUsers" :key="index"
                                    @click="setActiveuser(user)">
                                    <img class="rounded-circle user-image" :src="getImgUrl(user.thumb)" alt="" />
                                    <div class="status-circle away"></div>
                                    <div class="about">
                                        <div class="name">{{ user.name }}</div>
                                        <div class="status">{{ user.status }}</div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list" v-if="search != ''">
                                <li class="clearfix" v-for="(user, index) in store.serchUser" :key="index"
                                    @click="setActiveuserSerch(user)">
                                    <img class="rounded-circle user-image" :src="getImgUrl(user.thumb)" alt="" />
                                    <div class="status-circle away"></div>
                                    <div class="about">
                                        <div class="name">{{ user.name }}</div>
                                        <div class="status">{{ user.status }}</div>
                                    </div>
                                </li>
                                <div v-if="!store.serchUser.length">
                                    <div class="search-not-found chat-search text-center">
                                        <p> Sorry, We didn't find any results matching this search </p>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>

import { useChatStore } from "~/store/chat"
const search = ref<string>('')
const store = useChatStore()
const activeUsers = computed(() =>
    store.users.filter(function (user) {
        if (user.active === 'active' && user.id !== 0) return user;
    }))

function getImgUrl(path: string) {
    return '/images/' + path;
}
function setSerchUsers() {
    if (search.value !== '')
        store.setSerchUsers(search.value);
}
function setActiveuser(user: number) {
    store.setActiveuser(user);

}
function setActiveuserSerch(id: number) {
    store.setActiveuser(id);
    search.value = '';
}
</script>