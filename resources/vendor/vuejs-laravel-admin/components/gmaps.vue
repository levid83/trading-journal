<template>
    <div class="row">
        <div class="col-lg-6">
            <b-card header="Basic" header-tag="h4" class="bg-primary-card">
                <gmap-map :center="center" :zoom="5" class="gmap" ref="gmap1"></gmap-map>
            </b-card>
        </div>
        <div class="col-lg-6">
            <b-card header="Map with Markers" header-tag="h4" class="bg-success-card">
                <gmap-map :center="center" :zoom="5" class="gmap" ref="gmap2">
                    <gmap-marker v-for="m in markers" :key="m.position.lat" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position"></gmap-marker>
                </gmap-map>
            </b-card>
        </div>
        <div class="col-lg-6">
            <b-card header="Map with Clustering" header-tag="h4" class="bg-warning-card">
                <gmap-map :center="center" :zoom="4" class="gmap" ref="gmap3">
                    <gmap-cluster>
                        <gmap-marker v-for="m in markers" :key="m.position.lat" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position"></gmap-marker>
                    </gmap-cluster>
                </gmap-map>
            </b-card>
        </div>
        <div class="col-lg-6">
            <b-card header="Satellite" header-tag="h4" class="bg-info-card">
                <!-- to get different map types change mapTypeId -->
                <gmap-map :center="center" :zoom="4" class="gmap" mapTypeId="hybrid" ref="gmap4"></gmap-map>
            </b-card>
        </div>
    </div>
</template>
<script>
var unsub;
import Vue from 'vue';
import * as VueGoogleMaps from 'vue2-google-maps';

Vue.use(VueGoogleMaps, {
    load: {
        key:'AIzaSyADWjiTRjsycXf3Lo0ahdc7dDxcQb475qw'
        // key: 'your gmaps api key'
        // v: 'OPTIONAL VERSION NUMBER',
        // libraries: 'places', // If you need to use place input
    }
});
export default {
    name: "gmaps",
    mounted: function() {

    },
    destroyed: function() {

    },
    data() {
        return {
            center: {
                lat: 17.387140,
                lng: 78.491684
            },
            markers: [{
                position: {
                    lat: 17.387140,
                    lng: 78.491684
                }
            }, {
                position: {
                    lat: 12.972442,
                    lng: 77.580643
                }
            }, {
                position: {
                    lat: 18.910000,
                    lng: 72.809998
                }
            }]
        }
    },
    mounted() {
        unsub = this.$store.subscribe((mutation, state) => {
            if (mutation.type == "left_menu") {
                setTimeout(() => {
                    this.$refs.gmap1.resize();
                    this.$refs.gmap2.resize();
                    this.$refs.gmap3.resize();
                    this.$refs.gmap4.resize();
                })
            }
        });
    },
    beforeRouteLeave (to, from, next) {        unsub();        next();    },
}
</script>
<style scoped>
.gmap {
    width: 100%;
    height: 300px;
    margin: 5px auto;
}
</style>
