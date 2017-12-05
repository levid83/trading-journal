<template>
    <div class="row">
    <div class="col-lg-12 m-bt-remv">
        <b-card header="Weather" header-tag="h4" class="bg-primary-card">
            <div class="mb-3 link_font">
               API Served from<a href="https://openweathermap.org/api?ref=jyostna"> openweathermap.org</a>
            </div>
        <weather id="5128638"></weather>
        </b-card>
    </div>
        <div class="col-lg-12">
            <b-card header="Basic Client Table" header-tag="h4" class="bg-primary-card">
                <div class="mb-3 link_font">
                    API Served from<a href="http://www.filltext.com/"> filltext.com</a>
                </div>
                <div class="table-responsive">
                    <datatable title="Registered Users" :rows="tableData" :columns="columndata"></datatable>
                </div>
            </b-card>
        </div>
        <div class="col-lg-12">
            <b-card header="AJAX Bar chart" header-tag="h4" class="bg-info-card">
                <div class="mb-3 link_font">
                    API Served from<a href="http://www.filltext.com/"> filltext.com</a>
                </div>
                <div style="height: 350px;">
                    <IEcharts :option="ajaxbar" :loading="ajaxloading" @ready="onReady"></IEcharts>
                </div>
            </b-card>
        </div>
         <div class="col-lg-6 col-xs-12">
             <b-card header="AJAX Line chart" header-tag="h4" class="bg-success-card">
                 <div class="mb-3 link_font">
                     API Served from<a href="http://www.filltext.com/"> filltext.com</a>
                 </div>
                 <div style="height: 350px;">
                     <IEcharts :option="serverline" :loading="ajaxloading" @ready="onReady"></IEcharts>
                 </div>
             </b-card>
         </div>
        <div class="col-lg-6 col-xs-12">
            <b-card header="AJAX Pie chart" header-tag="h4" class="bg-warning-card">
                <h3 class="card-title"></h3>
                <div class="mb-3 link_font">
                    API Served from<a href="http://www.filltext.com/"> filltext.com</a>
                </div>
                <div style="height: 350px;">
                    <IEcharts :option="ajaxpie" :loading="ajaxloading" @ready="onReady"></IEcharts>
                </div>
            </b-card>
        </div>
    </div>
</template>
<script>
    import Vue from "vue";
    import weather from "../components/widgets/weather/weather.vue";
    import IEcharts from 'vue-echarts-v3/src/full.js';
    import 'zrender/lib/vml/vml';
    import LinearGradient from 'zrender/lib/graphic/LinearGradient'
    //data tables
//    import Vue from 'vue';
    import datatable from "./plugins/DataTable/DataTable.vue";
    let unsub;
    export default {
        // ===Component name
        name: "API",
        // ===Props passed to component
        props: {},
        // ===Components used by this component
        components: {
            weather,IEcharts,datatable
        },
        data(){
            return{
                serverdata: [],
                instances: [],
                loading: false,
                ajaxloading:false,
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

                //===========user_list data table======
                tableData: [],
                columndata: [{
                    label: 'ID',
                    field: 'id',
                    numeric: true,
                    html: false,
                }, {
                    label: 'Name',
                    field: 'name',
                    numeric: false,
                    html: false,
                }, {
                    label: 'Email',
                    field: 'email',
                    numeric: false,
                    html: false,
                }, {
                    label: 'Age',
                    field: 'age',
                    numeric: true,
                    html: false,
                }, {
                    label: 'Status',
                    field: 'status',
                    numeric: false,
                    html: false,
                }, {
                    label: 'Actions',
                    field: 'action',
                    numeric: false,
                    html: true,
                }],
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
            }
        },
        // ===Code to be executed when Component is mounted
        mounted() {
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
            axios.get("http://www.filltext.com/?rows=20&id={index}&name={firstName}~{lastName}&email={email}&age={numberRange|20,60}&status=[%22Activated%22,%22Deactivated%22]").then(response => {
                this.tableData = response.data;
                this.tableData.forEach((item, index) => {
                    this.$set(item, "action", "<a class='btn btn-info text-white' href='#/edit_user?" + index + "'>Edit</a>");
                });
            })
                .catch(function(error) {});
            axios.get("http://www.filltext.com/?rows=1&chartdata={numberArray|12,100}").then(response => {
                this.ajaxbar.series[0].data = response.data[0].chartdata;
                this.ajaxloading = false;
            })
                .catch(function(error) {

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
        // ===Computed properties for the component
        computed: {},
        // ===Component methods
        methods: {
            onReady(instance) {
                this.instances.push(instance)
            }
        },
        beforeRouteLeave (to, from, next) {
            unsub();
            next();
        },
    }
</script>
<!-- styles -->
<!-- adding scoped attribute will apply the css to this component only -->
<style scoped>
    .link_font{
        font-size: 14px;
    }
</style>
