<template>
<div class="col-md-4 col-sm-2 card_border">
    <b-card>
        <div class="deal_image">
            <img src="../../../assets/img/pages/deal_img.png">
        </div>
        <div class="img_box">
            <img src="../../../assets/img/pages/900x600.png" class="img-fluid" alt="LED Tv image">
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <span>Price:</span>
                <span><del>$ 2,031</del></span>
            </div>
            <div class="col-md-12">
                <span>Sale:</span>
                <span class="price_red">$ 1,031</span>
                <span>Save: 50%/off</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <p><b>Features :</b></p>
                <li>HD Ready (Resolution: 1366 x 768)</li>
                <li>Connectivity - Input: 2*HDMI, 1*VGA</li>
                <li> Remote controller</li>
                <li>DLED backlight</li>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="order_name mt-2"><b>Orders:</b></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="progress mt-3">
                    <div class="progress-bar w-50 progress_height" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6  mt-3">
                <div class="btn btn-danger text-white">Remove<i class="fa fa-trash ml-1"></i></div>
            </div>
        </div>
    </b-card>
</div>
</template>
<script>
import Vue from "vue";
export default {
    // ===Component name
    name: "today_deal",
    // ===Props passed to component
    props: {},
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
.price_red {
    color: #cd5c5c;
    font-size: 20px;
}

.deal_image {
    position: absolute;
    right: 15px;
}

.progress_height {
    height: 10px !important;
}
</style>
