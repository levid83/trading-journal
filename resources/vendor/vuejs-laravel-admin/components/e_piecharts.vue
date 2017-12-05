<template>
    <div>
        <div class="row">
            <div class="col-lg-6 mb-3">
                <b-card header="Basic Pie chart" header-tag="h4" class="bg-primary-card">
                    <div style="height: 350px;">
                        <IEcharts :option="pie" :loading="loading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-6 mb-3">
                <b-card header="AJAX Pie chart" header-tag="h4" class="bg-warning-card">
                    <h3 class="card-title"></h3>
                    <div style="height: 350px;">
                        <IEcharts :option="ajaxpie" :loading="ajaxloading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-6 mb-3">
                <b-card header="Doughnut chart" header-tag="h4" class="bg-success-card">
                    <div style="height: 350px;">
                        <IEcharts :option="doughnut" :loading="loading" @ready="onReady"></IEcharts>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-6 mb-3">
                <b-card header="Nested Pie chart" header-tag="h4" class="bg-info-card">
                    <div style="height: 350px;">
                        <IEcharts :option="nested" :loading="loading" @ready="onReady"></IEcharts>
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
// use only necessary charts to reduce size of package
import IEcharts from 'vue-echarts-v3/src/full.js';

import 'echarts/lib/chart/pie';

import 'echarts/lib/component/legend';
import 'echarts/lib/component/tooltip';

import 'echarts/lib/component/title';

import 'echarts/lib/component/markPoint';
import 'echarts/lib/component/markLine';

import 'echarts/lib/component/timeline';
import 'echarts/lib/component/toolbox';

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
            //==========basic pie chart data start=====
            pie: {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                    data: ['A', 'B', 'C', 'D', 'E']
                },
                series: [{
                    name: 'Source',
                    type: 'pie',
                    radius: '80%',
                    center: ['50%', '50%'],
                    data: [{
                        value: 335,
                        name: 'A',

                        itemStyle : {
                        normal : {
                            color :'#9bbdb3'
                        }
                    }
                    },
                    {
                        value: 310,
                        name: 'B',

                        itemStyle : {
                        normal : {
                            color :'#6eb09c'
                        }
                    }
                    }, {
                        value: 234,
                        name: 'C',

                        itemStyle : {
                        normal : {
                            color :'#6ebabe'
                        }
                    }
                    }, {
                        value: 135,
                        name: 'D',

                        itemStyle : {
                        normal : {
                            color :'#78bbbf'
                        }
                    }
                    }, {
                        value: 1548,
                        name: 'E',

                        itemStyle : {
                        normal : {
                            color :'#83b3a4'
                        }
                    }
                    }],

                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }]
            },
            //==========basic pie chart data end=====
            //==========AJAX pie chart data start=====
            ajaxpie: {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                    data: []
                },
                series: [{
                    name: 'Source',
                    type: 'pie',
                    radius: '80%',
                    center: ['50%', '50%'],
                    data: [],
                           color:[
    
          '#d69292','#8599c1','#4f699c','#8fa9dc','#d4ab6e'
]

                }]
            },
            //==========AJAX pie chart data end=====
            //==========Doughnut chart data start=====
            doughnut: {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['A', 'B', 'C', 'D', 'E']
                },
                series: [{
                    name: 'Sales',
                    type: 'pie',
                    radius: ['50%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                        normal: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            show: true,
                            textStyle: {
                                fontSize: '30',
                                fontWeight: 'bold'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    data: [{
                        value: 335,
                        name: 'A',

                        itemStyle : {
                        normal : {
                            color :'#f5918d'
                        }
                    }
                    }, {
                        value: 310,
                        name: 'B',

                        itemStyle : {
                        normal : {
                            color :'#6eb09c'
                        }
                    }

                    }, {
                        value: 234,
                        name: 'C',
                        itemStyle : {
                        normal : {
                            color :'#1badb5'
                        }
                    }

                    }, {
                        value: 135,
                        name: 'D',
                         itemStyle : {
                        normal : {
                            color :'#f5918d'
                        }
                    }

                    }, {
                        value: 1548,
                        name: 'E',

                        itemStyle : {
                        normal : {
                            color :'#6ebabe'
                        }
                    }
                    }]
                }]
            },
            //==========Doughnut chart data end=====
            //==========nested pie data start=====
            nested: {
                color:[
    
    '#f5918d', '#6ebabe','#6ebabe', '#6eb09c','#1badb5'
]
,                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J']
                },
                series: [{
                    name: 'ITEM2',
                    type: 'pie',
                    selectedMode: 'single',
                    radius: [0, '30%'],

                    label: {
                        normal: {
                            position: 'inner'
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    data: [{
                        value: 335,
                        name: 'A',
                        selected: true
                    }, {
                        value: 679,
                        name: 'B'
                    }, {
                        value: 1548,
                        name: 'C'
                    }]
                }, {
                    name: 'ITEM1',
                    type: 'pie',
                    radius: ['40%', '55%'],

                    data: [{
                        value: 310,
                        name: 'D'
                    }, {
                        value: 234,
                        name: 'E'
                    }, {
                        value: 135,
                        name: 'F'
                    }, {
                        value: 1048,
                        name: 'G'
                    }, {
                        value: 251,
                        name: 'H'
                    }, {
                        value: 147,
                        name: 'I'
                    }, {
                        value: 102,
                        name: 'J'
                    }]
                }]
            }
            //==========nested pie data end=====
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
        axios.get("http://www.filltext.com/?rows=5&value={number|50}&name={usState|abbr}").then(response => {
                this.ajaxpie.series[0].data = response.data;
                response.data.forEach((item, index) => {
                    this.ajaxpie.legend.data.push(item.name);
                });
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
