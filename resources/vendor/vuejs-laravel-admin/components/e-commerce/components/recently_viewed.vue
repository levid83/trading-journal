<template>
<div class="col-lg-3 col-md-6 card_border">
    <b-card>
        <div class="img_box">
            <img :src="viewed.image" class="img-fluid" alt="LED tv image">
        </div>
        <hr>
        <div><b>Cost</b></div>
        <div class="price">$ {{viewed.price}}</div>
        <div class="row">
            <div class="col-md-6"><b>Rating</b></div>
            <div class="col-md-12 icon_star">
                <i class="fa fa-star-o mr-1" v-for="star in viewed.stars"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class=" col-md-4  mt-3">
                    <div class="btn btn-info text-white">Like <i class="fa fa-thumbs-o-up"></i></div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="btn btn-danger text-white">Remove <i class="fa fa-trash"></i></div>
                </div>

            </div>
        </div>
    </b-card>
</div>
</template>
<script>
import Vue from "vue";
export default {
    // ===Component name
    name: "recently_viewed",
    // ===Props passed to component
    props: {
        viewed: {
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
.icon_star {
    color: #f5a022;
    font-size: 19px;
}

.price {
    color: #008000;
    font-size: 25px;
}
</style>
