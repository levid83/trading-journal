<template>
    <div>
        <vue-dropzone ref="product_attachment" id="dropzone" :options="dropzoneOptions" @vdropzone-success="uploaded"></vue-dropzone>
    </div>
</template>
<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.css'
export default {
    name: 'vue2-dropzone',
    components: {
        vueDropzone: vue2Dropzone,
    },
    data(){
        return{
            dropzoneOptions:{
                url: 'https://httpbin.org/post',
                thumbnailWidth: 150,
                // maxFilesize: 0.5,
                maxFiles:3,
                headers: { "My-Awesome-Header": "header value" }
            }
        }
    },
    methods: {
        uploaded() {
            console.log('File successfully uploaded')
        }
    }
}
</script>
<style scoped>
 .dz-progress{
        background-color: #08aa80 !important;
    }
</style>
