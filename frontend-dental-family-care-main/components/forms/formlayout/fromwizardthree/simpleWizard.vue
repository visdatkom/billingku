<template>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Form Wizard with icon</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <Wizard round-tabs :custom-tabs="[
                        {
                            title: 'Registration',
                            icon: 'user'
                        },
                        {
                            title: 'Email',
                            icon: 'key'
                        },
                        {
                            title: 'Birth Date',
                            icon: 'twitter'
                        }
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
}" @change="onChangeCurrentTab">
                        <fieldset v-if="currentTabIndex === 0">
                            <div class="mb-2">
                                <label for="f1-first-name">First Name</label>
                                <input class="form-control" id="f1-first-name" type="text" name="f1-first-name"
                                    placeholder="name@example.com" required>
                            </div>
                            <div class="mb-2">
                                <label for="f1-last-name">Last name</label>
                                <input class="f1-last-name form-control" id="f1-last-name" type="text" name="f1-last-name"
                                    placeholder="Last name..." required>
                            </div>
                        </fieldset>
                        <fieldset v-if="currentTabIndex === 1">
                            <div class="mb-2">
                                <label class="sr-only" for="f1-email">Email</label>
                                <input class="f1-email form-control" id="f1-email" type="text" placeholder="Email..."
                                    required>
                            </div>
                            <div class="mb-2">
                                <label class="sr-only" for="f1-password">Password</label>
                                <input class="f1-password form-control" id="f1-password" type="password"
                                    placeholder="Password..." required>
                            </div>
                            <div class="mb-2">
                                <label class="sr-only" for="f1-repeat-password">Repeat password</label>
                                <input class="f1-repeat-password form-control" id="f1-repeat-password" type="password"
                                    placeholder="Repeat password..." required>
                            </div>
                        </fieldset>
                        <fieldset v-if="currentTabIndex === 2">
                            <div class="mb-2">
                                <label class="sr-only">DD</label>
                                <input class="form-control" id="dd" type="number" placeholder="dd" required>
                            </div>
                            <div class="mb-2">
                                <label class="sr-only">MM</label>
                                <input class="form-control" id="mm" type="number" placeholder="mm" required>
                            </div>
                            <div class="mb-2">
                                <label class="sr-only">YYYY</label>
                                <input class="form-control" id="yyyy" type="number" placeholder="yyyy" required>
                            </div>
                        </fieldset>
                    </Wizard>
                </form>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>

const currentTabIndex = ref()

function onChangeCurrentTab(index: number, oldIndex: number) {
    currentTabIndex.value = index;
}
onMounted(() => {
    currentTabIndex.value = 0
})
</script>