<template>
<div>
    <b-card>
        <div class="col-md-12">
            <div class="row">
                <!--===============================left side content===================   -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInput1" class="product_label">Product Name</label>
                        <input type="email" class="form-control form-control-lg" id="exampleInput1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput2" class="product_label">Manufacturer Name</label>
                        <input type="email" class="form-control form-control-lg" id="exampleInput2" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleInput3" class="product_label">Manufacturer Brand</label>
                        <input type="email" class="form-control form-control-lg" id="exampleInput3" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput5" class="product_label">Cost</label>
                        <input type="email" class="form-control form-control-lg" id="exampleInput5" aria-describedby="emailHelp">
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="product_label">Country</label>
                            <multiselect v-model="value" :options="options"></multiselect>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea2" class="product_label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea2" rows="4"></textarea>
                    </div>

                </div>
                <!--===================right side content ==========================-->
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="../../assets/img/pages/20.jpg" class="img-fluid" alt="Product image">
                        </div>
                        <div class="col-md-6 ml-auto"></div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="product_label">Comment</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <vue-dropzone ref="product_attachment" id="dropzone" :options="dropzoneOptions" @vdropzone-success="uploaded"></vue-dropzone>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center mt-3">
                            <button class="btn btn-success btn-lg">Submit</button>
                        </div>
                        <div class="col-md-6 text-center mt-3 mb-2">
                            <button class="btn btn-warning btn-lg text-white">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </b-card>
</div>
</template>
<script>
import Vue from "vue"
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.css'
import Multiselect from 'vue-multiselect'
export default {
    // ===Component name
    name: "product_edit",
    // ===Props passed to component
    props: {},
    // ===Components used by this component
    components: {
        vueDropzone: vue2Dropzone,
        Multiselect,
    },
    // ====component Data properties
    data() {
        return {
            value: null,
            options: ['India', 'Texas', 'UK', 'Newyork', 'Canada'],
            dropzoneOptions:{
                url: 'https://httpbin.org/post',
                thumbnailWidth: 150,
                // maxFilesize: 0.5,
                maxFiles:3,
                headers: { "My-Awesome-Header": "header value" }
            }
        }
    },
    // ===Code to be executed when Component is mounted
    mounted() {

    },
    // ===Computed properties for the component
    computed: {},
    // ===Component methods
    methods: {
        uploaded(file, response) {
            // console.log(file)
            // console.log(response)
            console.log('File successfully uploaded')
        }
    }
}
</script>
<!-- styles -->
<style src="vue-multiselect/dist/vue-multiselect.min.css">
</style>
<!-- adding scoped attribute will apply the css to this component only -->
<style scoped>
.product_label {
    font-size: 15px;
}
</style>
