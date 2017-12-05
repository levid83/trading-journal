<template>
<div>
    <div class="row">
        <div class="col-lg-6">
            <b-card header="Basic" header-tag="h4" class="bg-success-card">
                <multiselect v-model="value" :options="options"></multiselect>
            </b-card>
        </div>
        <div class="col-lg-6">
            <b-card header="Tagging" header-tag="h4" class="bg-primary-card">
                <multiselect v-model="tag_value" tag-placeholder="Add this as new tag" placeholder="Search tag" label="name" track-by="code" :options="object_options" :multiple="true" :taggable="true" @tag="addTag"></multiselect>
            </b-card>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <b-card header="Multi Select" header-tag="h4" class="bg-warning-card">
                <multiselect v-model="multi_value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" placeholder="Pick some">
                </multiselect>
            </b-card>
        </div>
        <div class="col-lg-6">
            <b-card header="Options object" header-tag="h4" class="bg-info-card">
                <multiselect v-model="object_value" :options="object_options" track-by="name" label="name"></multiselect>
            </b-card>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <b-card header=" Select with search" header-tag="h4" class="bg-danger-card">
                <multiselect v-model="value_search" :options="options1" placeholder="Select one" label="name" track-by="name"></multiselect>
            </b-card>
        </div>
    </div>
</div>
<!--</div>-->
</template>
<script>
import Vue from 'vue';
import Multiselect from 'vue-multiselect';

Vue.component(Multiselect);

export default {
    name: "vue_multiselect",
    components: {
        Multiselect
    },
    data() {
        return {
            value: null,
            multi_value: null,
            object_value: null,
            value_search: null,
            options: ['default', 'Select2', 'Selectize', 'MultiSelect'],
            tag_value: [{
                name: 'Javascript',
                code: 'js'
            }],
            options1: [{
                name: 'Vue.js',
                language: 'JavaScript'
            }, {
                name: 'Rails',
                language: 'Ruby'
            }, {
                name: 'Sinatra',
                language: 'Ruby'
            }, {
                name: 'Laravel',
                language: 'PHP'
            }, {
                name: 'Phoenix',
                language: 'Elixir'
            }],
            object_options: [{
                name: 'Vue.js',
                code: 'vu'
            }, {
                name: 'Javascript',
                code: 'js'
            }, {
                name: 'Monterail',
                code: 'pl'
            }, {
                name: 'Open Source',
                code: 'os'
            }]
        }
    },
    mounted: function() {

    },
    destroyed: function() {

    },
    methods: {
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
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
