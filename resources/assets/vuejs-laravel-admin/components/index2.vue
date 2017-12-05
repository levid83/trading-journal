<template>
    <div>
        <div class="row">
        <div class="col-xl-3 col-lg-6 col-sm-6 text-center">
              <b-card claass="bg-default-card easy_pie_chart1">
                  <div class="row">
                      <div class="col-12 mb-3 mt-3">
                           <div class="row">
                               <div class="col-4 p-t-10 push-1">
                                   <div class="top_border1 bg_color1">
                                   <i class="fa fa-user-o circle_round"></i>
                                   </div>
                               </div>
                               <div class="col-8 m-t-10">
                                   <p class="user_font">Users</p>
                                   <p class="number_size">5,445+</p>
                               </div>
                           </div>
                      </div>
                  </div>
              </b-card>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 text-center">
                <b-card claass="bg-default-card easy_pie_chart1">
                    <div class="row">
                        <div class="col-12 mb-3 mt-3">
                            <div class="row">
                                <div class="col-4 p-t-10 push-1">
                                    <div class="top_border2 bg_color2">
                                        <i class="fa fa-eye circle_round1"></i>
                                    </div>
                                </div>
                                <div class="col-8 m-t-10">
                                    <p class="user_font">Views</p>
                                    <p class="number_size">2,402+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </b-card>
            </div>
            <div class="col-xl-3 col-lg-6  col-sm-6 text-center">
                <b-card claass="bg-default-card easy_pie_chart1">
                    <div class="row">
                        <div class="col-12 mb-3 mt-3">
                            <div class="row">
                                <div class="col-4 p-t-10 push-1">
                                    <div class="top_border3 bg_color3">
                                        <i class="fa fa-thumbs-o-up circle_round1"></i>
                                    </div>
                                </div>
                                <div class="col-8 m-t-10">
                                    <p class="user_font">Likes</p>
                                    <p class="number_size">1,897+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </b-card>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 text-center">
                <b-card claass="bg-default-card easy_pie_chart1">
                    <div class="row">
                        <div class="col-12 mb-3 mt-3">
                            <div class="row">
                                <div class="col-4 p-t-10 push-1">
                                    <div class="top_border4 bg_color4">
                                        <i class="fa fa-line-chart circle_round"></i>
                                    </div>
                                </div>
                                <div class="col-8 m-t-10">
                                    <p class="user_font">Sales</p>
                                    <p class="number_size">575+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </b-card>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-12">
                <b-card header='Annual Stats' header-tag="h4" class="bg-default-card">
                    <b-tabs v-model="tabindex">
                        <b-tab title="Sales" class="sales_text">
                            <div style="height: 320px;">
                                <IEcharts :option="area_chart" :loading="loading" @ready="onReady" ref="areachart"></IEcharts>
                            </div>
                        </b-tab>
                        <b-tab title="Products" class="sales_text">
                            <vue-chartist :data="chartist1.data" :options="chartist1.options" type="Line" id="annual-sales" ref="chartist"></vue-chartist>
                        </b-tab>
                    </b-tabs>
                    <div class="row text-center mt-2">
                        <div class="col-sm-3 col-6">
                            <p>CPU load
                                <br> <b>5.4</b></p>
                        </div>
                        <div class="col-sm-3 col-6">
                            <p>Memory used
                                <br> <b>3.5 GB</b></p>
                        </div>
                        <div class="col-sm-3 col-6">
                            <p>Disk usage
                                <br> <b>84 GB</b></p>
                        </div>
                        <div class="col-sm-3 col-6">
                            <p>Bandwidth used
                                <br> <b>37 GB</b></p>
                        </div>
                    </div>
                </b-card>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-12">
                        <b-card header="Site Visits" header-tag="h4" class="bg-default-card">
                            <div class="row text-center">
                                <div class="col-6 visitors-details">
                                    <p>Server Loading</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 trend-chart">
                                    <trend :data="trend" :stroke-width="3" :gradient="['#1ba3d6', '#1ba3d6', '#cfeef9']" auto-draw smooth>
                                    </trend>
                                </div>
                            </div>
                        </b-card>
                    </div>
                    <div class="col-xl-12  col-lg-6 index1_swiper">
                        <b-card header="Quotations" header-tag="h4">
                            <div class="swiper-widget text-center">
                            <swiper :options="swiperOption" ref="swiper">
                                <swiper-slide>
                                    <p class="text-blue"><i>Lorem Ipsum is simply dummy text of the printing typesetting.</i></p>
                                </swiper-slide>
                                <swiper-slide>
                                    <p class="text-blue"><i>It is a long established fact that a reader will bing at its .</i>
                                    </p>
                                </swiper-slide>
                                <swiper-slide>
                                    <p class="text-blue"><i>There are many variations of passages of Loremd alteration.</i>
                                    </p>
                                </swiper-slide>
                                <swiper-slide>
                                    <p class="text-blue"><i>Contrary to popular belief, Lorem literature from 45 BC,  2000 years.</i></p>
                                </swiper-slide>
                                <swiper-slide>
                                    <p class="text-blue"><i>I must explain to you how iorn and I will give you a complete accoun.</i></p>
                                </swiper-slide>
                                <div class="swiper-pagination" slot="pagination"></div>
                            </swiper>
                            </div>
                        </b-card>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <b-card header="Weekly Sales" header-tag="h4" class="bg-default-card">
                    <div class="row">
                        <div class="col-12">
                            <p class="sales-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias assumenda corporis cumque eos minima. Alias assumenda corporis cumque eos minima. Alias assumenda corporis cumque eos minima.</p>
                        </div>
                        <div class="col-12">
                            <div class="echarts">
                                <IEcharts :option="line" :loading="loading" @ready="onReady"></IEcharts>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 text-center weekly-data">
                                    <p>Target
                                        <br> <b>904</b></p>
                                </div>
                                <div class="col-6 text-center weekly-data">
                                    <p>Reached
                                        <br> <b>654</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </b-card>
            </div>
            <div class="col-xl-4 col-sm-6">
                <b-card header="Task" header-tag="h4" class="bg-default-card task1" no-block>
                    <task v-model="list"></task>
                </b-card>
            </div>
            <div class="col-xl-4 col-sm-6">
                <b-card no-block>
                    <b-tabs bottom class="socio-tabs">
                        <b-tab title="Twitter" class="twitter" active>
                            <b-card>
                                <div class="tweet-img float-left">
                                    <img src="../assets/img/authors/avatar2.jpg" alt="profile image" class="img-fluid rounded-circle">
                                </div>
                                <div class="tweet float-left">
                                    <p>
                                        <strong>Vincent Porter</strong>
                                        <br> <a href="javascript:void(0)"> @Importer</a>
                                        <a class="btn btn-info btn-sm float-right text-white">Follow</a>
                                    </p>
                                    <p>Lorem ipsum dolor sit amet, consec adipisicing elit.
                                        <a href="javascript:void(0)" class="prfl-link">https://www.google.co.in/df565gf</a>
                                    </p>
                                    <p class="options">
                                        <span class="text-muted">2h</span>
                                        <span class="float-right">
                                            <i class="fa fa-share-square-o text-info" aria-hidden="true"></i>
                                            <i class="fa fa-heart text-info" aria-hidden="true"></i>
                                            <i class="fa fa-chain-broken text-info" aria-hidden="true"></i>
                                            <i class="fa fa-comment-o text-info" aria-hidden="true"></i>
                                        </span>
                                    </p>
                                </div>
                            </b-card>
                            <b-card>
                                <div class="tweet-img float-left">
                                    <img src="../assets/img/authors/avatar3.jpg" alt="profile image" class="img-fluid rounded-circle">
                                </div>
                                <div class="tweet float-left">
                                    <p>
                                        <strong> Wark Peter </strong>
                                        <br> <a href="javascript:void(0)"> @Importer</a>
                                        <a class="btn btn-info btn-sm float-right text-white">Follow</a>
                                    </p>
                                    <p>Lorem ipsum dolor sit amet, consec adipisicing elit.
                                        <a href="javascript:void(0)" class="prfl-link">https://www.google.co.in/etre5gf</a>
                                    </p>
                                    <p class="options">
                                        <span class="text-muted">2h</span>
                                        <span class="float-right">
                                            <i class="fa fa-share-square-o text-info" aria-hidden="true"></i>
                                            <i class="fa fa-heart text-info" aria-hidden="true"></i>
                                            <i class="fa fa-chain-broken text-info" aria-hidden="true"></i>
                                            <i class="fa fa-comment-o text-info" aria-hidden="true"></i>
                                        </span>
                                    </p>
                                </div>
                            </b-card>
                        </b-tab>
                        <b-tab title="Facebook" class="facebook">
                            <b-card>
                                <div class="page-img float-left">
                                    <img src="../assets/img/authors/avatar4.jpg" alt="profile image" class="img-fluid rounded-circle">
                                </div>
                                <div class="page-name float-left">
                                    <p>
                                        <strong>Vincent Porter</strong>
                                        <br> <a href="javascript:void(0)"> @Importer</a>
                                        <a class="btn btn-primary btn-sm float-right text-white">Follow</a>
                                    </p>
                                </div>
                            </b-card>
                            <b-card>
                                <p><a href="javascript:void(0)">Carter Kenn</a> and 142 people like this.</p>
                                <div class="fb-friends">
                                    <img src="../assets/img/authors/avatar1.jpg" title="Carter" alt="images" class="img-fluid">
                                    <img src="../assets/img/authors/avatar2.jpg" title="Mike" alt="images" class="img-fluid">
                                    <img src="../assets/img/authors/avatar3.jpg" title="Tyler" alt="images" class="img-fluid">
                                    <img src="../assets/img/authors/avatar4.jpg" title="harper" alt="images" class="img-fluid">
                                    <img src="../assets/img/authors/avatar5.jpg" title="Colleen" alt="images" class="img-fluid">
                                    <img src="../assets/img/authors/avatar6.jpg" title="Logan" alt="images" class="img-fluid">
                                    <img src="../assets/img/authors/avatar7.jpg" title="kaylee" alt="images" class="img-fluid">
                                    <img src="../assets/img/authors/avatar.jpg" title="Dixon" alt="images" class="img-fluid">
                                    <img src="../assets/img/authors/user.jpg" title="Wallace" alt="images" class="img-fluid">
                                    <img src="../assets/img/authors/avatar4.jpg" title="rogers" alt="images" class="img-fluid">
                                    <img src="../assets/img/authors/avatar2.jpg" title="Bowman" alt="images" class="img-fluid">
                                    <img src="../assets/img/authors/avatar3.jpg" title="Donald" alt="images" class="img-fluid">
                                </div>
                            </b-card>
                        </b-tab>
                        <b-tab title="Instagram" class="instagram">
                            <b-card>
                                <div class="page-img float-left">
                                    <img src="../assets/img/authors/avatar5.jpg" alt="profile image" class="img-fluid rounded-circle">
                                </div>
                                <div class="page-name float-left">
                                    <p>
                                        <strong>Vincent Porter</strong>
                                        <br> <a href="javascript:void(0)"> @Importer</a>
                                        <a class="btn btn-primary btn-sm float-right text-white">Follow</a>
                                    </p>
                                </div>
                            </b-card>
                            <b-card>
                                <div class="insta-pins">
                                    <v-scroll height="260px" color="#ccc" bar-width="3px">
                                        <div class="insta-img">
                                            <img src="../assets/img/authors/avatar1.jpg" title="Carter" alt="images" class="img-fluid">
                                            <div class="pic-credits">
                                                <span class="text-primary"><i class="fa fa-clock-o text-info" aria-hidden="true"></i> 4m</span>
                                                <span class="float-right text-primary"><i class="fa fa-heart-o text-danger" aria-hidden="true"></i> 257</span>
                                            </div>
                                        </div>
                                        <div class="insta-img">
                                            <img src="../assets/img/authors/avatar2.jpg" title="Mike" alt="images" class="img-fluid">
                                            <div class="pic-credits">
                                                <span class="text-primary"><i class="fa fa-clock-o text-primary" aria-hidden="true"></i> 4m</span>
                                                <span class="float-right text-primary"><i class="fa fa-heart-o text-danger" aria-hidden="true"></i> 257</span>
                                            </div>
                                        </div>
                                        <div class="insta-img">
                                            <img src="../assets/img/authors/avatar3.jpg" title="Tyler" alt="images" class="img-fluid">
                                            <div class="pic-credits">
                                                <span class="text-primary"><i class="fa fa-clock-o text-primary" aria-hidden="true"></i> 4m</span>
                                                <span class="float-right text-primary"><i class="fa fa-heart-o text-danger" aria-hidden="true"></i> 257</span>
                                            </div>
                                        </div>
                                        <div class="insta-img">
                                            <img src="../assets/img/authors/avatar4.jpg" title="harper" alt="images" class="img-fluid">
                                            <div class="pic-credits">
                                                <span class="text-primary"><i class="fa fa-clock-o text-primary" aria-hidden="true"></i> 4m</span>
                                                <span class="float-right text-primary"><i class="fa fa-heart-o text-danger" aria-hidden="true"></i> 257</span>
                                            </div>
                                        </div>
                                        <div class="insta-img">
                                            <img src="../assets/img/authors/avatar5.jpg" title="Colleen" alt="images" class="img-fluid">
                                            <div class="pic-credits">
                                                <span class="text-primary"><i class="fa fa-clock-o text-primary" aria-hidden="true"></i> 4m</span>
                                                <span class="float-right text-primary"><i class="fa fa-heart-o text-danger" aria-hidden="true"></i> 257</span>
                                            </div>
                                        </div>
                                        <div class="insta-img">
                                            <img src="../assets/img/authors/avatar6.jpg" title="Logan" alt="images" class="img-fluid">
                                            <div class="pic-credits">
                                                <span class="text-primary"><i class="fa fa-clock-o text-primary" aria-hidden="true"></i> 4m</span>
                                                <span class="float-right text-primary"><i class="fa fa-heart-o text-danger" aria-hidden="true"></i> 257</span>
                                            </div>
                                        </div>
                                    </v-scroll>
                                </div>
                            </b-card>
                        </b-tab>
                    </b-tabs>
                </b-card>
            </div>
            <div class="col-xl-4 col-md-6">
                <b-card header="Chat" header-tag="h4" no-block class="bg-default-card">
                    <chat :list="chat" height="315" class="chat"></chat>
                </b-card>
            </div>
            <div class="col-xl-8 col-md-12">
                <weather id="5128638"></weather>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
import task from "./widgets/task_component/task.vue";
import chat from "./widgets/chat_component/chat.vue";
import weather from "./widgets/weather/weather.vue";
import IEcharts from 'vue-echarts-v3/src/full.js';
import VueChartist from 'v-chartist';
import LinearGradient from 'zrender/lib/graphic/LinearGradient';
import VueAwesomeSwiper from 'vue-awesome-swiper';
import vScroll from "./plugins/scroll/vScroll.vue";
import chat_data from "../assets/js/chat_data";


import Trend from 'vuetrend';
import easyPieChart from "./plugins/easypiechart/easyPieChart.vue"

Vue.use(Trend);
Vue.use(VueAwesomeSwiper);
require('swiper/dist/css/swiper.css')

var unsub;
export default {
    name: "index",
    components: {
        IEcharts,
        vScroll,
        easyPieChart,
        task,
        chat,
        weather,
        VueChartist
    },
    data() {
        return {
            tabindex: 0,
            //==task options
            list: [{
                tname: "Meeting",
                mark: true
            }, {
                tname: "Holiday",
                mark: true
            }, {
                tname: "Team Out",
                mark: false
            }, {
                tname: "Client Meeting",
                mark: true
            }, {
                tname: "Product Seminar",
                mark: false
            }, {
                tname: "Team Seminar",
                mark: true
            }],
            //==task options

            //==chat options
            chat: chat_data.chat,
            //==chat options
            // ========easypiechart

            val1: 80,
            val2: 95,
            val3: 70,
            val4: 85,
            // ========easypiechart
            swiperOption: {
                pagination: '.swiper-pagination',
                paginationClickable: true,
                spaceBetween: 75,
                centeredSlides: true,
                autoplay: 2500,
                autoplayDisableOnInteraction: false,
                loop: false
            },
            instances: [],
            loading: false,
            // ===========main chat=============
            chartist1: {
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
                    chartPadding: 30,
                    labelOffset: 50,
                    labelDirection: 'explode',
                    axisY: {
                        labelInterpolationFnc: function(value) {
                            return (value / 1) + 'k';
                        }
                    },
                    showArea: true
                }
            },
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
                    show: false,
                    data: ['A', 'B', ]
                },

                color: {
                    pattern: ['red', 'red']
                },
                calculable: true,
                xAxis: [{
                    type: 'category',
                    boundaryGap: false,
                    data: ['Jan', 'Mar', 'May', 'July', 'Sep', 'Nov', 'Dec']
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
                                color: '#E0EEF9'
                            },
                            lineStyle: {
                                color: "#E0EEF9",
                            },


                        }
                    },
                    data: [10, 180, 601, 54, 560, 230, 410]
                }, {
                    name: 'B',
                    type: 'line',
                    smooth: true,
                    itemStyle: {
                        normal: {
                            areaStyle: {
                                type: 'default',
                                color: '#a1def4'
                            },
                            lineStyle: {
                                color: '#a1def4'
                            }
                        }
                    },
                    data: [90, 500, 234, 591, 290, 30, 10]
                }, ]
            },
            // =============area chart end==========
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
                            color: '#188df0',
                        },
                    },
                    data: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
                },
                yAxis: {
                    axisLine: {
                        lineStyle: {
                            color: '#188df0',
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
                    data: [8,13, 10, 25, 20, 27, 38],
                    color: '#188df0',
                }, {
                    name: 'item 2',
                    type: 'line',
                    symbolSize: 5,
                    data: [11, 9, 6, 16, 19, 19, 33],
                    color: '#188df0',
                }]
            },

            trend: [0, 2, 5, 9, 5, 10, 3, 5, 0, 2, 9]
        }
    },

    methods: {
        onReady(instance) {
            this.instances.push(instance)
        },
        // ===chart animation===
        update_chart() {
            setInterval(() => {
                for (var i = 0; i < this.area_chart.series.length; i++) {
                    this.area_chart.series[i].data.shift();
                    this.area_chart.series[i].data.push(Math.floor((Math.random() * (1000 - 80) + 80) + 1));

                }

            }, 2000);
        },
        // ===chart animation===

    },
    watch: {
        tabindex() {
            setTimeout(() => {
                this.$refs.chartist.renderChart();
                this.instances.forEach(function(item, index) {
                    setTimeout(function() {
                        item.resize();
                    });
                });
            })
        }
    },
    mounted() {

        unsub = this.$store.subscribe((mutation, state) => {
            if (mutation.type == "left_menu") {
                this.instances.forEach(function(item, index) {
                    setTimeout(function() {
                        item.resize();
                    });
                });
                setTimeout(() => {
                    this.$refs.chartist.renderChart();
                    this.$refs.swiper.swiper.update();
                });
            }
        });
        this.update_chart();
        setInterval(() => {
            this.val1 = Math.floor(100 * Math.random())
            this.val2 = Math.floor(100 * Math.random())
            this.val3 = Math.floor(50 * Math.random())
            this.val4 = Math.floor(100 * Math.random())
        }, 3000);
    },
    beforeRouteLeave (to, from, next) {
        unsub();
        next();
    },
}
</script>
<style src="chartist/dist/chartist.css"></style>
<style scoped src="../assets/css/index.css"></style>
<style type="text/css">
.index1_swiper .swiper-pagination-bullet-active {
    background: #fff !important;
}
.swiper-widget{
  padding: 7px;

}
.sales-info{
    color: #636c72;
}
.echarts{
    height: 179px !important;
}
/*socio-tabs*/

.socio-tabs {
    min-height: 370px;
    background-color:#f5f8fa;
}

.socio-tabs .tab-content {
    min-height: 315px;
}

.socio-tabs .nav-item a {
    padding: 15px 0;
    text-align: center;
}

.socio-tabs .nav-tabs li:first-child a.active {
    background-color: #55ACEE;
}

.socio-tabs .nav-tabs li:nth-child(2) a.active {
    background-color: #3B5998;
}

.socio-tabs .nav-tabs li:last-child a.active {
    background-color: #3F729B;
}

.socio-tabs .nav-tabs {
    border-top: 3px solid #FFF;
    border-bottom: 0;
}

.socio-tabs .nav-item {
    width: 33.33%;
}

.socio-tabs .nav-tabs .nav-link,
.socio-tabs .nav-tabs .nav-link:focus,
.socio-tabs .nav-tabs .nav-link:hover {
    border-color: #fff #fff #ddd;
    font-size: 14px;
    color: #777;
}

.socio-tabs .nav-tabs .nav-link.active,
.socio-tabs .nav-tabs .nav-item.show .nav-link {
    border-color: #fff #fff #ddd;
    color: #FFF;
}

.tab-pane .card {
    border-color: #FFF;
    margin: 0;
}

.tab-pane .card-block {
    padding: 12px;
}

.twitter .tweet-img {
    width: 17%;
}
.twitter .tweet {
    width: 83%;
    padding-left: 3%;
}
.swiper-container{
    margin-top: 22px;
}
.swiper-pagination-fraction, .swiper-pagination-custom, .swiper-container-horizontal > .swiper-pagination-bullets{
    bottom: 26px !important;
}
a.prfl-link {
    overflow: hidden;
    display: block;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.twitter .tweet .options {
    margin: 0;
}

.twitter .tweet .options i {
    margin-left: 15px;
    cursor: pointer;
}

.facebook .page-img,
.instagram .page-img {
    width: 17%;
}

.facebook .page-name,
.instagram .page-name {
    width: 83%;
    padding-left: 3%;
}
.fb-friends{
    overflow: hidden;
}
.fb-friends img {
    width: 23%;
    margin: 0 0 5px 2px;
    cursor: pointer;
}
.fb-friends img:hover{
    transform: scale(1.1,1.1);
    transition: 300ms
}
.insta-pins .insta-img {
    width: 49%;
    margin: 0 1px;
    float: left;
    position: relative;
}

.insta-pins .insta-img img {
    width: 100%;
    height: 130px;
}

.insta-pins .insta-img .pic-credits {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 3px 7px;
    color: #555;
    background-color: rgba(255, 255, 255, .6);
}

.task1 {
    padding-bottom: 20px!important;
}

.task1 .btn {
    margin-right: 15px!important;
}


/*========chart============*/

#annual-sales {
    position: relative;
    height: 260px;
}

#annual-sales .ct-grid {
    stroke: rgba(0, 0, 0, .07);
    stroke-width: 1px;
    stroke-dasharray: 0;
}

#annual-sales .ct-label {
    color: rgba(0, 0, 0, .7);
    font-size: 1.1rem;
}

#annual-sales .ct-label.ct-horizontal.ct-end {
    margin-left: -15px;
}

@media screen and (max-width:390px) {
    #annual-sales {
        height: 200px;
    }
    #annual-sales .ct-label.ct-horizontal.ct-end {
        transform: rotate(-45deg);
    }
}

#annual-sales .ct-series-a .ct-line,
#annual-sales .ct-series-a .ct-point {
    stroke: #4FC1E9;
}

#annual-sales .ct-series-b .ct-line,
#annual-sales .ct-series-b .ct-point {
    stroke: #09BD8F;
}

#annual-sales .ct-point {
    stroke-width: 7px;
    cursor: pointer;
}

#annual-sales .ct-series-a .ct-area {
    fill: #BFBFC6;
    fill-opacity: .05
}

#annual-sales .ct-series-b .ct-area {
    fill: #4086C1;
    fill-opacity: .05
}

#annual-sales .ct-line {
    stroke-width: 1px
}


.chartist-tooltip {
    background-color: #0a0a0a;
    color: #FFF;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

.chartist-tooltip:before,
.chartist-tooltip:after {
    content: none;
}

.nav-tabs:focus {
    outline: none;
}

.icon_color {
    color: #22b1e3;
    font-size: 25px;
}

.circle_round{
    font-size: 20px;
}
.circle_round1{
    font-size: 22px;
}
.top_border1{
    width:60px;
    height:60px;
    border-radius: 50%;
    line-height: 4.1;
    font-size: 15px;
    color: #fff;
    box-shadow:1px 1px 20px rgba(75, 156, 228, 0.88);
}
.top_border2{
    width:60px;
    height:60px;
    border-radius: 50%;
    line-height: 4.1;
    font-size: 15px;
    color: #fff;
    box-shadow: 1px 1px 20px rgba(82, 162, 185, 0.86);
}
.top_border3{
    width:60px;
    height:60px;
    border-radius: 50%;
    line-height: 4.1;
    font-size: 15px;
    color: #fff;
    box-shadow: 1px 1px 22px rgb(19, 191, 210);
}
.top_border4{
    width:60px;
    height:60px;
    border-radius: 50%;
    line-height: 4.1;
    font-size: 15px;
    color: #fff;
    box-shadow:1px 1px 20px rgba(23, 96, 160, 0.89);
}
.bg_color1{
    background-color: #4b9ce4;
}
.bg_color2{
    background-color: #328ba7;
}
.bg_color3{
    background-color: #13bfd2;
}
.bg_color4{
    background-color: #1760a0;
}
.number_size{
    font-size: 20px;
    color: #646567;
    margin-bottom: 0 !important;
}
.user_font{
    font-size: 13px;
    color: #646567;
    margin-bottom: 0!important;
}
.m-t-10{
    margin-top: 8px;
}
/*======chartist=========*/
</style>
<style scoped lang="scss">
    /*========================easy pie chart========================*/

.easychart {
    & .chart {
        margin: 2px auto;
        position: relative;
        display: inline-block;
        text-align: center;
    }
    .circle_val {
        display: block;
        font-weight: normal;
        color: #646a6f;
        position: relative;
    }
    .percent {
        display: inline-block;
        z-index: 2;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
}
</style>
