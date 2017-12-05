<template>
    <div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <b-card header="Basic Bar chart" header-tag="h4" class="bg-success-card">
                    <div style="height: 350px;">
                        <IEcharts :option="bar" :loading="loading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-12 mb-3">
                <b-card header="AJAX Bar chart" header-tag="h4" class="bg-info-card">
                    <div style="height: 350px;">
                        <IEcharts :option="ajaxbar" :loading="ajaxloading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-12 mb-3">
                <b-card header="Stacked Bar Chart" header-tag="h4" class="bg-success-card">
                    <div style="height: 350px;">
                        <IEcharts :option="stacked" :loading="loading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-12 mb-3">
                <b-card header="Colored Bars" header-tag="h4" class="bg-primary-card">
                    <div style="height: 350px;">
                        <IEcharts :option="colored" :loading="loading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-12 mb-3">
                <b-card header="Negative Bar chart" header-tag="h4" class="bg-warning-card">
                    <div style="height: 400px;">
                        <IEcharts :option="negativebar" :loading="loading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-12 mb-3">
                <b-card header="Mixed Chart" header-tag="h4" class="bg-primary-card">
                    <div style="height: 400px;">
                        <IEcharts :option="mixed" :loading="loading" @ready="onReady" ref="dynamicchart"></IEcharts>
                    </div>
                </b-card>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
//uncomment below line to import all charts at once
// import IEcharts from 'vue-echarts-v3';
//use only necessary charts to reduce size of package
import IEcharts from 'vue-echarts-v3/src/full.js';
import 'echarts/lib/chart/line';
import 'echarts/lib/chart/bar';
import 'echarts/lib/component/dataZoom';
import 'echarts/lib/component/legend';
import 'echarts/lib/component/tooltip';
import 'echarts/lib/chart/effectScatter';
import 'echarts/lib/component/title';

import 'echarts/lib/component/markPoint';
import 'echarts/lib/component/markLine';

import 'echarts/lib/component/timeline';
import 'echarts/lib/component/toolbox';

import 'zrender/lib/vml/vml';
import LinearGradient from 'zrender/lib/graphic/LinearGradient'
var unsub;
export default {
    name: "echarts",
    components: {
        IEcharts
    },
    data() {
        return {
            serverdata: [],
            instances: [],
            loading: false,
            ajaxloading: true,
            //===========basic chart data start=========
            bar: {
                grid: {
                    top: 25,
                    bottom: 40,
                    right: '7%',
                },
                xAxis: {
                    data: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'],
                    axisLabel: {
                        inside: true,
                        textStyle: {
                            color: '#fff'
                        },
                    },
                    axisTick: {
                        show: false
                    },
                    axisLine: {
                        show: false
                    },
                    z: 10
                },
                yAxis: {
                    axisLine: {
                        show: false
                    },
                    axisTick: {
                        show: false
                    },
                    axisLabel: {
                        textStyle: {
                            color: '#999'
                        }
                    }
                },
                series: [{
                    type: 'bar',
                    itemStyle: {
                        normal: {
                            color: '#6ebabe'
                        }
                    },
                    data: [220, 182, 191, 234, 290, 330, 310, 123, 442, 321, 90, 149]
                }]
            },
            //===========basic chart data end=========
            //===========AJAX chart data start=========
            ajaxbar: {
                grid: {
                    top: 25,
                    bottom: 40,
                    right: '7%',
                },
                xAxis: {
                    data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    axisLabel: {
                        inside: false,
                        textStyle: {
                            color: '#000'
                        },
                    },
                    axisTick: {
                        show: false
                    },
                    axisLine: {
                        show: false
                    },
                    z: 10
                },
                yAxis: {
                    axisLine: {
                        show: false
                    },
                    axisTick: {
                        show: false
                    },
                    axisLabel: {
                        textStyle: {
                            color: '#999'
                        }
                    }
                },
                series: [{
                    type: 'bar',
                    itemStyle: {
                        normal: {
                            color: '#6f8dd5'
                        }
                    },
                    data: []
                }]
            },
            //===========AJAX chart data end=========
            //===========Negative chart data end=========
            negativebar: {
                color:['#83b394','#6f8dd5'],
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    }
                },
                legend: {
                    data: ['A', 'B', 'C']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: [{
                    type: 'value'
                }],
                yAxis: [{
                    type: 'category',
                    axisTick: {
                        show: false
                    },
                    data: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
                }],
                series: [{
                    name: 'A',
                    type: 'bar',
                    label: {
                        normal: {
                            show: true,
                            position: 'inside'
                        }
                    },
                    data: [200, 170, 240, 244, 200, 220, 210]
                }, {
                    name: 'C',
                    type: 'bar',
                    stack: 'Total',
                    label: {
                        normal: {
                            show: true
                        }
                    },
                    data: [320, 302, 341, 374, 390, 450, 420]
                }, {
                    name: 'B',
                    type: 'bar',
                    stack: 'Total',
                    label: {
                        normal: {
                            show: true,
                            position: 'left'
                        }
                    },
                    data: [-120, -132, -101, -134, -190, -230, -210]
                }]
            },
            //===========Negative chart data end=========
            //===========Stacked bar chart start===============
            stacked: {
                title: {

                    subtext: ''
                },
                tooltip: {
                    trigger: 'axis',
                    axisPointer: { //  Axis indicator, coordinate trigger effective
                        type: 'shadow' // The default is a straight line：'line' | 'shadow'
                    }
                },
                legend: {
                    data: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I']
                },

                calculable: true,
                xAxis: [{
                    type: 'category',
                    data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                    name: 'A',
                    type: 'bar',
                    data: [320, 332, 301, 334, 390, 330, 320]
                }, {
                    name: 'B',
                    type: 'bar',
                    stack: 'advertising',
                    data: [120, 132, 101, 134, 90, 230, 210]
                }, {
                    name: 'C',
                    type: 'bar',
                    stack: '',
                    data: [220, 182, 191, 234, 290, 330, 310]
                }, {
                    name: 'D',
                    type: 'bar',
                    stack: 'advertising',
                    data: [150, 232, 201, 154, 190, 330, 410]
                }, {
                    name: 'E',
                    type: 'bar',
                    data: [862, 1018, 964, 1026, 1679, 1600, 1570],
                    markLine: {
                        itemStyle: {
                            normal: {
                                lineStyle: {
                                    type: 'dashed'
                                }
                            }
                        },
                        data: [
                            [{
                                type: 'min'
                            }, {
                                type: 'max'
                            }]
                        ]
                    }
                }, {
                    name: 'F',
                    type: 'bar',
                    barWidth: 5,
                    stack: 'search engine',
                    data: [620, 732, 701, 734, 1090, 1130, 1120]
                }, {
                    name: 'G',
                    type: 'bar',
                    stack: 'search engine',
                    data: [120, 132, 101, 134, 290, 230, 220]
                }, {
                    name: 'H',
                    type: 'bar',
                    stack: 'search engine',
                    data: [60, 72, 71, 74, 190, 130, 110]
                }, {
                    name: 'I',
                    type: 'bar',
                    stack: 'search engine',
                    data: [62, 82, 91, 84, 109, 110, 120]
                }]
            },
            //===========Stacked bar chart end===============


            //========Colored bars chart Start===============

            colored: {
                title: {
                    x: 'center',
                },
                tooltip: {
                    trigger: 'item'
                },

                calculable: true,
                grid: {
                    borderWidth: 0,
                    y: 80,
                    y2: 60
                },
                xAxis: [{
                    type: 'category',
                    show: false,
                    data: ['Line', 'Bar', 'Scatter', 'K', 'Pie', 'Radar', 'Chord', 'Force', 'Map', 'Gauge', 'Funnel']
                }],
                yAxis: [{
                    type: 'value',
                    show: false
                }],
                series: [{
                    name: 'ECharts Number of examples',
                    type: 'bar',
                    itemStyle: {
                        normal: {
                            color: function(params) {
                                // build a color map as your need.
                                var colorList = [
                                    '#c16989', '#a3ab60', '#d2bf6f', '#e6995b', '#4ca1ab',
                                    '#FE8463', '#9BCA63', '#FAD860', '#F3A43B', '#60C0DD',
                                    '#D7504B', '#dcba42', '#F4E001', '#F0809A', '#26C0C0'
                                ];
                                return colorList[params.dataIndex]
                            },
                            label: {
                                show: true,
                                position: 'top',
                                formatter: '{b}\n{c}'
                            }
                        }
                    },
                    data: [12, 21, 10, 4, 12, 5, 6, 5, 25, 23, 7],
                    markPoint: {
                        tooltip: {
                            trigger: 'item',
                            backgroundColor: 'rgba(0,0,0,0)',
                            formatter: function(params) {
                                return {};
                            }
                        },
                        data: [{
                                xAxis: 0,
                                y: 350,
                                name: 'Line',
                                symbolSize: 0,

                            }, {
                                xAxis: 1,
                                y: 350,
                                name: 'Bar',
                                symbolSize: 0
                            }, {
                                xAxis: 2,
                                y: 350,
                                name: 'Scatter',
                                symbolSize: 0,

                            }, {
                                xAxis: 3,
                                y: 350,
                                name: 'K',
                                symbolSize: 0
                            }, {
                                xAxis: 4,
                                y: 350,
                                name: 'Pie',
                                symbolSize: 0
                            },

                        ]
                    }
                }]
            },
            // ===============colored chart end============
            // ================mixed chart start===========
            mixed: {
                color:['#cce5a1'],
                title: {
                    subtext: ''
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['A', 'B']
                },

                dataZoom: {
                    show: false,
                    start: 0,
                    end: 100
                },
                xAxis: [{
                    type: 'category',
                    boundaryGap: true,
                    data: (function() {
                        var now = new Date();
                        var res = [];
                        var len = 10;
                        while (len--) {
                            res.unshift(now.toLocaleTimeString().replace(/^\D*/, ''));
                            now = new Date(now - 2000);
                        }
                        return res;
                    })()
                }, {
                    type: 'category',
                    boundaryGap: true,
                    data: (function() {
                        var res = [];
                        var len = 10;
                        while (len--) {
                            res.push(len + 1);
                        }
                        return res;
                    })()
                }],
                yAxis: [{
                    type: 'value',
                    scale: true,
                    name: 'A',
                    boundaryGap: [0.2, 0.2]
                }, {
                    type: 'value',
                    scale: true,
                    name: 'B',
                    boundaryGap: [0.2, 0.2]
                }],
                series: [{
                    name: 'B',
                    type: 'bar',
                    xAxisIndex: 1,
                    yAxisIndex: 1,
                    data: (function() {
                        var res = [];
                        var len = 10;
                        while (len--) {
                            res.push(Math.round(Math.random() * 1000));
                        }
                        return res;
                    })()
                }, {
                    name: 'A',
                    type: 'line',
                    data: (function() {
                        var res = [];
                        var len = 10;
                        while (len--) {
                            res.push((Math.random() * 10 + 5).toFixed(1) - 0);
                        }
                        return res;
                    })()
                }]
            }
            // ================mixed chart end===========


        }
    },

    mounted: function() {
        unsub = this.$store.subscribe((mutation, state) => {
            if (mutation.type == "left_menu") {
                this.instances.forEach(function(item, index) {
                    setTimeout(function() {
                        item.resize();
                    });
                });
            }
        });
        axios.get("http://www.filltext.com/?rows=1&chartdata={numberArray|12,100}").then(response => {
                this.ajaxbar.series[0].data = response.data[0].chartdata;
                this.ajaxloading = false;
            })
            .catch(function(error) {

            });

    },
   beforeRouteLeave (to, from, next) {        unsub();        next();    },
    methods: {
        onReady(instance) {
            this.instances.push(instance)
        }
    }
}
</script>
