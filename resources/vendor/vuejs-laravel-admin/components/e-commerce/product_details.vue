<template>
<div>
    <div class="row">
        <div class="col-lg-12">
        <b-card>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xl-9 col-lg-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                            <preview :thumb="preview.thumb" :large="preview.large" :thumbs="preview.thumbs"></preview>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                            <preview-details></preview-details>
                        </div>
                        <div class="col-lg-12">
                            <preview-description></preview-description>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-12">
                    <preview-categories></preview-categories>
                </div>
            </div>
          </div>
        </b-card>
        </div>
    </div>
</div>
</template>
<script>
import preview from "./components/product_details/preview"
import previewDetails from "./components/product_details/preview_details"
import previewDescription from "./components/product_details/preview_description"
import previewCategories from "./components/product_details/preview_categories"

import Vue from "vue";

export default {
    // ===Component name
    name: "product_details",
    // ===Props passed to component
    props: {},
    // ===Components used by this component
    components: {
        preview,
        previewDetails,
        previewDescription,
        previewCategories
    },
    // ====component Data properties
    data() {
        return {
            preview: {
                thumb: require('../../assets/img/pages/polo.jpg'),
                large: require('../../assets/img/pages/polo.jpg'),
                thumbs: [
                    require('../../assets/img/pages/183x338_1.png'),
                    require('../../assets/img/pages/183x338_1.png'),
                    require('../../assets/img/pages/183x338_1.png')
                 ],
            },
            details: {
            },
            features: {
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

    }
}
</script>
<!-- styles -->
<!-- adding scoped attribute will apply the css to this component only -->
<style scoped src="../../assets/sass/product_details.scss"></style>
