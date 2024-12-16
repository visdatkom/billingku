<template>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <h5>File Type Validation</h5>
            </div>
            <div class="card-body">
                <DropZone :maxFileSize="Number(60000000)" url="http://localhost:3000" :uploadOnDrop="true"
                    :multipleUpload="true" :parallelUpload="2" />
            </div>
        </div>
    </div>
</template>