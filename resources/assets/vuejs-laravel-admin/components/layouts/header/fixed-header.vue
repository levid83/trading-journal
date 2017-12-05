<template>
    <header class="header fixed-top">
        <nav>
            <router-link to="/" class="logo"><img src="../../../assets/img/logo_black.png" alt="logo" /></router-link>
            <!-- Sidebar toggle button-->
            <div class="float-left">
                <a href="javascript:void(0)" class="sidebar-toggle" @click="toggle_menu"> <i class="icon-menu"></i>
                </a>
            </div>
            <div class="navbar-right">

                <!--drop downs-->
                <div>
                    <div class="dropdown hidden-xs-down btn-group fullscreen" v-if="fullscreen">
                        <a href="javascript:void(0)" @click="fullscreen">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                    </div>
                    <b-dropdown class="notifications-menu bell_bg" right link>
                        <span slot="text">
                            <i class="icon-bell noti-icon"></i>
                        <div class="notifications_badge_top">
                                <span class="badge badge-danger">4
                                </span>
                </div>
                </span>
                <b-dropdown-item class="dropdownheader socio-tabs1" exact>
                    <b-tabs>
                        <b-tab title="Notifications" class="tabs_cont" active>
                            <b-dropdown-item exact>
                                <div class="row">
                                    <div class="col-2 mt-2 ml-2">
                                        <img class="rounded-circle" src="../../../assets/img/authors/avatar1.jpg"></div>
                                    <div class="col-9 mt-2">
                                        <p> &nbsp;Lorem ipsum dolor sit amet, elit.
                                            <br>
                                            <small class="ml-1 text-info">Today </small>
                                        </p>
                                    </div>
                                </div>
                            </b-dropdown-item>
                            <b-dropdown-item exact>
                                <div class="row">
                                    <div class="col-2 mt-2 ml-2"><img class="rounded-circle" src="../../../assets/img/authors/avatar5.jpg"></div>
                                    <div class="col-9 mt-2">
                                        <p> &nbsp;Lorem ipsum dolor sit amet, elit.
                                            <br>
                                            <small class="ml-1 text-muted">week ago</small>
                                        </p>
                                    </div>
                                </div>
                            </b-dropdown-item>
                            <b-dropdown-item exact>
                                <div class="row">
                                    <div class="col-2 mt-2 ml-2"><img class="rounded-circle" src="../../../assets/img/authors/avatar3.jpg"></div>
                                    <div class="col-9 mt-2">
                                        <p> &nbsp;Lorem ipsum dolor sit amet, elit.
                                            <br>
                                            <small class="ml-1 text-muted">month ago</small>
                                        </p>
                                    </div>
                                </div>
                            </b-dropdown-item>
                            <b-dropdown-item exact class="mt-2 notifications_data">
                                <div class="row">
                                    <div class="col-2 mt-2 ml-2"><img class="rounded-circle" src="../../../assets/img/authors/avatar3.jpg"></div>
                                    <div class="col-9 mt-2">
                                        <p> &nbsp;Lorem ipsum dolor sit amet, elit.
                                            <br>
                                            <small class="ml-1 text-muted">2 months ago</small>
                                        </p>
                                    </div>
                                </div>
                            </b-dropdown-item>
                            <b-dropdown-item class="dropdown-footer " exact>
                                <div>
                                    <strong>View all</strong>
                                </div>
                            </b-dropdown-item>
                        </b-tab>
                        <b-tab title="Events" class="event_date">
                            <b-dropdown-item exact class="mb-2 notifications_data">
                                <div class="noti_item">
                                    <div class="row">
                                        <div class="col-2   ml-3">
                                            <i class="fa fa-calendar text-info noti_msg"></i>
                                        </div>
                                        <div class="col-9 mt-1">
                                            <span>New Lorem Event from john.</span>
                                            <br>
                                            <span class="text-muted">Apr 29th 2017</span>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                            </b-dropdown-item>
                            <b-dropdown-item exact class="mb-2 notifications_data">
                                <div class="row">
                                    <div class="col-2 ml-3">
                                        <i class="fa fa-calendar text-info noti_msg"></i>
                                    </div>
                                    <div class="col-9 mt-1">
                                        <span>New Lorem Event from john.</span>
                                        <br>
                                        <span class="text-muted">Apr 29th 2017</span>
                                    </div>
                                </div>
                                <hr/>
                            </b-dropdown-item>
                            <b-dropdown-item exact class="mb-2 notifications_data">
                                <div class="row">
                                    <div class="col-2 ml-3 mb-2">
                                        <i class="fa fa-calendar text-info noti_msg"></i>
                                    </div>
                                    <div class="col-9 mt-1">
                                        <span>New Lorem Event from john.</span>
                                        <br>
                                        <span class="text-muted">Apr 29th 2017</span>
                                    </div>
                                </div>
                            </b-dropdown-item>
                            <b-dropdown-item class="dropdown-footer">
                                <div>
                                    <strong>View all</strong>
                                </div>
                            </b-dropdown-item>
                        </b-tab>
                        <b-tab title="Updates" disabled>
                        </b-tab>
                    </b-tabs>
                </b-dropdown-item>
                </b-dropdown>
                <!-- User Account: style can be found in dropdown-->
                <b-dropdown class="user user-menu bell_bg" right link>
                    <span slot="text"><img :src="this.$store.state.user.picture" class="rounded-circle" alt="User Image">
                            <!-- User name-->
                            <p class="user_name_max">{{this.$store.state.user.name}}</p></span>
                    <b-dropdown-item exact class="dropdown_content">
                        <router-link to="/user_profile" exact class="drpodowtext">
                            <i class="fa fa-user-o"></i> Profile
                        </router-link>
                    </b-dropdown-item>
                    <b-dropdown-item exact class="dropdown_content">
                        <router-link to="/edit_user" exact class="drpodowtext">
                            <i class="fa fa-cog"></i> Settings
                        </router-link>
                    </b-dropdown-item>
                    <b-dropdown-item exact class="dropdown_content">
                        <router-link to="/lockscreen" exact class="drpodowtext">
                            <i class="fa fa-lock"></i> Lock
                        </router-link>
                    </b-dropdown-item>
                    <b-dropdown-item exact class="dropdown_content">
                        <router-link to="/login" exact class="drpodowtext">
                            <i class="fa fa-sign-out"></i> Logout
                        </router-link>
                    </b-dropdown-item>
                </b-dropdown>
            </div>
            </div>
        </nav>
    </header>
</template>
<script>
import screenfull from "screenfull"
export default {
    name: "vueadmin_header",

    methods: {
        toggle_menu() {
            this.$store.commit('left_menu', "toggle");
        },
        fullscreen() {
            if (screenfull.enabled) {
                screenfull.toggle();
            }
        }

    }
}
</script>
<style lang="scss" scoped>
@import "../css/_customvariables";
.header {
    z-index: 1030;
    nav {
        margin-bottom: 0;
        height: 50px;
        background: $header_color;
        background-size:100% 100%;
        box-shadow: 0px 0px 10px #ccc;
    }
    .navbar-right {
        float: right;
        margin-right: 15px;
    }
    .logo {
        display: block;
        float: left;
        height: 50px;
        line-height: 41px;
        padding: 3px 10px;
        text-align: center;
        width: 250px;
        background:$header_color;
        img {
            width: 125px;
        }
    }
    .navbar-right {
        .dropdown-item {
            padding: 0;
            width: 100%;
            outline: none;
        }
        div.dropdown {
            >a {
                color:$zoom_color;
            }
            .dropdown-menu > button {
                padding: 10px 15px;
            }
            &.notifications-menu {
                height: 50px;
                .noti-icon {
                    font-size: 18px;
                }
            }
            > a >i {
                font-size: 23px;
            }
            > a {
                display: block;
                padding: 12px;
            }
            &:hover>a {
                background-color:#ededed;
                color:#000;
            }
            > a.padding-user {
                padding-top: 8px;
                padding-bottom: 6px;
            }
        }
    }
    nav .sidebar-toggle {
        float: left;
        color:$toggle_color;
        font-size: 19px;
        padding-top: 10px;
    }
}

.user_name_max {
    display: inline-block;
    max-width: 180px;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
    margin: 0 0 -4px;
}

.noti_msg {
    font-size: 16px;
    padding: 10px;
    border: 1px solid #4f90c1;
    border-radius: 50px;
    margin-top: 10px;
}

.user.user-menu > button img {
    width: 35px;
    height: 35px;
}


/**** END HEADER RIGHT SIDE DROPDOWNS ****/
@media screen and (max-width: 767px) {
    .dropdown.open .dropdown-menu {
        position: absolute;
    }
    .navbar-right > li > a {
        padding: 10px 12px;
    }
}

/* Fix menu positions on xs screens to appear correctly and fully */

@media (max-width: 560px) {
    body .header .logo,
    body .header nav {
        width: 100%;
    }
    body .header nav .sidebar-toggle {
        padding-left: 15px;
    }
    nav {
        height: 100px !important;
    }
}

.notifications_badge_top {
    margin-top: -28px;
    margin-left: 10px;
    position: absolute;
    span {
        top: 1px;
        left: 2px;
        border-radius: 50%;
    }
}

.notifications-menu .dropdown-item {
    width: 100%;
    display: block;
}

.dropdown-footer {
    padding: 10px !important;
}
</style>
<style type="text/css" lang="scss">
@import "../css/_customvariables";
.wrapper {
    margin-top: 50px;
    @media screen and (max-width: 560px) {
        margin-top: 100px;
    }
}
    .sidebar-toggle{
        margin-left: 10px;
    }
    .bell_bg{
        button.btn-secondary{
            background-color: $bell-color;
            border: none;
            border-radius: 0;
            box-shadow: none !important;
            &:hover{
                background-color:#ededed !important
            }
            &:active{
                color: $toggle_color !important;
            }
        }
        //.btn-secondary:active
        &.show button{
            background-color: $bell-active !important
        }
    }
    .tabs_cont , .event_date{
        background-color: #fff !important;
    }
</style>
