<template>
<vue-clip :options="options" :on-complete="complete" :on-init="init">
    <template slot="clip-uploader-action">
        <div>
            <div class="dz-message">
                <h2 class="text-center"> Click or Drag and Drop files here upload </h2>
            </div>
        </div>
    </template>
    <template slot="clip-uploader-body" slot-scope="props">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Preview</th>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="file in props.files">
                        <td><img v-bind:src="file.dataUrl" v-if="file.dataUrl" />
                            <span v-else>No Preview Available</span></td>
                        <td>{{ file.name }}</td>
                        <td>{{ file.status }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="float-right">
            <button class="btn btn-primary" @click="upload">Upload</button>
        </div>
    </template>
</vue-clip>
</template>
<script>
import Vue from 'vue'
import VueClip from 'vue-clip'

Vue.use(VueClip)
export default {

    data() {
        return {
            instance: "",
            options: {
                url: 'https://httpbin.org/post',
                paramName: 'file',
                autoProcessQueue: false,
                maxFiles: {
                    limit: 5,
                    message: 'You can only upload a max of 5 files'
                }
            }
        }
    },
    methods: {
        complete(file, status, xhr) {
            // console.log(JSON.parse(xhr.response).link);
        },
        init(uploader) {
            this.instance = uploader.uploader._uploader;
            // console.log(uploader.uploader._uploader);
            // uploader.uploader._uploader.processQueue();
        },
        upload() {
            this.instance.processQueue();
        }
    }
}
</script>
<style scoped>
.dz-message {
    min-height: 200px;
    padding-top: 3%;
    background-color: #f1f1f1;
    border: 2px dashed #ccc;
}
</style>
