<template>
    <span class="chart" :data-percent="percent" ref="pie">
        <span class="percent"><slot class="circle_val"></slot></span>
    </span>
</template>
<script>
import Vue from "vue";
let EasyPieChart = require("easy-pie-chart/dist/easypiechart.min.js")
export default {
    name: "easyPieChart",
    // ===Props passed to component
    props: {
        percent: {
            required: true,
            default: 0
        },
        barColor: {},
        trackColor: {},
        scaleColor: {},
        scaleLength: {},
        lineCap: {},
        lineWidth: {},
        size: {},
        rotate: {},
        animate: {},
        easing: {}
    },
    // ===Code to be executed when Component is mounted
    mounted() {
        this.chart = new EasyPieChart(this.$refs.pie, {
            barColor: this.barColor,
            trackColor: this.trackColor,
            scaleColor: this.scaleColor,
            scaleLength: this.scaleLength,
            lineCap: this.lineCap,
            lineWidth: this.lineWidth,
            size: this.size,
            rotate: this.rotate,
            animate: this.animate,
            easing: this.easing
        });
    },
    watch: {
        percent() {
            this.chart.update(this.percent);
        }
    },
    // ===Component data
    data() {
        return {
            chart: ""
        }
    },
    // ===Component methods
    methods: {

    }
}
</script>
<style scoped></style>
