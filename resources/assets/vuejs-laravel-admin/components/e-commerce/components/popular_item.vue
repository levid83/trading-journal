<template>
<div class="col-md-6 col-lg-4 card_border">
    <b-card>
        <div class="img_box">
            <img :src="item.image" class="img-fluid" alt="phone image">
        </div>
        <h4 class="model mt-2">{{item.name}}</h4>
        <hr>
        <div class="col-md-12">
            <b>Description:</b>

            <div class="text-justify">{{item.description}} <a href="">Read more</a>
            </div>
        </div>
        <div class="back_color mt-2">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 text-center mt-1">Cost</div>
                    <div class="col-6 mt-1">{{item.price}}$</div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-6 text-center mt-2">Rating</div>
                    <div class="col-lg-6  col-6 icon_star mt-2">
                        <i class="fa fa-star-o" v-for="star in item.stars"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pull-8">
            <div class="col-md-12 text-center mt-3">
                <div class="btn btn-info text-white">More</div>
            </div>
        </div>
    </b-card>
</div>
</template>
<script>
import Vue from "vue";
export default {
    // ===Component name
    name: "popular_item",
    // ===Props passed to component
    props: {
        item: {
            required: true,
            type: Object
        }
    },
    // ===Components used by this component
    components: {

    },
    // ====component Data properties
    data() {
        return {

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
<style scoped>
.back_color {
    background-color: #f2f2f2 !important;
}

.icon_star {
    color: #f5a022;
    font-size: 19px;
}
</style>
