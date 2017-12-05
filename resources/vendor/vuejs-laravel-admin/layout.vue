<template>
    <div>
        <preloader v-show="this.$store.state.preloader"></preloader>
        <vueadmin_header></vueadmin_header>
        <div class="wrapper row-offcanvas">
            <left_side v-show="this.$store.state.left_open"></left_side>
            <right_side>
                <router-view></router-view>
            </right_side>
        </div>
    </div>
</template>
<style lang="scss" src="./assets/sass/custom.scss"></style>
<!-- use boxed.scss for boxed layout -->
 <!--<style lang="scss" src="./components/layouts/css/boxed.scss"></style>-->

 <!--use fixed-menu.scss for fixed menu layout -->
 <!--<style lang="scss" src="./components/layouts/css/fixed-menu.scss"></style>-->

<!-- use content_menu.scss for content-menu layout -->
 <!--<style lang="scss" src="./components/layouts/css/content_menu.scss"></style>-->

<!-- use centered-logo.scss for centered-logo layout -->
 <!--<style lang="scss" src="./components/layouts/css/centered-logo.scss"></style>-->

<script>
import preloader from "./components/layouts/preloader/preloader.vue";

import right_side from "./components/layouts/right-side.vue";
// import left-side from default or horizontal-menu or compact-menu
import left_side from "./components/layouts/left-side/default/left-side.vue";

// import left_side from "./components/layouts/left-side/horizontal-menu/left-side.vue";

// import from header.vue or fixed-header.vue or no-header.vue
import vueadmin_header from "./components/layouts/header/fixed-header.vue"

import anime from 'animejs';
export default {
    name: 'layout',
    components: {
        preloader,
        vueadmin_header,
        left_side,
        right_side
    },
    data() {
        return {
            showtopbtn: false
        }
    },
    mounted() {
        if (window.innerWidth <= 992) {
            this.$store.commit('left_menu', "close");
        }
    },

}
</script>
<style lang="scss" scoped>
.wrapper:before,
.wrapper:after {
    display: table;
    content: " ";
}
.wrapper:after {
    clear: both;
}
.wrapper {
    display: table;
    overflow-x: hidden;
    width: 100%;
    max-width: 100%;
    table-layout: fixed
}
.right-aside,
.left-aside {
    padding: 0;
    display: table-cell;
    vertical-align: top;
}
.right-aside{
    background-color: #ebf2f6 !important;
}
@media (max-width: 992px) {
    .wrapper > .right-aside {
        width: 100vw;
        min-width: 100vw;
    }
}
</style>
