<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Simple Form Wizard</h5><span>Please Make sure fill all the filed before click on next button</span>
            </div>
            <div class="card-body">
                <Wizard round-tabs :custom-tabs="[
                    {
                    },
                    {
                    },
                    {
                    },
                    {
                    },
                ]" :nextButton="{
    text: 'Next',
    hideIcon: true,
    hideText: false,
}" :backButton="{
    text: 'Back',
    hideText: false,
    hideIcon: true,

}" :doneButton="{
    text: 'Finish!',
    hideIcon: true,
    icon: 'file',
}" @change="onChangeCurrentTab" :beforeChange="onTabBeforeChange">
                    <div class="col-xs-12" v-if="currentTabIndex === 0">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="control-label">First Name</label>
                                <input class="form-control" type="text" placeholder="Johan" required>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Last Name</label>
                                <input class="form-control" type="text" placeholder="Deo" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 " v-if="currentTabIndex === 1">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="control-label">Email</label>
                                <input class="form-control" type="text" placeholder="name@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Password</label>
                                <input class="form-control" type="password" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 " v-if="currentTabIndex === 2">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="control-label">Birth date</label>
                                <input class="form-control" type="date" required>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Have Passport</label>
                                <input class="form-control" type="text" placeholder="yes/No" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 " v-if="currentTabIndex === 3">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="control-label">State</label>
                                <input class="form-control mt-1" type="text" placeholder="State" required>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">City</label>
                                <input class="form-control mt-1" type="text" placeholder="City" required>
                            </div>
                        </div>
                    </div>
                </Wizard>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>

const currentTabIndex = ref()
function onChangeCurrentTab(index: number, oldIndex: number) {
    currentTabIndex.value = index;
}
function onTabBeforeChange() {
    if (currentTabIndex.value === 0) {
    }
}
onMounted(() => {
    currentTabIndex.value = 0
})
</script>