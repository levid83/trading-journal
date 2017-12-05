<template>
    <div>
        <div class="row">
            <div class="col-lg-6">
                <b-card class="mb-1 mt-4 pt-1 bg-primary" variant="primary">
                    <h5 class="text-white"> Card Primary</h5></b-card>
                <b-card class="mb-1 pt-2 bg-danger" variant="danger">
                    <h5 class="text-white">Card Danger</h5></b-card>
                <b-card class="mb-1 pt-2 bg-warning" variant="warning">
                    <h5 class="text-white">Card Warning</h5></b-card>
                <b-card class="mb-5 pt-2 bg-success" variant="success">
                    <h5 class="text-white">Card Success</h5></b-card>
            </div>
            <div class="col-lg-6">
                <b-card header="Card Header & Footer" header-tag="h4" class=" bg-success-card mb-3 mt-4" title="Main Title" sub-title="Card subtitle" show-footer>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum.
                    </p>
                    <p slot="footer" class="mt-2">
                        Last updated 3 mins ago
                    </p>
                </b-card>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <b-card header="Card Alignments" header-tag="h4" class="bg-info-card">
                    <div class="row">
                        <div class="col-lg-4">
                            <b-card header="Card Left" header-tag="h4" class="mb-2 mt-2 bg-primary-card" align="left">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                </p>
                            </b-card>
                        </div>
                        <div class="col-lg-4">
                            <b-card header="Card center" header-tag="h4" class="mb-2 mt-2 bg-danger-card" align="center">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum.
                                </p>
                            </b-card>
                        </div>
                        <div class="col-lg-4">
                            <b-card header="Card Right" header-tag="h4" class="mb-2 mt-2 bg-warning-card" align="right">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Ipsum.
                                </p>
                            </b-card>
                        </div>
                    </div>
                </b-card>
            </div>
        </div>
        
        <b-card header-tag="h4" class="bg-danger-card" header="Cards with Different Tabs">
            <div class="row ">
                <div class="col-lg-12">
                    <b-tabs>
                        <b-tab title="First tab" active>
                            <p class="mt-4"> I'm the first fading tab Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            </p>
                        </b-tab>
                        <b-tab title="Second tab">
                            <p class="mt-4"> I'm the Second fading tab Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            </p>
                        </b-tab>
                        <b-tab title="Third tab">
                            <p class="mt-4"> I'm the Third fading tab Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            </p>
                        </b-tab>
                    </b-tabs>
                </div>
            </div>
        </b-card>
        <div class="row">
            <div class="col-lg-12">
                <b-card class="mb-5 mt-2 bg-info-card" header="Cards With Content" header-tag="h4">
                    <div class="row">
                        <div class="col-lg-6">
                            <b-card header="Card Header" header-tag="h4" class="mb-5 mt-4" title="Main Title">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum.
                                </p>
                            </b-card>
                        </div>
                        <div class="col-lg-6">
                            <b-card class="mb-3 mt-4" title="Main Title" show-footer>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum.
                                </p>
                                <p slot="footer" class="mt-3">
                        Last updated 3 mins ago
                   </p>
                            </b-card>
                        </div>
                    </div>
                </b-card>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <b-card class="mb-5  bg-success-card" show-footer header="Card With image" header-tag="h4">
                    <img class="img-fluid " src="../assets/img/pages/headsset.jpg">
                    <p slot="footer" class="pt-3">
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                    </p>
                </b-card>
            </div>
            <div class="col-lg-6">
                <b-card header="Card" header-tag="h4" variant="info" class="mb-5 bg-info text-white" title="Main Title">
                    <p class="text-white">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum.
                    </p>
                    <p class="text-white">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum.
                    </p>
                    <p class="text-white">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum.
                    </p>
                </b-card>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from "vue"

export default {
    name: "cards",
    components: {},
    data() {
        return {
            tabIndex: null,
            tabs: [],
            tabCounter: 0
        }
    },
    methods: {

        closeTab(x) {
            for (let i = 0; i < this.tabs.length; i++) {
                if (this.tabs[i] === x) {
                    this.tabs.splice(i, 1);
                }
            }
        },
        newTab() {
            if (this.tabCounter < 4) {
                this.tabs.push(this.tabCounter++);
            }

        },

    }
}
</script>
