<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card user-profile">
                        <div class="card-block">
                            <span class="float-left profile-img">
                                <img src="../assets/img/authors/avatar4.jpg" alt="profile image" class="img-fluid ml-3 mt-3 mb-3">
                              </span>
                            <div class="profile-details">
                                <h4 class="text-primary">Jerry Roy</h4>
                                <p class="ml-3">Project Architect</p>
                            </div>
                        </div>
                        <table class="table account-details">
                            <tbody>
                                <tr>
                                    <td>
                                        <i class="fa fa-list"></i>
                                    </td>
                                    <td>New Tasks</td>
                                    <td> 4</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-pencil"></i>
                                    </td>
                                    <td>Pending Task</td>
                                    <td> 6</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-envelope-o"></i>
                                    </td>
                                    <td>Inbox</td>
                                    <td> 28</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-bell-o"></i>
                                    </td>
                                    <td>Notification</td>
                                    <td> 5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix  visible-xs-block"></div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <portfolio></portfolio>
                </div>
                <div class="clearfix visible-sm-block visible-md-block"></div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card user-page">
                        <div>
                            <img src="../assets/img/pages/timeline.jpeg" alt="cover-image" class="cover-image img-fluid">
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <img src="../assets/img/authors/avatar4.jpg" alt="profile image" class="user-pic">
                            </div>
                            <div class="col-8">
                                <span class="post-details">
                                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                                  Pilatus, <strong>SWITZERLAND </strong><br> by <strong>Antonio Hansen</strong>
                                </span>
                            </div>
                        </div>
                        <div class="row text-center m-0">
                            <div class="col-4 views">
                                <i class="fa fa-eye" aria-hidden="true"></i> 1,243
                            </div>
                            <div class="col-4 views">
                                <i class="fa fa-comment-o" aria-hidden="true"></i> 65
                            </div>
                            <div class="col-4 views">
                                <i class="fa fa-heart-o" aria-hidden="true"></i> 680
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6">
                    <b-card no-block>
                        <b-tabs>
                            <b-tab title="Details" active>
                                <b-card>
                                    <article class="media">
                                        <a class="float-left desc-img">
                                            <img src="../assets/img/pages/item1.jpg">
                                        </a>
                                        <div class="media-body">
                                            <a class="d-head" href="javascript:void(0)">Hot in Market</a>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever.</p>
                                        </div>
                                    </article>
                                    <article class="media">
                                        <a class="float-left desc-img">
                                            <img src="../assets/img/pages/item2.jpg">
                                        </a>
                                        <div class="media-body">
                                            <a class="d-head" href="javascript:void(0)">Key Gadgets</a>
                                            <p>a search for 'lorem ipsum' will sites still in their infancy.</p>
                                        </div>
                                    </article>
                                    <article class="media">
                                        <a class="float-left desc-img">
                                            <img src="../assets/img/pages/item3.jpg">
                                        </a>
                                        <div class="media-body">
                                            <a class="d-head" href="javascript:void(0)">Trending Design</a>
                                            <p>All the Lorem Ipsum generators on the Internet tend to repeat .</p>
                                        </div>
                                    </article>
                                </b-card>
                            </b-tab>
                            <b-tab title="Comments">
                                <b-card>
                                    <article class="media">
                                        <a class="float-left desc-img">
                                            <img src="../assets/img/authors/avatar1.jpg">
                                        </a>
                                        <div class="media-body">
                                            <a class="c-head" href="javascript:void(0)">Discovered the undoubtable source comes from
                                                sections.</a>
                                            <p class="text-muted"><i class="fa fa-clock-o"></i> Yesterday</p>
                                        </div>
                                    </article>
                                    <article class="media">
                                        <a class="float-left  desc-img">
                                            <img src="../assets/img/authors/avatar2.jpg">
                                        </a>
                                        <div class="media-body">
                                            <a class="c-head" href="javascript:void(0)">Combined with a handful of model sentence
                                                structures</a>
                                            <p class="text-muted"><i class="fa fa-clock-o"></i> 15 mins ago</p>
                                        </div>
                                    </article>
                                    <article class="media">
                                        <a class="float-left  desc-img">
                                            <img src="../assets/img/authors/avatar3.jpg">
                                        </a>
                                        <div class="media-body">
                                            <a class="c-head" href="javascript:void(0)">Classical Latin literature from making it over. </a>
                                            <p class="text-muted"><i class="fa fa-clock-o"></i> Just now</p>
                                        </div>
                                    </article>
                                </b-card>
                            </b-tab>
                            <b-tab title="Activity">
                                <b-card>
                                    <article class="media">
                                        <div class="media-body">
                                            <a class="c-head" href="javascript:void(0)"><i class="fa fa-arrow-right text-danger" aria-hidden="true"></i>Discovered the undoubtable from sections.<p class="text-muted"> 5 Days ago</p></a>
                                        </div>
                                    </article>
                                    <article class="media">
                                        <div class="media-body">
                                            <a class="c-head" href="javascript:void(0)"><i class="fa fa-arrow-right text-danger" aria-hiden="true"></i>Combined with a sentence structures.<p class="text-muted"> 2 Days ago</p></a>
                                        </div>
                                    </article>
                                    <article class="media">
                                        <div class="media-body">
                                            <a class="c-head" href="javascript:void(0)"><i class="fa fa-arrow-right text-danger"
                                    en="true"></i>
                                                Classical from making it over.
                                            <p class="text-muted"> 2 Hours ago</p></a>
                                        </div>
                                    </article>
                                    <article class="media">
                                        <div class="media-body">
                                            <a class="c-head" href="javascript:void(0)"><i class="fa fa-arrow-right text-danger" aria-hiden="true"></i>I am the last updated activity list here.<p class="text-muted"> Just now</p></a>
                                        </div>
                                    </article>
                                </b-card>
                            </b-tab>
                        </b-tabs>
                    </b-card>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card weekly-stats">
                        <div class="stats-chart text-center">
                            <div class="echarts">
                                <IEcharts :option="line" :loading="loading" @ready="onReady"></IEcharts>
                            </div>
                        </div>
                        <div class="row m-0 text-center">
                            <div class="col-6 weekly-shots">
                                <div class="shots-likes">
                                    <h4>Shots</h4>
                                    <p>360</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="shots-likes">
                                    <h4>Likes</h4>
                                    <p>21,080</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <b-card no-block>
                        <b-tabs>
                            <b-tab title="Compose" active>
                                <b-card>
                                    <form>
                                        <div class="form-group">
                                            <div>
                                                <input class="form-control" name="email" type="text" id="input_Email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <input class="form-control" name="subject" type="text" id="subject" placeholder="Subject">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <textarea class="form-control" name="address" id="message" rows="4" placeholder="Enter address"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group form-actions">
                                            <button type="submit" class="btn btn-danger text-white btn-md float-right control-form">Send</button>
                                        </div>
                                    </form>
                                </b-card>
                            </b-tab>
                            <b-tab title="Inbox">
                                <b-card>
                                    <ul class="mail-list">
                                        <li>
                                            <table class="table mail-list">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input mail-state" value="agree">
                                                                <span class="custom-control-indicator custom_checkbox_primary"></span>
                                                            </label>
                                                        </td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td> Lorem..</td>
                                                        <td>Lorem text..</td>
                                                        <td>Feb 7</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li>
                                            <table class="table mail-list">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input mail-state" value="agree">
                                                                <span class="custom-control-indicator custom_checkbox_primary"></span>
                                                            </label>
                                                        </td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td> Lorem..</td>
                                                        <td>Lorem text..</td>
                                                        <td>Feb 7</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li>
                                            <table class="table mail-list">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input mail-state" value="agree">
                                                                <span class="custom-control-indicator custom_checkbox_primary"></span>
                                                            </label>
                                                        </td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td> Lorem..</td>
                                                        <td>Lorem text..</td>
                                                        <td>Feb 7</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li>
                                            <table class="table mail-list">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input mail-state" value="agree">
                                                                <span class="custom-control-indicator custom_checkbox_primary"></span>
                                                            </label>
                                                        </td>
                                                        <td><i class="fa  fa-star-o" aria-hidden="true"></i></td>
                                                        <td> Lorem..</td>
                                                        <td>Lorem text..</td>
                                                        <td>Feb 7</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li>
                                            <table class="table mail-list">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input mail-state" value="agree">
                                                                <span class="custom-control-indicator custom_checkbox_primary"></span>
                                                            </label>
                                                        </td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td> Lorem..</td>
                                                        <td>Lorem text..</td>
                                                        <td>Feb 7</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                    </ul>
                                </b-card>
                            </b-tab>
                            <b-tab title="Trash">
                                <b-card>
                                    <ul class="mail-list">
                                        <li>
                                            <table class="table mail-list">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input mail-state" value="agree">
                                                                <span class="custom-control-indicator custom_checkbox_primary"></span>
                                                            </label>
                                                        </td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td> Lorem..</td>
                                                        <td>Lorem text..</td>
                                                        <td>Feb 7</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li>
                                            <table class="table mail-list">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input mail-state" value="agree">
                                                                <span class="custom-control-indicator custom_checkbox_primary"></span>
                                                            </label>
                                                        </td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td> Lorem..</td>
                                                        <td>Lorem text..</td>
                                                        <td>Feb 7</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li>
                                            <table class="table mail-list">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input mail-state" value="agree">
                                                                <span class="custom-control-indicator custom_checkbox_primary"></span>
                                                            </label>
                                                        </td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td> Lorem..</td>
                                                        <td>Lorem text..</td>
                                                        <td>Feb 7</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li>
                                            <table class="table mail-list">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input mail-state" value="agree">
                                                                <span class="custom-control-indicator custom_checkbox_primary"></span>
                                                            </label>
                                                        </td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td> Lorem..</td>
                                                        <td>Lorem text..</td>
                                                        <td>Feb 7</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                    </ul>
                                </b-card>
                            </b-tab>
                        </b-tabs>
                    </b-card>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card contact-widget">
                        <div class="contact-cover">
                            <div class="profile-img float-left">
                                <img src="../assets/img/authors/avatar2.jpg" alt="">
                                <span class="follow">
                    <button class="btn btn-info text-white" >Follow</button>
                  </span>
                                <br>
                                <h5 class="name_center">Kerry Jay</h5>
                            </div>
                            <div class="group-icon float-left text-center">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="search-icon float-left text-center">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="card-block contact-details">
                            <div class="ml-3 mt-2">
                                <h5 class="name_font">Home <i class="fa fa-pencil float-right mr-4" aria-hidden="true"></i></h5>
                                <a href="javascript:void(0)" class="number_font">(680)-159-1300</a>
                            </div>
                            <div class="ml-3 mt-2">
                                <h5 class="name_font">Work <i class="fa fa-pencil float-right mr-4" aria-hidden="true"></i></h5>
                                <a href="javascript:void(0)" class="number_font">(942)-748-9794</a>
                            </div>
                            <div class="mt-3 ml-3 mb-4">
                                <h5 class="name_font">Email <i class="fa fa-pencil float-right mr-4" aria-hidden="true"></i></h5>
                                <a href="javascript:void(0)" class="number_font">example@emailid.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="card weather-widget">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="location text-center">
                                                <i class="fa fa-cloud" aria-hidden="true"></i>
                                                <br><span>Los Angeles</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="temperature text-center">14°c</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-4 text-center details">
                                            <h4 class="name_font">Precip.</h4>
                                            <span>0.01%</span>
                                        </div>
                                        <div class="col-5 text-center details">
                                            <h4 class="name_font">Humidity</h4>
                                            <span>89%</span>
                                        </div>
                                        <div class="col-3 text-center details">
                                            <h4 class="name_font">Wind</h4>
                                            <span>0.1km/h</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card profile-2 text-center">
                                <div class="row m-0">
                                    <div class="col-12 p-0">
                                        <div class="head bg_color">
                                            <p>Christine Fox</p>
                                        </div>
                                    </div>
                                    <div class="col-6 p-0 data border-right">
                                        <span><strong>1,028</strong></span>
                                        <p class="border-bottom">Friends</p>
                                    </div>
                                    <div class="col-6 p-0 data arrow">
                                        <span><strong>6k</strong></span>
                                        <p class="border-bottom">Followers</p>
                                    </div>
                                    <div class="col-6 p-0 data border-right">
                                        <span><strong>16</strong></span>
                                        <p>Messages</p>
                                    </div>
                                    <div class="col-6 p-0 data">
                                        <span><strong>27</strong></span>
                                        <p>Notifications</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card tweet-profile">
                        <div class="card-header text-center">
                            <h4>Jerry Roy</h4>
                            <p>jerry.roy9@example.com</p>
                        </div>
                        <span class="profile-img text-center">
                            <img src="../assets/img/authors/avatar4.jpg" alt="profile image" class="img-fluid">
                          </span>
                        <div class="card-block">
                            <div class="tweet-details">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <p class="count">670</p>
                                        <p>Tweets</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="count">240</p>
                                        <p>Following</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="count">6,870</p>
                                        <p>Followers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea rows="3" placeholder="What's in your mind" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="events text-center">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="events text-center">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0)" class="btn btn-info btn-block btn-tweet text-white m-t-10">Tweet</a>
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
import 'echarts/lib/chart/line';
import 'echarts/lib/component/tooltip';
// ====
import portfolio from "./widgets/portfolio/portfolio.vue"
var unsub;
export default {
    name: "widgets",
    components: {
        IEcharts,
        portfolio
    },
    data() {
        return {
            loading: false,
            instances: [],
            line: {
                title: {
                    text: 'Weekly Stats',
                    textStyle: {
                        color: '#FFF',
                        fontStyle: 'normal',
                        fontWeight: 'bolder',
                        fontSize: 18,
                    },
                    subtextStyle: {
                        color: '#FFF'
                    },
                    padding: 15,
                },
                legend: {
                    show: true,
                },
                tooltip: {},
                color: '#FFFFFF',
                xAxis: {
                    axisLine: {
                        lineStyle: {
                            color: '#fff',
                        },
                    },
                    data: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
                },
                yAxis: {
                    axisLine: {
                        lineStyle: {
                            color: '#fff',
                        }
                    },
                    axisTick: {
                        show: true,
                        alignWithLabel: false,
                        interval: 'auto',
                        inside: false,
                        length: 5,
                        lineStyle: {
                            color: '#fff',
                        }
                    }
                },
                series: [{
                    name: 'shots',
                    type: 'line',
                    symbolSize: 7,
                    data: [10, 20, 15, 10, 36, 20, 45]
                }]
            }
        }
    },
    methods: {
        onReady(instance) {
            this.instances.push(instance)
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
            }
        });
    },
    beforeRouteLeave (to, from, next) {
        unsub();
        next();
    },
}
</script>
<style src="../assets/css/widgets.css" scoped></style>
