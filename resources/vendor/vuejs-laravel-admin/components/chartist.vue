<template>
    <div>
        <div class="row">
            <div class="col-sm-6">
                <b-card header="Chartist Line" header-tag="h4" class="bg-primary-card">
                    <vue-chartist :data="line.data" :options="line.options" type="Line" ref="chartist3"></vue-chartist>
                </b-card>
            </div>
            <div class="col-sm-6">
                <b-card header="Chartist Area" header-tag="h4" class="bg-primary-card">
                    <vue-chartist :data="area.data" :options="area.options" type="Line" ref="area"></vue-chartist>
                </b-card>
            </div>
            <div class="col-sm-6">
                <b-card header="Chartist bar" header-tag="h4" class="bg-info-card">
                    <vue-chartist :data="bar.data" :options="bar.options" :responsiveOptions="bar.responsiveOptions" type="Bar" ref="chartist2"></vue-chartist>
                </b-card>
            </div>
            <div class="col-sm-6">
                <b-card header="Horizontal bar" header-tag="h4" class="bg-info-card">
                    <vue-chartist :data="horizontal.data" :options="horizontal.options" type="Bar" ref="chartist2"></vue-chartist>
                </b-card>
            </div>
            <div class="col-sm-6">
                <b-card header="Series Override" header-tag="h4" class="bg-success-card">
                    <vue-chartist :data="series.data" :options="series.options" :responsiveOptions="series.responsiveOptions" type="Line" ref="chartist4"></vue-chartist>
                </b-card>
            </div>
            <div class="col-sm-6">
                <b-card header=" Fixed Scale Axis Chart" header-tag="h4" class="bg-success-card">
                    <vue-chartist :data="axischart.data" :options="axischart.options" type="Line" ref="chartist5"></vue-chartist>
                </b-card>
            </div>
            <div class="col-sm-6">
                <b-card header="Pie Chart" header-tag="h4" class="bg-info-card piechart">
                    <vue-chartist :data="pie.data" :options="pie.options" type="Pie" :responsiveOptions="pie.responsiveoptions" ref="chartist6"></vue-chartist>
                </b-card>
            </div>
            <div class="col-sm-6">
                <b-card header="Donut Chart" header-tag="h4" class="bg-info-card">
                    <vue-chartist :data="donut.data" :options="donut.options" type="Pie" :responsiveOptions="donut.responsiveoptions" ref="chartist6"></vue-chartist>
                </b-card>
            </div>
        <!--==============polar chart ========-->
            <div class="col-sm-6">
                <b-card header="Polar Chart" header-tag="h4" class="bg-primary-card">
                    <vue-chartist :data="polar.data" :options="polar.options" type="Bar" ref="chartist7"></vue-chartist>
                </b-card>
            </div>
            <div class="col-sm-6">
                <b-card header="Time Series With Moment" header-tag="h4" class="bg-primary-card">
                    <vue-chartist :data="time.data" :options="time.options" ype="line" ref="chartist8"></vue-chartist>
                </b-card>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import VueChartist from 'v-chartist';
import Chartist from "chartist";
var unsub;
export default {
    name: "charts",
    components: {
        VueChartist
    },
    mounted: function() {
        unsub = this.$store.subscribe((mutation, state) => {
            if (mutation.type == "left_menu") {
                setTimeout(() => {
                    this.$refs.area.renderChart();
                    this.$refs.chartist2.renderChart();
                    this.$refs.chartist3.renderChart();
                    this.$refs.chartist4.renderChart();
                    this.$refs.chartist6.renderChart();
                    this.$refs.chartist7.renderChart();
                    this.$refs.chartist8.renderChart();
                })
            }
        });
    },
    data() {
        return {
            // =======line chart start===========
            line: {
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                    series: [
                        [12, 9, 7, 8, 5],
                        [2, 1, 3.5, 7, 3],
                        [1, 3, 4, 5, 6]
                    ]
                },
                options: {
                    fullWidth: true,
                    chartPadding: {

                        right: 40
                    }
                }
            },
            // =======Line chart end========
            // =======area chart start========
            area: {
                data: {
                    labels: ['2010', '2011', '2012', '2013', '2014', '2015', '2016'],
                    series: [
                        [2, 8, 3, 7, 4, 6, 4],
                        [5, 2, 6, 2, 7, 2, 6]
                    ]
                },
                options: {
                    top: 0,
                    low: 1,
                    showPoint: true,
                    fullWidth: true,

                    axisY: {
                        labelInterpolationFnc: function(value) {
                            return (value / 1) + 'k';
                        }
                    },
                    showArea: true
                }
            },
            // =======area chart end========
            series: {
                data: {
                    labels: ['1', '2', '3', '4', '5', '6', '7', '8'],
                    // Naming the series with the series object array notation
                    series: [{
                        name: 'series-1',
                        data: [5, 2, -4, 2, 0, -2, 5, -3]
                    }, {
                        name: 'series-2',
                        data: [4, 3, 5, 3, 1, 3, 6, 4]
                    }, {
                        name: 'series-3',
                        data: [2, 4, 3, 1, 4, 5, 3, 2]
                    }]
                },
                options: {
                    fullWidth: true,
                    // Within the series options you can use the series names
                    // to specify configuration that will only be used for the
                    // specific series.
                    series: {
                        'series-1': {
                            lineSmooth: Chartist.Interpolation.step()
                        },
                        'series-2': {
                            lineSmooth: Chartist.Interpolation.simple(),
                            showArea: true
                        },
                        'series-3': {
                            showPoint: false
                        }
                    }
                },
                responsiveOptions: [
                    // You can even use responsive configuration overrides to
                    // customize your series configuration even further!
                    ['screen and (max-width: 320px)', {
                        series: {
                            'series-1': {
                                lineSmooth: Chartist.Interpolation.none()
                            },
                            'series-2': {
                                lineSmooth: Chartist.Interpolation.none(),
                                showArea: false
                            },
                            'series-3': {
                                lineSmooth: Chartist.Interpolation.none(),
                                showPoint: true
                            }
                        }
                    }]
                ]
            },
            // =========================axis chart===========
            axischart: {
                data: {
                    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
                    series: [
                        [12, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6],
                        [4, 5, 3, 7, 3, 5, 5, 3, 4, 4, 5, 5],
                        [5, 3, 4, 5, 6, 3, 3, 4, 5, 6, 3, 4]
                    ]
                },
                options: {
                    fullWidth: true,
                    axisX: {
                        onlyInteger: true
                    },
                    axisY: {
                        ticks: [0, 50, 75, 87.5, 100],
                        low: 0
                    },
                    lineSmooth: Chartist.Interpolation.step(),
                    showPoint: false
                }
            },
            bar: {
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    series: [
                        [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                        [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                    ]
                },
                options: {
                    seriesBarDistance: 15
                },
                responsiveOptions: [
                    ['screen and (min-width: 641px) and (max-width: 1024px)', {
                        seriesBarDistance: 10,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value;
                            }
                        }
                    }],
                    ['screen and (max-width: 640px)', {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value[0];
                            }
                        }
                    }]
                ]
            },
            horizontal: {
                data: {
                    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                    series: [
                        [5, 4, 3, 7, 5, 10, 3],
                        [3, 2, 9, 5, 4, 6, 4]
                    ]
                },
                options: {
                    seriesBarDistance: 10,
                    reverseData: true,
                    horizontalBars: true,
                    axisY: {
                        offset: 70
                    }
                }
            },
            // ======pie chart start=======
            pie: {
                data: {
                    labels: ['A', 'B', 'C'],
                    series: [20, 15, 40]
                },
                options: {
                    labelInterpolationFnc: function(value) {
                        return value[0]
                    }
                },
                responsiveoptions: [
                    ['screen and (min-width: 640px)', {
                        chartPadding: 30,
                        labelOffset: 50,
                        labelDirection: 'explode',
                        labelInterpolationFnc: function(value) {
                            return value;
                        }
                    }],
                    ['screen and (min-width: 1024px)', {
                        labelOffset: 45,
                        chartPadding: 20
                    }]
                ]
            },
            // ======pie chart end================
            // ======donut chart start=======
            donut: {
                data: {
                    labels: ['A', 'B', 'C'],
                    series: [30, 20, 50]
                },
                options: {
                    donut: true,
                    donutWidth: 60,
                    labelInterpolationFnc: function(value) {
                        return value[0]
                    }
                },
                responsiveoptions: [
                    ['screen and (min-width: 640px)', {
                        chartPadding: 30,
                        labelOffset: 60,
                        labelDirection: 'explode',
                        labelInterpolationFnc: function(value) {
                            return value;
                        }
                    }],
                    ['screen and (min-width: 1024px)', {
                        labelOffset: 50,
                        chartPadding: 20
                    }]
                ]
            },
            // ======donut chart end================

//            //===========ploar chart===================
            polar: {
                data: {
                    color:['red'],
                    labels: ['W1', 'W2', 'W3', 'W4', 'W5', 'W6', 'W7', 'W8', 'W9', 'W10'],
                    series: [
                        [1, 2, 4, 8, 6, -2, -1, -4, -6, -2]
                    ]
                },
                options: {
                    high: 10,
                    low: -10,
                    axisX: {
                        labelInterpolationFnc: function(value, index) {
                            return index % 2 === 0 ? value : null;
                        }
                    }
                },
            },
//            //===========ploar chart end===================
            // =======line chart start===========
            time: {
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                    series: [
                        {
                            name: 'series-1',
                            data: [
                                {x: new Date(143134652600), y: 53},
                                {x: new Date(143234652600), y: 40},
                                {x: new Date(143340052600), y: 45},
                                {x: new Date(143366652600), y: 40},
                                {x: new Date(143410652600), y: 20},
                                {x: new Date(143508652600), y: 32},
                                {x: new Date(143569652600), y: 18},
                                {x: new Date(143579652600), y: 11}
                            ]
                        },
                        {
                            name: 'series-2',
                            data: [
                                {x: new Date(143134652600), y: 53},
                                {x: new Date(143234652600), y: 35},
                                {x: new Date(143334652600), y: 30},
                                {x: new Date(143384652600), y: 30},
                                {x: new Date(143568652600), y: 10}
                            ]
                        }
                    ]
                },
                options: {
                    fullWidth: true,
                    chartPadding: {
                        right: 40
                    }
                }
            },
            // =======Line chart end========

        }
    },
    methods: {

    },
    beforeRouteLeave (to, from, next) {        unsub();        next();    },


}
</script>
<style src="chartist/dist/chartist.css"></style>
<style>
    .piechart .ct-label{
        fill:#fff;
    }
</style>
