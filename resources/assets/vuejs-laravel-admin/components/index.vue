<template>
    <div>
        <div class="row mb-4">
        <div class="col-lg-3  col-sm-6 mb-3">
                <div class="text-center p-3 widget_social_icons box_shadow">
                    <div class="widget_social_inner1">
                        <i class="fa fa-user-o fb_text"></i>
                    </div>
                    <div class="text-ash">
                        <h4 class="mt-2 text_size">7465+</h4>
                        <p class="m-0 mt-2">Users</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-sm-6 mb-3">
                <div class="text-center p-3 widget_social_icons box_shadow ">
                    <div class="widget_social_inner1">
                        <i class="fa fa-link fb_text"></i></div>
                    <div class="text-ash">
                        <h4 class="mb-0 mt-2 text_size">1245+</h4>
                        <p class="m-0 mt-2">Followers</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="text-center p-3 widget_social_icons box_shadow">
                    <div class=" widget_social_inner1">
                        <i class="fa fa-comments-o fb_text"></i>
                    </div>
                    <div class="text-ash">
                        <h4 class="mb-0 mt-2 text_size">742+</h4>
                        <p class="m-0 mt-2">Messages</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-md-6 mb-3">
                <div class="text-center p-3 widget_social_icons box_shadow">
                    <div class=" widget_social_inner1">
                        <i class="fa fa-clone fb_text"></i>
                    </div>
                    <div class="text-ash">
                        <h4 class="mb-0 mt-2 text_size">465+</h4>
                        <p class="m-0 mt-2">Documents</p>
                    </div>
                </div>
            </div>
            </div>
               <!--========================Annual Stats===========================-->
            <div class="row">
               <div class="col-lg-12 col-xl-8">
                 <b-card>
                     <h5 class="ml-3 head_color">Annual Stats</h5>
                    <div style="height: 305px;">
                        <IEcharts :option="ajaxbar_chart" :loading="ajaxloading" @ready="onReady" ref="ajaxbar_chart"></IEcharts>
                    </div>
                </b-card>
                <b-card class="article_widget">
                    <div class="row">
                        <div class="col-12 col-lg-9 col-sm-9 text_color mt-2">
                            <h5 class="ml-3"> Live With Trending Articles </h5>
                            <div class="mt-3">
                      <span class="text-left ml-3">
                          <span><i class="fa fa-map-marker"></i> <small>London</small></span>
                      </span>
                            <span class="text-right pl-3">
                                <span><i class="fa fa-calendar"></i>  <small>04,Aug 2017</small></span>
                            </span>
                            </div>
                    <p class="mt-4 ml-3">Morbi nisi elit, blandit sit amet tincidunt eget, ullamcorper at diam. Nunc ultricies semper ullamcorper at diam.</P>
                        </div>
                        <div class="col-12  col-lg-3 col-sm-3 mt-3">
                            <img src="../assets/img/pages/gal4.jpg" alt="profile image" class="img-fluid">
                        </div>
                    </div>
                </b-card>
          <!--=========================Site Visitors Chart=============================         -->
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <b-card>
                            <h5 class="ml-3 head_color">Site Visitors Chart</h5>
                            <vue-chartist :data="donut.data" :options="donut.options" type="Pie" :responsiveOptions="donut.responsiveoptions" ref="chartist6"></vue-chartist>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 text_color">
                                    IE
                                </div>
                                <div class="col-lg-9 col-sm-12 progress_color1">
                                    <b-progress v-model="progress2counter1" show-progress class="mb-4"></b-progress>
                                </div>
                                <div class="col-lg-3 col-sm-12 text_color">
                                    Chrome
                                </div>
                                <div class="col-lg-9 col-sm-12 progress_color2">
                                    <b-progress v-model="progress2counter4" show-progress class="mb-4"></b-progress>
                                </div>
                                <div class="col-lg-3 col-sm-12 text_color">
                                    Firefox
                                </div>
                                <div class="col-lg-9 col-sm-12 progress_color3">
                                    <b-progress v-model="progress2counter5" variant="success" show-progress class="mb-4"></b-progress>

                                </div>
                            </div>
                        </b-card>
                    </div>
                    <!--=======================Features section=====================-->
                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <b-card>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row ">
                                        <div class="col-3 mt-4 mb-3 text-center">
                                            <i class="fa fa-clone icon_color1"></i>
                                        </div>
                                        <div class="col-9 mt-4">
                                            <h5 class="text_head_Color">
                                                More Features</h5>
                                            <p class="below_text">This is the kind of thing you need.</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-3  line">
                                        <div class="col-3 mt-4 text-center">
                                            <i class="fa fa-bookmark-o icon_color"></i>
                                        </div>
                                        <div class="col-9 mt-4">
                                            <h5  class="text_head_Color">Unlimited Users</h5>
                                            <p class="below_text">This is the kind of thing you need.</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-3  line">
                                        <div class="col-3 mt-4 text-center">
                                            <i class="fa fa-object-group icon_color1"></i>
                                        </div>
                                        <div class="col-9 mt-3">
                                            <h5  class="text_head_Color">Custom Database</h5>
                                            <p class="below_text">This is the kind of thing you need.</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-4  line">
                                        <div class="col-3 mt-4 text-center">
                                            <i class="fa fa-desktop icon_color"></i>
                                        </div>
                                        <div class="col-9 mt-3">

                                            <h5  class="text_head_Color">Enhanced Reporting</h5>
                                            <p class="below_text">This is the kind of thing you need.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </b-card>
                    </div>
                </div>
                   <!--======================registered users========================-->
                <div class="row">
                    <div class="col-xl-12 index2_table">
                        <b-card no-block>
                            <h5 class="head_color mt-4 ml-5 mb-2">Registered Users</h5>
                            <div class="table-responsive">
                                <datatable :exportable="true" per-page="5" :rows="tableData" :columns="columndata"></datatable>
                            </div>
                        </b-card>
                    </div>
                </div>

            </div>
                <!--======================Monthly Sales========================-->
            <div class="col-lg-12 col-xl-4">
                <div class="row">
                    <div class="col-lg-6 col-xl-12 col-md-6">
                        <b-card>
                            <h5 class="ml-3 mb-4 head_color">Monthly Sales</h5>
                            <div style="height: 150px;" class="mt-2">
                                <IEcharts :option="doughnut" :loading="loading" @ready="onReady"></IEcharts>
                            </div>
                        </b-card>
                    </div>
          <!--====================Timeline============================-->
                    <div class="col-lg-6 col-xl-12 col-md-6">
                        <b-card>
                            <h5 class="ml-3 mb-4 head_color">Timeline</h5>
                            <div class="row">
                                <div class="col-2">
                                    <img src="../assets/img/authors/avatar.jpg" alt="image missing" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-10">
                                   <span class="head_color"> <b>Walters</b> Started following Designs  by <span class="text-blue">Torres</span></span>
                                </div>
                                <div class="col-2 mt-4 mb-2">
                                    <img src="../assets/img/authors/avatar1.jpg" alt="image missing" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-10 mt-4 mb-2">

                                    <span class="head_color"> <b>Martin</b> shared the Icon designs of  <span class="text-blue">Alan Rivera</span></span>
                                </div>
                                <div class="col-2 mt-4 mb-2">
                                    <img src="../assets/img/authors/avatar2.jpg" alt="image missing" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-10 mt-4 mb-2">

                                    <span class="head_color"> <b>Stanley</b> completed the task assigned by<span class="text-blue"> Stanley  Ben Adams</span></span>
                                </div>
                                <div class="col-2 mt-4 mb-2">
                                    <img src="../assets/img/authors/avatar3.jpg" alt="image missing" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-10 mt-4 mb-2">

                                    <span class="head_color"> <b>Thomas</b> liked an article by Randy <span class="text-blue">Spencer</span></span>
                                </div>
                            </div>
                        </b-card>
                    </div>
                    <!--==========================swiper section=========================================-->
                    <div class="col-lg-6 col-xl-12 col-md-6 index2_swiper ">
                        <b-card class="swiper-widget text-center">
                            <swiper :options="swiperOption" ref="swiper">
                                <swiper-slide>
                                    <img src="../assets/img/pages/weathernew.jpg" alt="profile image" class="img-fluid mb-2">
                                    <h5 class="user_color mt-4 mb-4">User 1</h5>
                                    <p>
                                        Morbi nisi elit, blandit sit amet tincidunt eget, ullamcorper at diam. Nunc ultricies
                                    </p>
                                </swiper-slide>
                                <swiper-slide>
                                    <img src="../assets/img/pages/headsset.jpg" alt="profile image" class="img-fluid mb-2">
                                    <h5 class="user_color mt-4 mb-4">User 2</h5>
                                    <p>
                                        Morbi nisi elit, blandit sit amet tincidunt eget, ullamcorper at diam. Nunc ultricies
                                    </p>
                                </swiper-slide>
                                <swiper-slide>
                                    <img src="../assets/img/pages/gal4.jpg" alt="profile image" class="img-fluid mb-2">
                                    <h5 class="user_color mt-4 mb-4">User 3</h5>
                                    <p>
                                        Morbi nisi elit, blandit sit amet tincidunt eget, ullamcorper at diam. Nunc ultricies
                                    </p>
                                </swiper-slide>
                                <swiper-slide>
                                    <img src="../assets/img/pages/gal10.jpg" alt="profile image" class="img-fluid mb-2">
                                    <h5 class="user_color mt-4 mb-4">User 4</h5>
                                    <p>
                                        Morbi nisi elit, blandit sit amet tincidunt eget, ullamcorper at diam. Nunc ultricies
                                    </p>
                                </swiper-slide>
                                <swiper-slide>
                                    <img src="../assets/img/pages/gal4.jpg" alt="profile image" class="img-fluid ">
                                    <h5 class="user_color mt-4 mb-4">User 5</h5>
                                    <p>
                                        Morbi nisi elit, blandit sit amet tincidunt eget, ullamcorper at diam. Nunc ultricies
                                    </p>
                                </swiper-slide>
                                <div class="mt-1"></div>
                                <div class="swiper-pagination" slot="pagination"></div>
                            </swiper>
                            <hr>
                            <div>
                                <p class="pull-left mt-1">
                                    <i class="fa fa-calendar text-danger pr-2"> </i>
                                    <small>24-07-2017</small>
                                    <i class="fa fa-clock-o text-primary"></i>
                                    <small> 12:45pm</small>
                                </p>
                                <span><button class="btn btn-info pull-right text-white mt-2">View Details</button></span>
                            </div>
                        </b-card>
                    </div>

                     <!--==================portfolio====================-->
                    <div class="col-lg-6 col-xl-12 col-md-6">
                        <div class="card tweet-profile">
                            <div class="card-header text-center">
                                <h4>Joncruz  Roy</h4>
                                <p>admin.roy9@example.com</p>
                            </div>
                            <span class="profile-img  text-center online_dot">
                            <img src="../assets/img/authors/avatar3.jpg" alt="profile image" class="img-fluid">
                          </span>
                            <div class="card-block dot back_color1">
                                <div class="tweet-details1">
                                </div>
                                <div class="row">
                                    <div class="chat-conversation">
                                        <ul class="conversation-list">
                                            <li class="clearfix odd conversers1">
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap m-t-10">
                                                        <p class="text-left">
                                                            Hello Wilton, are the review papers ready?
                                                            <i class="text-right">8:31 pm</i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="clearfix  m-t-10 conversers2">
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <p>
                                                            Not yet, it will take a bit of time for you to get them.
                                                            <br><i class="text-right">8:31 pm</i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="clearfix odd m-t-10 conversers1">
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <p class="text-left">
                                                            Treat this on urgent Basis.
                                                            <i class="text-right">8:33 pm</i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="clearfix  m-t-10 conversers2">
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <p>
                                                            I will make it as early as possible.
                                                            <br><i class="text-right">8:34 pm</i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="clearfix odd m-t-10 conversers1">
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <p class="text-left">
                                                            Okay.
                                                            <i class="text-right">8:35 pm</i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';

import IEcharts from 'vue-echarts-v3/src/full.js';

import 'zrender/lib/vml/vml';
require('swiper/dist/css/swiper.css')

import VueAwesomeSwiper from 'vue-awesome-swiper';
import countTo from 'vue-count-to';

import datatable from "./plugins/DataTable/DataTable.vue";
import vScroll from "./plugins/scroll/vScroll.vue";
import portfolio from "./widgets/portfolio/portfolio.vue"
import VueChartist from 'v-chartist'


Vue.use(VueAwesomeSwiper);
var unsub;
export default {
    name: "index2",
    components: {
        IEcharts,
        datatable,
        countTo,
        vScroll,
        portfolio,
        VueChartist
    },
    data() {
        return {
            serverdata: [],
            instances: [],
            loading: false,
            ajaxloading: true,
            //==========Doughnut chart data start=====
            doughnut: {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['Jan', 'Mar', 'May', 'Aug', 'Dec']

                },
                series: [{
                    name: 'Sales',
                    type: 'pie',
                    radius: ['50%', '70%'],
                    avoidLabelOverlap: false,
                    color: ['#137cbc', '#279fc9', '#4cb6e5', '#98d4f9', '#afebf9'],
                    label: {
                        normal: {
                            show: false,
                            position: 'center',

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
                        value: 455,
                        name: 'Jan',

                    }, {
                        value: 310,
                        name: 'Mar'
                    }, {
                        value: 234,
                        name: 'May'
                    }, {
                        value: 135,
                        name: 'Aug'
                    }, {
                        value: 148,
                        name: 'Dec'
                    }]
                }]
            },
            //==========Doughnut chart data end=====
            // ======donut chart start=======
            donut: {
                data: {
                    labels: ['C', 'IE', 'F'],
                    series: [50, 20, 30],

                },
                options: {

                    donut: true,
                    donutWidth: 42,
                    labelInterpolationFnc: function(value) {
                        return value[0]
                    }
                },
                responsiveoptions: [
                    ['screen and (min-width: 640px)', {
                        chartPadding: 30,
                        labelOffset: 40,
                        labelDirection: 'explode',
                        labelInterpolationFnc: function(value) {
                            return value;
                        }
                    }],
                    ['screen and (min-width: 1024px)', {
                        labelOffset: 50,
                        chartPadding: 40
                    }]
                ]
            },
            // ======donut chart end================

            //==========swipper=========

            swiperOption: {
                pagination: '.swiper-pagination',
                paginationClickable: true,
                spaceBetween: 55,
                effect: 'flip',
                centeredSlides: true,
                autoplay: 2500,
                autoplayDisableOnInteraction: false,
                loop: false,
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev'
            },
            //=============progress bar============
            progress2counter1: 20,
            progress2counter4: 50,
            progress2counter5: 30,


            //===========AJAX chart data start=========
            ajaxbar_chart: {
                tooltip : {
                    trigger: 'axis'
                },
                grid:{
                    bottom:'10%',
                    right:'1%',
                },
                toolbox: {
                    show : true,
                    feature : {
//
                    }
                },
                calculable : true,
                legend: {
                    data:['PROJECTS','SALES']
                },
                color:['#a0bce5','#baf2e1'],
                xAxis : [
                    {
                        type : 'category',
                        name : 'YEAR',
                        data : ['2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016','2017']
                    }
                ],
                yAxis : [
                    {
                        type : 'value',
                        name : '%',
                        axisLabel : {
                            formatter: '{value} '
                        }
                    },
                    {
                        type : 'value',

                        axisLabel : {
                            formatter: '{value} '
                        }
                    }
                ],
                series : [

                    {
                        name:'PROJECTS',
                        type:'bar',
                        data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
                    },
                    {
                        name:'SALES',
                        type:'bar',
                        data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
                    },

                ]
            },
            //===========AJAX chart data end=========\
                        // ===tabledata
            tableData: [],
            columndata: [{
                label: 'ID',
                color:['#ccc'],
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
                label: 'Status',
                field: 'status',
                numeric: false,
                html: false,
            }, {
                label: 'Actions',
                field: 'action',
                numeric: false,
                html: true,
            }]

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
        axios.get("http://www.filltext.com/?rows=10&id={index}&name={firstName}~{lastName}&email={email}&status=[%22Activated%22,%22Deactivated%22]").then(response => {
                this.tableData = response.data;
                this.tableData.forEach((item, index) => {
                    this.$set(item, "action", "<a class='text-info' href='javascript:void(0)'><i class='fa fa-pencil'></i></a> <a class='text-danger' href='javascript:void(0)'><i class='fa fa-trash'></i></a>");
                });
            })
            .catch(function(error) {

            });

        axios.get("http://www.filltext.com/?rows=1&chartdata={numberArray|12,100}").then(response => {
            this.ajaxbar_chart.series[0].data = response.data[0].chartdata;
            this.ajaxloading = false;
        })
                .catch(function(error) {

                });

    },
   beforeRouteLeave (to, from, next) {        unsub();        next();    },

    methods: {
        onReady(instance) {
            this.instances.push(instance)
        },
// ===chart animation===
        update_chart() {
            setInterval(() => {
                for (var i = 0; i < this.ajaxbar_chart.series.length; i++) {
                    this.ajaxbar_chart.series[i].data.shift();
                    this.ajaxbar_chart.series[i].data.push(Math.floor((Math.random() * (1000 - 90) + 90) + 1));
                }
            }, 4000);
        },
        // ===chart animation===
    }
}
</script>
<!-- styles -->
<!-- adding scoped attribute will apply the css to this component only -->
<style src="../assets/css/widgets.css" scoped></style>
<style scoped>
.swiper-pagination {
    /*margin: 12px 0 0 0 !important;*/
    position: relative;
}
.swiper-pagination-fraction, .swiper-pagination-custom, .swiper-container-horizontal > .swiper-pagination-bullets{
    top:5px;
}
.swiper-container{
    margin-top: 0px !important;
}
</style>
<style type="text/css" lang="scss">
.index2_table .table-responsive .card {
    border: none;
    box-shadow: none;
    margin-bottom: 0;
}

.index2_swiper .swiper-pagination-bullet-active {
    background: #08aa80;
}


/*===============================notes========*/

.notes {
    line-height: 22px;
    font-size: 13px;
    padding: 0 15px 0 36px;
    position: relative;
    outline: none;
    background: #fff;
    background-size: 100% 30px;
}

.notes p {
    border-bottom: 1px solid #dfe8ec;
    ;
}
.notes::after {
    content: '';
    position: absolute;
    width: 0;
    top: 0;
    left: 25px;
    bottom: 0;
    border-left: 1px solid #0fd1c1;
}

.social .bg-default-card .info {
    font-size: 12px;
}

.social .bg-default-card span {
    display: block;
    text-transform: uppercase;
}

.social .bg-default-card .value {
    font-size: 40px;
    line-height: normal;
}

.social .bg-default-card:hover {
    i {
        font-size: 45px;
        transition: 300ms;
    }
}

.social .bg-default-card {
    i {
        transition: 300ms;
    }
}

.social_cuntdata {
    font-weight: bold;
    font-size: 18px;
}
.subscribe_btn {
    background-color: transparent;
    border: 0;
    outline: none;}

    .article_widget{
        border: none;
        background:#fff;
    }
    .widget_social_icons{
        background-color: #fff;
    }
    .fb_text{
        color:#215fe2;
        font-size: 28px;
    }
    .m-0{
        font-size:13px;
        margin-top:20px;
        color: #8a8a8a;
    }
    .box_shadow{
        box-shadow: 2px 2px 15px 0px #ccc;
    }
    .head_color{
        color:#686868;
    }
    .text_size{
        font-size: 25px;
        color: #797f82;
    }
    .text-ash{
        color: #575f65;
    }
    .text_color{
        color: #646161 !important;

    }
    .swiper-pagination{
        margin: 0 !important;
    }
    .text-blue{
        color: #215fe2;
    }
    .progress_color2 .progress-bar{
        background-color:#7FAFF7;
    }
    .icon_color{
        font-size: 27px;
        color:#828686;
    }
.icon_color1{
    font-size: 25px;
    color:#6e8dce;
}
    .line{
        border-top:1px solid #ccc;
    }
    .text_head_Color{
        color: #707373;
    }
    .below_text{
        color:#a2a1a1;
    }
    .index2_table th{
        color:#686868;
    }
.index2_table td{
    color:#686868;
}
    .user_color{
        color:#8e8c8e;
    }
    .count1{
        font-size: 18px;
        color: #686868;
    }
    .ti_color{
        color:#215fe2;

    }
.fb_color{
    font-size: 18px;
    color: #3B5998;

}
.twi_color{
    color: #00aced;
    font-size: 18px;
}
 .gi_color{
     color: red;
     font-size: 18px;
 }
    .pin_color{
        color: red;
    }
    .cam_color{
        color:green
    }
    .events1{
        border: 1px solid #ccc;
        border-radius: 5px;
        padding-top: 2px;
        padding-bottom: 2px;
        margin-top: 15px;
        margin-right: -20px;
        font-size: 18px;
        color: #555;
    }
    .online_dot img{
        position: relative;
    }
    .online_dot::after{
        content: "";
        position: absolute;
        margin-top: -28px;
        height: 11px;
        width: 11px;
        border: 2px solid #FFF;
        border-radius: 50%;
        background-color: green;
        margin-left: -13px;

    }
    .conversation-list .ctext-wrap p{
        margin: 0;
        padding-top: 3px;
    }
    .conversation-list .odd .ctext-wrap:after {
        border-color: rgba(238, 238, 242, 0);
        left: 99%;
        margin-right: -1px;
        border-top: 0 solid #D8F1E4;
        border-left: 12px solid #D8F1E4;
        border-bottom: 14px solid transparent;
    }
.conversation-list .ctext-wrap p {
    margin: 0;
    /*padding-top: 3px;*/
}
.ctext-wrap p{
    margin-bottom: 10px;
}
.conversation-list .odd .conversation-text {
    float: right;
    margin-right: 18px;
    text-align: right;
    width: 95%;
}
.conversation-list .ctext-wrap i {
    color: #777;
    display: block;
    font-size: 11px;
    font-style: normal;
    position: relative;
}
.conversation-list .conversers1 .ctext-wrap {
    background: #D8F1E4;
}
.conversation-list .ctext-wrap {
    border-radius: 3px;
    display: inline-block;
    padding: 5px 10px;
    position: relative;
    box-shadow: 2px -2px 4px 0px rgba(0, 0, 0, 0.1)
}
.text-field {
    padding: 6px 10px;
}

.conversation-list .odd .ctext-wrap:after {
    border-color: rgba(238, 238, 242, 0);
    left: 99%;
    margin-right: -1px;
    border-top: 0 solid #D8F1E4;
    border-left: 12px solid #D8F1E4;
    border-bottom: 14px solid transparent;
}
.conversation-list .ctext-wrap:after {
    right: 100%;
    top: 0;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    margin-left: -1px;
    border-top: 0 solid #fff;
    border-right: 12px solid #e9f9ff;
    border-bottom: 14px solid transparent;
}
.clearfix:after {
    clear: both;
}
    .back_color1{
        width:auto;
        height: 274px;
        overflow-y: auto;
        overflow-x: hidden;

    }
.conversation-list .conversation-text {
    display: inline-block;
    float: left;
    font-size: 13px;
    /*margin-left: 15px;*/
    width: 70%;
}
.clearfix:before, .clearfix:after {
    content: " ";
    display: table;
}
.conversation-list .conversers2 .ctext-wrap {
    background: #e9f9ff;
}
.m-t-10 {
    margin-top: 10px !important;
}
    .conversation-list{
        overflow: hidden;
        width: auto;
        height: 340px;
    }
    .profile-img{
        background-color: #fff;
    }
</style>
<style src="chartist/dist/chartist.css"></style>
