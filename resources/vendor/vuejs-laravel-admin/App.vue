<template>
    <div id="app">
        <router-view></router-view>
    </div>
</template>
<script>
import Vue from "vue";
import BootstrapVue from 'bootstrap-vue';
import ToggleButton from 'vue-js-toggle-button'
Vue.use(ToggleButton)
Vue.use(BootstrapVue);
export default {
    name: 'app'
}
</script>
<style lang="sass">
@import ./assets/sass/bootstrap/bootstrap.scss
</style>
<style src="font-awesome/css/font-awesome.css"></style>
<style src="bootstrap-vue/dist/bootstrap-vue.css"></style>
<style src="simple-line-icons/css/simple-line-icons.css"></style>