<template>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Post Edit</h5>
            </div>
            <div class="card-body add-post">
                <form class="row needs-validation" novalidate>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="validationCustom01">Title:</label>
                            <input class="form-control" id="validationCustom01" type="text" placeholder="Post Title"
                                required>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="form-group">
                            <label>Type:</label>
                            <div class="m-checkbox-inline">
                                <label class="f-w-400" for="edo-ani">
                                    <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani" checked>Text
                                </label>
                                <label class="f-w-400" for="edo-ani1">
                                    <input class="radio_animated" id="edo-ani1" type="radio" name="rdo-ani">Image
                                </label>
                                <label class="f-w-400" for="edo-ani2">
                                    <input class="radio_animated" id="edo-ani2" type="radio" name="rdo-ani" checked>Audio
                                </label>
                                <label class="f-w-400" for="edo-ani3">
                                    <input class="radio_animated" id="edo-ani3" type="radio" name="rdo-ani">Video
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="d-block">Category:</label>
                            <multiselect v-model="multiValue" tag-placeholder="Add this as new tag"
                                placeholder="Select Your Name" label="name" track-by="code" :options="options"
                                :multiple="true" :taggable="true"></multiselect>
                        </div>
                        <div class="email-wrapper">
                            <div class="theme-form">
                                <div class="form-group">
                                    <label>Content:</label>
                                    <ClientOnly>
                                        <ckeditor :editor="editor" v-model="editorData">
                                        </ckeditor>
                                    </ClientOnly>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- <AdvanceDropzoneSingleUpload /> -->

                <CommenDropZones />

                <!-- <form class="dropzone digits" id="singleFileUpload" action="/upload.php">
                    <div class="m-0 dz-message needsclick">
                        <DropZone :maxFileSize="Number(60000000)" url="http://localhost:3000" :uploadOnDrop="true"
                            :maxFiles="1">
                        </DropZone>
                    </div>
                </form> -->
                <div class="btn-showcase">
                    <button class="btn btn-primary" type="submit">Post</button>
                    <input class="btn btn-light" type="reset" value="Discard">
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
interface multi {
    code: number,
    name: string
}
let ClassicEditor = inject('ClassicEditor')
const editor = ClassicEditor
const editorData = ref<string>('')
const multiValue = ref([])
const options = ref<multi[]>([
    { code: 1, name: 'Lifestyle' },
    { code: 2, name: 'Travel' },
])
const state = ref({
    content: '',
    _content: '',
    editorOption: {
        placeholder: '',
    },
    disabled: false
})
setTimeout(() => {
    state.value.disabled = true
}, 2000)
</script>