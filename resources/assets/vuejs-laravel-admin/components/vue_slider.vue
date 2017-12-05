<template>
    <div>
        <div class="row">
            <div class="col-lg-12 mb-2">
                <b-card header=" Basic" header-tag="h4" class="bg-default-card">
                    <h5>The value of slider is {{value}}</h5>
                    <vue-slider v-model="value" class="mt-5"></vue-slider>
                    <vue-slider v-model="value" class="mt-5 centeralign" direction="vertical" :reverse=true height="300px" width="5"></vue-slider>
                </b-card>
            </div>
            <div class="col-lg-12 mb-2">
                <b-card header="Options" header-tag="h4" class="bg-warning-card">
                    <ul>
                        <li>min : 20</li>
                        <li>max : 90</li>
                        <li>reverse : true</li>
                        <li>tooltip-dir : left</li>
                        <li>interval : 5</li>
                        <li>piecewise : true</li>
                        <li>value : {{value1}}</li>
                    </ul>
                    <vue-slider v-model="value1" class="m-t-25" tooltip-dir="left" :reverse="true" :min="20" :max="90" :interval="5" :piecewise="true"></vue-slider>
                </b-card>
            </div>
            <div class="col-lg-12 mb-2">
                <b-card header=" Range" header-tag="h4" class="bg-info-card">
                    <h5>The value of slider is {{value2}}</h5>
                    <vue-slider v-model="value2" class="mt-5" :range="true"></vue-slider>
                </b-card>
            </div>
            <div class="col-lg-12 mb-2">
                <b-card header="Custom Data" header-tag="h4" class="bg-danger-card">
                    <h5>The value of slider is {{value3}}</h5>
                    <vue-slider v-model="value3" class="mt-5" :data="['jan','feb','mar','apr','jun','jul','aug','sept','oct','nov','dec']" :piecewise="true" :piecewiseStyle='{"backgroundColor": "#000"}'></vue-slider>
                </b-card>
            </div>
        </div>
    </div>
</template>
<script>
import vueSlider from 'vue-slider-component';
export default {
    name: "vue_slider",
    components: {
        vueSlider
    },
    data() {
        return {
            value: 15,
            value1: 35,
            value2: [20, 50],
            value3: "jul"
        }
    },
    mounted: function() {

    },
    destroyed: function() {

    }
}
</script>
<style scoped>
.centeralign {
    text-align: -webkit-center;
    text-align: -moz-center;
}
</style>
