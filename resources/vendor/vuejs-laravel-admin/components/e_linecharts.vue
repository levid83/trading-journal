<template>
    <div>
        <div class="row">
            <div class="col-lg-6 mb-3">
                <b-card header="Basic Line chart" header-tag="h4" class="bg-primary-card">
                    <div style="height: 350px;">
                        <IEcharts :option="line" :loading="loading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-6 mb-3">
                <b-card header="AJAX Line chart" header-tag="h4" class="bg-success-card">
                    <div style="height: 350px;">
                        <IEcharts :option="serverline" :loading="ajaxloading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-12 mb-3">
                <b-card header="Stacked Area chart" header-tag="h4" class="bg-primary-card">
                    <div style="height: 350px;">
                        <IEcharts :option="stackedline" :loading="loading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-12 mb-3">
                <b-card header="Line chart with Pointers" header-tag="h4" class="bg-success-card">
                    <div style="height: 350px;">
                        <IEcharts :option="pointers" :loading="loading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-12 mb-3">
                <b-card header="Data Area Control Line Chart" header-tag="h4" class="bg-info-card">
                    <div style="height: 400px;">
                        <IEcharts :option=" dischart" :loading="loading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-12 mb-3">
                <b-card header=" Area  Chart" header-tag="h4" class="bg-info-card">
                    <div style="height: 400px;">
                        <IEcharts :option=" area_chart" :loading="loading" @ready="onReady"></IEcharts>
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
// import 'echarts/lib/chart/bar';

// import 'echarts/lib/chart/pie';
// import 'echarts/lib/chart/scatter';
// import 'echarts/lib/chart/radar';

import 'echarts/lib/chart/map';
import 'echarts/lib/chart/treemap';
import 'echarts/lib/chart/graph';
import 'echarts/lib/chart/gauge';
import 'echarts/lib/chart/funnel';
import 'echarts/lib/chart/parallel';
import 'echarts/lib/chart/sankey';
import 'echarts/lib/chart/boxplot';


// import 'echarts/lib/chart/candlestick';
// import 'echarts/lib/chart/effectScatter';
// import 'echarts/lib/chart/lines';
// import 'echarts/lib/chart/heatmap';


import 'echarts/lib/component/graphic';
import 'echarts/lib/component/grid';
import 'echarts/lib/component/legend';
import 'echarts/lib/component/tooltip';
// import 'echarts/lib/component/polar';
// import 'echarts/lib/component/geo';
// import 'echarts/lib/component/parallel';
// import 'echarts/lib/component/singleAxis';
// import 'echarts/lib/component/brush';

import 'echarts/lib/component/title';

import 'echarts/lib/component/dataZoom';
import 'echarts/lib/component/visualMap';



import 'echarts/lib/component/markPoint';
import 'echarts/lib/component/markLine';
import 'echarts/lib/component/markArea';


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
            //================line chart data start======
            line: {
                tooltip: {},
                grid: {
                    top: 10,
                    bottom: 35,
                    right: '7%',
                },
                xAxis: {
                    axisLine: {
                        lineStyle: {
                            color: '#4d8a77',
                        },
                    },
                    data: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
                },
                yAxis: {
                    axisLine: {
                        lineStyle: {
                            color: '#4d8a77',
                        }
                    },
                    axisTick: {
                        show: true,
                        alignWithLabel: false,
                        interval: 'auto',
                        inside: false,
                        length: 5,
                    }
                },
                series: [{
                    name: 'item 1',
                    type: 'line',
                    symbolSize: 5,
                    data: [8, 13, 10, 25, 20, 27, 38],
                    color: '#4d8a77',
                }, {
                    name: 'item 2',
                    type: 'line',
                    symbolSize: 5,
                    data: [11, 9, 6, 16, 19, 19, 33],
                    color: '#4d8a77',

                }]
            },
            //================line chart data end======
            //=========AJAX linechart start=======
            serverline: {
                tooltip: {},
                grid: {
                    top: 10,
                    bottom: 35,
                    right: '7%',
                },
                xAxis: {
                    axisLine: {
                        lineStyle: {
                            color: '#46a092',
                        },
                    },
                    data: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
                },
                yAxis: {
                    axisLine: {
                        lineStyle: {
                            color: '#46a092',
                        }
                    },
                    axisTick: {
                        show: true,
                        alignWithLabel: false,
                        interval: 'auto',
                        inside: false,
                        length: 5,
                    }
                },
                series: [{
                    name: 'item 1',
                    type: 'line',
                    symbolSize: 5,
                    data: [],
                    color: '#46a092',
                }, {
                    name: 'item 2',
                    type: 'line',
                    symbolSize: 5,
                    data: [],
                    color: '#46a092',
                }]
            },
            //=========AJAX linechart end=========
            //=======stacked line chart start==========
            stackedline: {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'cross',
                        label: {
                            backgroundColor: '#ccc'
                        }
                    }
                },
                legend: {
                    data: ['A', 'B', 'C', 'D', 'E']
                },
                toolbox: {
                    feature: {
                        saveAsImage: {
                            title: "Save"
                        }
                    }
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: [{
                    type: 'category',
                    boundaryGap: false,
                    data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                    name: 'A',
                    type: 'line',
                    stack: 'A',
                    areaStyle: {
                        normal: {}
                    },
                    data: [120, 132, 101, 134, 90, 230, 210]
                }, {
                    name: 'B',
                    type: 'line',
                    stack: 'B',
                    areaStyle: {
                        normal: {}
                    },
                    data: [220, 182, 191, 234, 290, 330, 310]
                }, {
                    name: 'C',
                    type: 'line',
                    stack: 'C',
                    areaStyle: {
                        normal: {}
                    },
                    data: [150, 232, 201, 154, 190, 330, 410]
                }, {
                    name: 'D',
                    type: 'line',
                    stack: 'D',
                    areaStyle: {
                        normal: {}
                    },
                    data: [320, 332, 301, 334, 390, 330, 320]
                }, {
                    name: 'E',
                    type: 'line',
                    stack: 'E',
                    label: {
                        normal: {
                            show: true,
                            position: 'top'
                        }
                    },
                    areaStyle: {
                        normal: {}
                    },
                    data: [820, 932, 901, 934, 1290, 1330, 1320]
                }]
            },
            //=======stacked line chart end==========
            //=======pointers line chart start============
            pointers: {
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['A', 'B']
                },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                },
                yAxis: {
                    type: 'value',
                    axisLabel: {
                        formatter: '{value} °C'
                    }
                },
                series: [{
                    name: 'A',
                    type: 'line',

                    data: [11, 11, 15, 13, 12, 13, 10],
                    markPoint: {
                        data: [{
                            type: 'max',
                            name: 'max'
                        }, {
                            type: 'min',
                            name: 'min'
                        }]
                    },
                    markLine: {
                        data: [{
                            type: 'average',
                            name: 'average'
                        }]
                    }
                }, {
                    name: 'B',
                    type: 'line',
                    data: [1, -2, 2, 5, 3, 2, 0],
                    markPoint: {
                        data: [{
                            name: 'week',
                            value: -2,
                            xAxis: 1,
                            yAxis: -1.5
                        }]
                    },
                    markLine: {
                        data: [{
                                type: 'average',
                                name: 'average'
                            },
                            [{
                                symbol: 'none',
                                x: '90%',
                                yAxis: 'max'
                            }, {
                                symbol: 'circle',
                                label: {
                                    normal: {
                                        position: 'start',
                                        formatter: 'max'
                                    }
                                },
                                type: 'max',
                                name: 'max'
                            }]
                        ]
                    }
                }]
            },
            //=======pointers line chart end============
            // ======area chart start================
            area_chart: {
                title: {
                    text: '',
                    subtext: ''
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['A', 'B', 'C']
                },

                calculable: true,
                xAxis: [{
                    type: 'category',
                    boundaryGap: false,
                    data: ['Mon', 'Tue', 'Wen', 'Thr', 'Fri', 'Sat', 'Sun']
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                    name: 'A',
                    type: 'line',
                    smooth: true,


                    itemStyle: {
                        normal: {
                            areaStyle: {
                                type: 'default',
                                color:'#e29e9f'
                            }
                        }
                    },
                    data: [10, 12, 21, 54, 260, 830, 710]
                }, {
                    name: 'B',
                    type: 'line',
                    smooth: true,
                    itemStyle: {
                        normal: {
                            areaStyle: {
                                type: 'default',
                                color: '#8db4b7'
                            }
                        }
                    },
                     data: [30, 182, 434, 791, 390, 30, 10]
                }, {
                    name: 'C',
                    type: 'line',
                    smooth: true,
                    itemStyle: {
                        normal: {
                            areaStyle: {
                                type: 'default',
                                color: '#82a779'
                            }
                        }
                    },
                    data: [1320, 1132, 601, 234, 120, 90, 20]
                }]
            },
            // =============area chart end==========
            // =================dischart Start==========
            dischart: {
                tooltip: {
                    trigger: 'axis'
                },

                dataZoom: {
                    show: true,
                    realtime: true,
                    y: 36,
                    height: 20,
                    start: 40,
                    end: 60
                },
                xAxis: [{
                    type: 'category',
                    boundaryGap: false,
                    data: function() {
                        var list = [];
                        var n = 0;
                        while (n++ < 150) {
                            list.push(n);
                        }
                        return list;
                    }()
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                    name: 'dz',
                    type: 'line',
                    data: function() {
                        var list = [];
                        for (var i = 1; i <= 150; i++) {
                            list.push(Math.round(Math.random() * 30));
                        }
                        return list;
                    }()
                }],
                calculable: false
            }
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
        axios.get("http://www.filltext.com/?rows=2&chartdata={numberArray|7,50}").then(response => {
                for (var i = 0; i < response.data.length; i++) {
                    this.serverline.series[i].data = response.data[i].chartdata;
                }
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
