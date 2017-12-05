<template>
    <div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>{{filterOption}} Gallery</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-lg-right text-md-right  text-sm-right">
                <div class="btn-group">
                    <button v-for="(val, key) in option.getFilterData" class="btn" :class="[key===filterOption? 'is-checked' : '']" @click="filter(key)">{{key}}
                    </button>
                </div>
            </div>
        </div>
        <isotope class="center-block" ref="cpt" id="isotope" :item-selector="'element-item'" :list="list" :options='option' v-images-loaded:on.progress="layout" @filter="filterOption=arguments[0]">
            <div v-for="element,index in list" :key="index" :class="element.filter">
                <a :href="element.src">
                    <img :src="element.src" class="img-fluid">
                </a>
            </div>
        </isotope>
    </div>
</template>
<script>
var unsub;
import isotope from 'vueisotope'
import imagesLoaded from 'vue-images-loaded'
import baguetteBox from "baguettebox.js";

require("baguettebox.js/dist/baguetteBox.min.css");
export default {
    directives: {
        imagesLoaded,
    },
    components: {
        isotope,
    },
    data() {
        return {
            list: [{
                src: require( "../assets/img/pages/blog1.jpeg"),
                filter: "Landscape"
            }, {
                src: require( "../assets/img/pages/blog2.png"),
                filter: "Studio"
            }, {
                src: require( "../assets/img/pages/timeline1.jpeg"),
                filter: "Studio"
            }, {
                src: require( "../assets/img/pages/blog3.jpeg"),
                filter: "Landscape"
            }, {
                src: require( "../assets/img/pages/blog1.jpeg"),
                filter: "Studio"
            }, {
                src: require( "../assets/img/pages/profile-coverbg.jpeg"),
                filter: "Landscape"
            }, {
                src: require( "../assets/img/pages/blog2.png"),
                filter: "Studio"
            }, {
                src: require( "../assets/img/pages/timeline.jpeg"),
                filter: "Studio"
            }, {
                src: require( "../assets/img/pages/blog3.jpeg"),
                filter: "Studio"
            }, {
                src: require( "../assets/img/pages/blog1.jpeg"),
                filter: "Studio"
            }],
            filterOption: "All",
            option: {
                itemSelector: ".element-item",
                getFilterData: {
                    All() {
                        return true;
                    },
                    Landscape(el) {
                        return el.filter === "Landscape";
                    },
                    Studio(el) {
                        return el.filter === "Studio";
                    }
                }
            }
        }

    },
    methods: {
        filter: function(key) {
            this.$refs.cpt.filter(key);
        },
        layout() {
            this.$refs.cpt.layout('masonry');
        }
    },
    mounted() {
        unsub = this.$store.subscribe((mutation, state) => {
            if (mutation.type == "left_menu") {
                setTimeout(() => {
                    this.$refs.cpt.layout('masonry');
                    setTimeout(() => {
                        this.$refs.cpt.layout('masonry');
                    }, 600)
                });
            }
        });
        baguetteBox.run('#isotope');
    },
    beforeRouteLeave (to, from, next) {        unsub();        next();    },
}
</script>
<style scoped>
.element-item {
    padding: 7px;
}

.element-item img {
    width: 300px;
}

@media screen and (max-width: 1250px)and (min-width: 1100px) {
    .element-item img {
        width: 400px;
    }
}

@media screen and (max-width: 991px) and (min-width: 900px) {
    .element-item img {
        width: 270px;
    }
}

@media screen and (max-width: 899px) and (min-width: 775px) {
    .element-item img {
        width: 350px;
    }
}

@media screen and (max-width: 670px) and (min-width: 400px) {
    .element-item img {
        width: 270px;
    }
}

button.is-checked {
    background-color: #428bca;
    color: #fff;
}

button.btn {
    cursor: pointer;
}
</style>
