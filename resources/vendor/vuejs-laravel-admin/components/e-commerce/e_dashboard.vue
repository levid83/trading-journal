<template>
<div>
    <div class="row">
        <div class="col-md-3 text-center">
            <b-card>
                <div class="icon"><img src="../../assets/img/pages/icon-03.png" alt="sales icon"></div>
                <div class="number_font1">Sales</div>
                <span class="arrow_up"><img src="../../assets/img/pages/Icons-10(1).png" alt="dollar image"></span>
                <span class="number_font">58.78%</span>
            </b-card>
        </div>
        <div class="col-md-3 text-center">
            <b-card>
                <div class="icon"><img src="../../assets/img/pages/icon-02.png" alt="user image"></div>
                <div class="number_font1">Income</div>
                <span class="arrow_up"><img src="../../assets/img/pages/Icons-10(1).png" alt="image up"></span>
                <span class="number_font">64.12%</span>
            </b-card>
        </div>
        <div class="col-md-3 text-center">
            <b-card>
                <div class="icon"><img src="../../assets/img/pages/users.png" alt="user image"></div>
                <div class="number_font1">Customers</div>
                <span class="arrow_down text-danger"><img src="../../assets/img/pages/Icons_1-10.png" alt="image down"></span>
                <span class="number_font2">45.65%</span>
            </b-card>
        </div>
        <div class="col-md-3 text-center">
            <b-card>
                <div class="icon"><img src="../../assets/img/pages/icon-04.png" alt="product image"></div>
                <div class="number_font1">Products</div>
                <span class="arrow_up"><img src="../../assets/img/pages/Icons-10(1).png" alt="image up"></span>
                <span class="number_font">84.23%</span>
            </b-card>
        </div>
    </div>
    <!--=====================Sales and revenue Bar Chart===========================-->
    <div class="row">
        <div class="col-lg-8 col-sm-7">
            <b-card>
                <div class="col-12">
                    <h4 class="Sales_text">Weekly sales report</h4>
                </div>
                <div v-model="tabindex">
                    <div class="sales_text">
                        <div style="height: 250px;">
                            <IEcharts :option="area_chart" :loading="loading" @ready="onReady" ref="areachart"></IEcharts>
                        </div>
                    </div>
                </div>
            </b-card>
        </div>
        <div class="col-lg-4 col-sm-5 padding_swiper">
            <b-card>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="text-center">
                            <div class="pie_rate">
                                <span class="percent_rate">87%</span>
                                <div class="text-gray">Bounce rate</div>
                            </div>
                            <img src="../../assets/img/pages/Icons-06 (3).png" class="img_move" alt="rounded circle">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-5 mb-4 text-center">
                        <div class="percent_rate">22%</div>
                        <div>Shipping completed</div>
                        <div class="progress progree_height mt-3">
                            <div class="progress-bar w-100 progressbar_height bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-5 mb-4 text-center">
                        <div class="percent_rate"> 18%</div>
                        <div>Shipping in progress</div>
                        <div class="progress progree_height mt-3">
                            <div class="progress-bar w-25 progressbar_height bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </b-card>
        </div>
    </div>
    <!--=====================Sales and revenue Bar Chart end===========================-->
    <div class="col-md-12 tot_boxline3">
        <h4 class="name_visitors">Last Orders</h4></div>
    <b-card class="line_remove">
        <div class="table-responsive">
            <table class="table table-hover hover_table">
                <thead>
                    <tr>
                        <th class="text-gray">ORDER ID</th>
                        <th class="text-gray">DATE</th>
                        <th class="text-gray"> CUSTOMER</th>
                        <th class="text-gray">STATUS</th>
                        <th class="text-gray">PRICE</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="blue_text">#1256SA</td>
                        <td>2016/06/12</td>
                        <td class="blue_text ">
                            Harry john
                        </td>
                        <td>
                            <span class="success_background">Completed</span>
                        </td>
                        <td>$ 3,697</td>
                        <td>
                            <span class="search_icon"><i class="fa fa-search-plus"></i></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="blue_text ">#1456G</td>
                        <td>2016/07/12</td>
                        <td class="blue_text ">
                            Devid pork
                        </td>
                        <td>
                            <span class="pending_background">Pending</span>
                        </td>
                        <td>$ 5,897</td>
                        <td>
                            <span class="search_icon"><i class="fa fa-search-plus"></i></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="blue_text ">#8754HF</td>
                        <td>2016/08/12</td>
                        <td class="blue_text ">
                            Mendes vally
                        </td>
                        <td>
                            <span class="cancelled_background">Cancelled</span>
                        </td>
                        <td>$ 1,205</td>
                        <td>
                            <span class="search_icon"><i class="fa fa-search-plus"></i></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="blue_text ">#687TYA</td>
                        <td>2016/10/12</td>
                        <td class="blue_text ">
                            Freng Georgy
                        </td>
                        <td>
                            <span class="success_background">completed</span>
                        </td>
                        <td>$ 1,023</td>
                        <td>
                            <span class="search_icon"><i class="fa fa-search-plus"></i></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="blue_text ">#4894ABL</td>
                        <td>2016/11/12</td>
                        <td class="blue_text ">
                            Peter parker
                        </td>
                        <td>
                            <span class="onhold_background">on hold</span>
                        </td>
                        <td>$ 1,320</td>
                        <td>
                            <span class="search_icon"><i class="fa fa-search-plus"></i></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </b-card>
    <!--=======================Reports from visitors==================-->
    <div class="row">
        <div class="col-md-12">
            <div class="report_tot_boxline">
                <h4 class="name_visitors"> Reports from visitors</h4>
                <b-tabs ref="tabs" card class="tab_color">
                    <!--=======================Popular categories==========================-->
                    <b-tab title="Popular categories">
                        <div class="row">
                            <popular-item v-for="item in popular_items" :key="item.id" :item="item"></popular-item>
                        </div>
                    </b-tab>
                    <!--=========================Recently viewed items-=================-->
                    <b-tab title="Recently viewed items">
                        <div class="row recent_mt-10">
                            <recently-viewed v-for="recent in recently_viewed" :key="recent.id" :viewed="recent"></recently-viewed>
                        </div>
                    </b-tab>
                    <!--===============================Today Deals==============================-->
                    <b-tab title="Today Deals">
                        <div class="row">
                            <today-deal v-for="deal in today_deals" :key="deal.id" :deal="deal"></today-deal>
                        </div>
                    </b-tab>
                </b-tabs>
            </div>
        </div>
    </div>
    <!--============================ Daily stats========================-->
    <div class="col-md-12 product_stats">
        <div class="row">
            <div class="col-md-5">
                <h4 class="name_visitors">Product Stats</h4>
                <div style="height: 250px;">
                    <IEcharts :option="line" :loading="loading" @ready="onReady"></IEcharts>
                </div>
            </div>
            <div class="col-md-7 mt-5">
                <div class="table-responsive">
                    <table class="table table-hover tot_boxline">
                        <thead>
                            <tr>
                                <th class="text-gray">Product </th>
                                <th class="text-gray">Previous Price</th>
                                <th class="text-gray">Current Price</th>
                                <th class="text-gray">Changes</th>
                                <th class="text-gray">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="tb_img">
                                        <img src="../../assets/img/pages/e2.jpg" class="tb_img rounded-circle" alt="microwave image">
                                    </div>
                                </td>
                                <td>$3.20</td>
                                <td>$ 10.23</td>
                                <td>
                                    <span class="change_text">- $ 4.561</span>
                                </td>
                                <td> <span class="fa fa-arrow-down down_red"></span></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="tb_img">
                                        <img src="../../assets/img/pages/e3.png" class="tb_img rounded-circle" alt="Mobile image">
                                    </div>
                                </td>
                                <td>$ 5.658</td>
                                <td>$ 4.56</td>
                                <td>
                                    <span class="change_text">- $ 1.897</span>

                                </td>
                                <td> <span class="fa fa-arrow-down down_red"></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="tb_img">
                                        <img src="../../assets/img/pages/e5.png" class="tb_img rounded-circle" alt="image missing">
                                    </div>
                                </td>
                                <td>$ 7.89</td>
                                <td>$ 8.982</td>
                                <td>
                                    <span class="change_text">+ $ 1.205</span>

                                </td>
                                <td> <span class=" fa fa-arrow-up up_green"></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="tb_img">
                                        <img src="../../assets/img/pages/900x600_2.png" class="tb_img rounded-circle" alt="image missing">
                                    </div>
                                </td>
                                <td>$ 7.89</td>
                                <td>$ 9.58</td>
                                <td>
                                    <span class="change_text"> + $ 2.205</span>
                                </td>
                                <td><span class="fa fa-arrow-up up_green"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--========recent activity====================-->

    <div class="col-md-12  recent_mt-10">
        <div class="row">
            <div class="col-md-12">
                <h4 class="name_visitors">Recent Activity</h4>
            </div>
            <recent-activity v-for="activity in recent_activity" :key="activity.id" :activity="activity"></recent-activity>
            <div class="col-sm-6 col-lg-4">
                <b-card class="bg_card">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="view text-cente"><i class="fa fa-refresh" title="Reload"></i></div>
                        </div>
                    </div>
                </b-card>
            </div>
        </div>
    </div>
    <!--===================recent activity end================================-->
</div>
</template>
<script>
var unsub;
import Vue from "vue";

import IEcharts from 'vue-echarts-v3/src/full.js';
import 'echarts/lib/chart/line';

import 'echarts/lib/component/legend';
import 'echarts/lib/component/tooltip';
import 'echarts/lib/component/title';

// e-commerce components
import popularItem from "./components/popular_item";
import recentActivity from "./components/recent_activity"
import recentlyViewed from "./components/recently_viewed"
import todayDeal from "./components/today_deal"

var unsub;
export default {
    // ===Component name
    name: "E-commerce",

    // ===Props passed to component
    props: {},
    // ===Components used by this component
    components: {
        IEcharts,
        popularItem,
        recentActivity,
        recentlyViewed,
        todayDeal,
    },
    // ====component Data properties
    data() {
        return {
            popular_items: [],
            recently_viewed: [],
            today_deals: [],
            recent_activity: [],
            tabindex: 0,
            instances: [],
            loading: false,
            line: {
                grid: {
                    top: 5,
                    bottom: 55,
                    right: '2%',
                },
                xAxis: [{
                        color: ['red'],
                        type: 'category',
                        axisTick: {
                            alignWithLabel: true
                        },
                        axisLine: {
                            onZero: false,
                        },
                        axisPointer: {
                            label: {
                                formatter: function(params) {
                                    return '2015  ' + params.value +
                                        (params.seriesData.length ? '：' + params.seriesData[0].data : '');
                                }
                            }
                        },
                        data: ["2016-1", "2016-1", "2016-3", "2016-4", "2016-5", "2016-6", "2016-2", "2016-4", "2016-4", "2016-10", "2016-4", "2016-2"]
                    },
                    {
                        type: 'category',
                        axisTick: {
                            alignWithLabel: true
                        },
                        axisPointer: {
                            label: {
                                formatter: function(params) {
                                    return '2015  ' + params.value +
                                        (params.seriesData.length ? '：' + params.seriesData[0].data : '');
                                }
                            }
                        },
                        data: ["2015-1", "2015-2", "2015-3", "2015-1", "2015-5", "2015-6", "2015-5", "2015-8", "2015-9", "2015-10", "2015-11", "2015-12"]
                    }
                ],
                yAxis: {
                    axisLine: {
                        lineStyle: {
                            color: '#4d8a77',
                        }
                    },
                    axisTick: {
                        color: ['#4fc1e9'],
                        show: true,
                        alignWithLabel: false,
                        interval: 'auto',
                        inside: false,
                        length: 5,

                    }
                },
                series: [{
                        name: '2015 ',
                        type: 'line',
                        xAxisIndex: 1,
                        smooth: true,
                        color: ['#4fc1e9'],
                        data: [0.6, 1.9, 2.0, 3.1, 4.8, 4.1, 6.4, 6.2, 3.1, 4.1, 5.1, 3.5]
                    },
                    {
                        name: '2016 ',
                        type: 'line',
                        smooth: true,
                        color: ['#6494fa'],

                        data: [0.9, 1.8, 2.8, 3.2, 2.4, 5.3, 6.2, 5.8, 4.5, 4.6, 5.4, 4.6]
                    }
                ]
            },
            // ==========area chart=========
            area_chart: {
                title: {
                    text: '',
                    subtext: ''
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    show: false,
                    data: ['sales', 'revenue', ]
                },
                color: {
                    pattern: ['red', 'red']
                },
                calculable: true,
                xAxis: [{
                    type: 'category',
                    boundaryGap: false,
                    data: ["2000-06-05", "2000-06-06", "2000-06-07", "2000-06-08", "2000-06-09", "2000-06-10", "2000-06-11", "2000-06-12", "2000-06-13", "2000-06-14", "2000-06-15", "2000-06-16", "2000-06-17", "2000-06-18", "2000-06-19",
                        "2000-06-20", "2000-06-21", "2000-06-22", "2000-06-23", "2000-06-24", "2000-06-25", "2000-06-26", "2000-06-27", "2000-06-28", "2000-06-29", "2000-06-30", "2000-07-01", "2000-07-02", "2000-07-03", "2000-07-04",
                        "2000-07-05", "2000-07-06", "2000-07-07", "2000-07-08", "2000-07-09", "2000-07-09", "2000-07-10", "2000-07-11", "2000-07-12", "2000-07-13", "2000-07-14", "2000-07-15", "2000-07-16", "2000-07-17", "2000-07-18",
                        "2000-07-19", "2000-07-20", "2000-07-21", "2000-07-22", "2000-07-23", "2000-07-24"
                    ],
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                    name: 'sales',
                    type: 'line',
                    smooth: true,
                    itemStyle: {
                        normal: {
                            areaStyle: {
                                type: 'default',
                                color: '#D3F6F6'
                            },
                            lineStyle: {
                                color: "#95EAEA",
                            },
                        }
                    },
                    data: [16, 129, 135, 86, 73, 85, 73, 68, 92, 130, 145, 139, 115, 111, 239, 206, 337, 128, 155, 94, 401, 206, 254, 403, 255, 73, 83, 125, 207, 82, 44, 72, 106, 107, 66, 91, 92, 113, 107, 131, 111, 244, 369, 388, 377, 483,
                        311, 357, 385, 408
                    ]
                }]
            },
            // =============area chart end==========

        }
    },
    watch: {
        tabindex() {
            setTimeout(() => {
                this.instances.forEach(function(item, index) {
                    setTimeout(function() {
                        item.resize();
                    });
                });
            })
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
        // this.update_chart();
        // get popular item
        axios.get("http://www.filltext.com/?rows=3&id={index}&name={lorem|2}&stars={numberRange|1,5}&description={lorem|20}&price={numberRange|20,500}").then(response => {
                this.popular_items = response.data;
                this.popular_items.forEach((item) => {
                    item.image = "images/20.jpg";
                });
            })
            .catch(function(error) {

            });
        // get recently viewed item
        axios.get("http://www.filltext.com/?rows=4&id={index}&stars={numberRange|1,5}&price={numberRange|20,500}").then(response => {
                this.recently_viewed = response.data;
                this.recently_viewed.forEach((item) => {
                    item.image = "images/20.jpg";
                });
            })
            .catch(function(error) {

            });
        // get Today deals
        axios.get("http://www.filltext.com/?rows=3&id={index}&stars={numberRange|1,5}&price={numberRange|20,500}").then(response => {
                this.today_deals = response.data;
            })
            .catch(function(error) {

            });

        // get recent activity
        axios.get("http://www.filltext.com/?rows=8&id={index}&stars={numberRange|1,5}&price={numberRange|20,500}").then(response => {
                this.recent_activity = response.data;
            })
            .catch(function(error) {

            });
    },
    destroyed() {
        // clearInterval(this.timer);
    },
    // ===Computed properties for the component
    computed: {},
    // ===Component methods
    methods: {
        onReady(instance) {
            this.instances.push(instance)
        },
    },
    beforeRouteLeave (to, from, next) {
        unsub();
        next();
    },
}
</script>
<!-- styles -->
<!-- adding scoped attribute will apply the css to this component only -->
<style scoped src="../../assets/css/e_dashboard.css"></style>
