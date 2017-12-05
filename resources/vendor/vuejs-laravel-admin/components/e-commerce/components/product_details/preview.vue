<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xl-12  mt-5">
                    <div class="row">
                        <a class="magnifier-thumb-wrapper mx-auto">
                            <img id="thumb" src="../../../../assets/img/pages/polo.jpg" class="img-fluid" alt="Mobile image">
                        </a>
                        <div class="magnifier-preview" id="preview" style="width: 200px; height: 303px"></div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-12 text-center right_modal ml-5">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12" v-for="(image,index) in thumbs">
                            <b-btn  @click="openPictureModal(index)" class="mb-3 small_img">
                                <img src="../../../../assets/img/pages/T-shirt.png" class="img-fluid slide-preview" alt="phone image">
                            </b-btn>
                            <!-- Modal Component -->
                            <b-modal title="Modal" ref="pictureModal">
                                <img src="../../../../assets/img/pages/T-shirt.png" class="img-fluid" alt="small phone image missing">
                            </b-modal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from "vue";
import vueSlider from 'vue-slider-component';
import Magnifier from "../../../../assets/js/Magnifier.js";
import Event from "../../../../assets/js/Event.js";
require('../../../../assets/css/magnifier.css');


export default {
    // ===Component name
    name: "product_preview",
    // ===Props passed to component
    props: {
        thumb: {
            required: true
        },
        thumbs: {
            required: true,
            type: Array
        },
        large: {
            required: true
        }
    },
    // ===Components used by this component
    components: {
        vueSlider
    },
    // ====component Data properties
    data() {
        return {
            value2: [20, 50],
            value: null,
            multi_value: null,
            object_value: null,
            value_search: null,
        }
    },
    // ===Code to be executed when Component is mounted
    mounted() {
        let evt = new Event();
        let m = new Magnifier(evt);
        m.attach({
            thumb: '#thumb',
            large: this.large,
            largeWrapper: 'preview'
        });
    },
    // ===Computed properties for the component
    computed: {},
    // ===Component methods
    methods: {
        openPictureModal(ref) {
            this.$refs.pictureModal[ref].show()
        },
        addTag(newTag) {
            const tag = {
                name: newTag,
                code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
            }
            this.object_options.push(tag)
            this.tag_value.push(tag)
        }
    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style><!-- styles -->
<!-- adding scoped attribute will apply the css to this component only -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
#preview {
    position: absolute;
    left: 85%;
    top: 5%;
}
.slide-preview {
    max-height: 100px;
}
.small_img{
    border:none !important;
    background-color: #fff !important;
}.small_img:hover{
    background-color: #fff !important;
 }
.right_modal {
    margin-top: 20px;
}
@media(max-width: 320px) {
    #preview {
        position: absolute;
        left: 5%;
        top: 105%;
    }
}
@media (max-width: 768px){
    #preview{
        left:77%;
    }
}
</style>
