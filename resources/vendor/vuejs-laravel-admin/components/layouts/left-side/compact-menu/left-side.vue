<template>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-aside sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">
                <div class="nav_profile">
                    <div class="media profile-left">
                        <a class="float-left profile-thumb" href="javascript:void(0)">
                            <img :src="this.$store.state.user.picture" class="rounded-circle" alt="User Image">
                        </a>
                    </div>
                </div>
                <ul class="navigation">
                    <vmenu accordion>
                        <vsub-menu name="Dashboard" icon="icon-home" class=" text-center .icon-home">
                            <vmenu-item link="/" icon="fa fa-angle-double-right" class="text-left">Dashboard 1 </vmenu-item>
                            <vmenu-item link="/index2" icon="fa fa-angle-double-right" class="text-left">Dashboard 2</vmenu-item>
                        </vsub-menu>

                        <vsub-menu name="Ecommerce" title="E-Commerce" icon="icon-handbag" class=" text-center ">
                            <vmenu-item link="/e_dashboard"  icon="fa fa-angle-double-right" class="text-left">E Dashboard</vmenu-item>
                            <vmenu-item link="/cart_details"  icon="fa fa-angle-double-right" class="text-left">Cart details</vmenu-item>
                            <vmenu-item link="/product_details"  icon="fa fa-angle-double-right" class="text-left">Product Details</vmenu-item>
                            <vmenu-item link="/product_edit"  icon="fa fa-angle-double-right" class="text-left">Product Edit</vmenu-item>
                            <vmenu-item link="/product_gallery" icon="fa fa-angle-double-right" class="text-left">Product Gallery</vmenu-item>
                        </vsub-menu>
                        <vsub-menu name="Forms" icon="icon-note" class="text-center ">
                            <vmenu-item link="/form_elements" icon="fa fa-angle-double-right" class="text-left">Form elements</vmenu-item>
                            <vmenu-item link="/form_validations" icon="fa fa-angle-double-right" class="text-left">Form validations</vmenu-item>
                            <vmenu-item link="/form_editors" icon="fa fa-angle-double-right" class="text-left">Form editors</vmenu-item>
                            <vmenu-item link="/dropdowns" icon="fa fa-angle-double-right" class="text-left">Drop downs</vmenu-item>
                            <vmenu-item link="/radios_checkboxes" icon="fa fa-angle-double-right" class="text-left">Radio & Checkbox</vmenu-item>
                        </vsub-menu>

                        <vmenu-item link="/typography" icon="icon-drawer" class="typography_text text-center">Typography</vmenu-item>
                            <vmenu-item link="/api" icon="icon-book-open" class=" text-center">API</vmenu-item>

                        <vsub-menu name="Components" icon="icon-speedometer" class=" text-center ">
                            <vmenu-item link="/ui_elements" icon="fa fa-angle-double-right" class="text-left">UI Elements</vmenu-item>
                            <vmenu-item link="/cards" icon="fa fa-angle-double-right" class="text-left">Cards</vmenu-item>
                            <vmenu-item link="/buttons" icon="fa fa-angle-double-right" class="text-left">Buttons</vmenu-item>
                            <vmenu-item link="/modals" icon="fa fa-angle-double-right" class="text-left">Modals</vmenu-item>
                            <vmenu-item link="/vscroll" icon="fa fa-angle-double-right" class="text-left">Vscroll</vmenu-item>
                            <vmenu-item link="/vue-datepicker" icon="fa fa-angle-double-right" class="text-left">Vue Datepickers</vmenu-item>
                            <vmenu-item link="/vue-slider" icon="fa fa-angle-double-right" class="text-left">Vue Slider</vmenu-item>
                            <vmenu-item link="/notifications" icon="fa fa-angle-double-right" class="text-left">Notifications</vmenu-item>
                            <vmenu-item link="/timeline" icon="fa fa-angle-double-right" class="text-left">Timeline</vmenu-item>
                            <vmenu-item link="/transitions" icon="fa fa-angle-double-right" class="text-left">Transitions</vmenu-item>
                        </vsub-menu>
                        <vmenu-item link="/widgets" icon="icon-grid" class="text-center">Widgets</vmenu-item>
                        <vmenu-item link="/calendar" icon="icon-calendar" class=" text-center">Calender</vmenu-item>
                        <vsub-menu name="Charts" icon="icon-pie-chart" class="text-center ">
                            <vmenu-item link="/chartist" icon="fa fa-angle-double-right" class="text-left ">Chartist Charts</vmenu-item>
                            <vmenu>
                                <vmenu-item link="/e_linecharts" icon="fa fa-angle-double-right" class="text-left">ECharts - Line</vmenu-item>
                                <vmenu-item link="/e_barcharts" icon="fa fa-angle-double-right" class="text-left">ECharts - Bar</vmenu-item>
                                <vmenu-item link="/e_piecharts" icon="fa fa-angle-double-right" class="text-left">ECharts - Pie</vmenu-item>
                            </vmenu>
                        </vsub-menu>
                        <vsub-menu name="Tables" icon="icon-organization" class="text-center ">
                            <vmenu-item link="/simple_tables" icon="fa fa-angle-double-right" class="text-left">Simple tables</vmenu-item>
                            <vmenu-item link="/advanced_tables" icon="fa fa-angle-double-right" class="text-left">Advanced tables</vmenu-item>
                        </vsub-menu>
                        <vsub-menu name="Gallery" icon="icon-folder" class="text-center">
                            <vmenu-item link="/gallery" icon="fa fa-angle-double-right" class="text-left">Gallery</vmenu-item>
                            <vmenu-item link="/gmaps" icon="fa fa-angle-double-right" class="text-left">Maps</vmenu-item>
                            <vmenu-item link="/multi_file_upload" icon="fa fa-angle-double-right" class="text-left">
                                Multi file upload
                            </vmenu-item>
                        </vsub-menu>
                        <vsub-menu name="UserGroup" icon="icon-people" class="text-center">
                            <vmenu-item link="/user_profile" icon="fa fa-angle-double-right" class="text-left">User Profile</vmenu-item>
                            <vmenu-item link="/add_user" icon="fa fa-angle-double-right" class="text-left">Add New User</vmenu-item>
                            <vmenu-item link="/users_list" icon="fa fa-angle-double-right" class="text-left">Users List</vmenu-item>
                        </vsub-menu>
                        <vsub-menu name="Profile Login" icon="icon-grid" class=" text-center">
                            <vmenu-item link="/login" icon="fa fa-angle-double-right" class="text-left">Login</vmenu-item>
                            <vmenu-item link="/register" icon="fa fa-angle-double-right" class="text-left">Register</vmenu-item>
                            <vmenu-item link="/forgotpassword" icon="fa fa-angle-double-right" class="text-left">Forgot Password</vmenu-item>
                            <vmenu-item link="/reset_password" icon="fa fa-angle-double-right" class="text-left">Reset Password</vmenu-item>
                            <vmenu-item link="/lockscreen" icon="fa fa-angle-double-right" class="text-left">Lockscreen</vmenu-item>
                        </vsub-menu>
                        <vsub-menu name="Pages" icon="icon-layers" class=" text-center">
                            <vmenu-item link="/blank" icon="fa fa-angle-double-right" class="text-left">Blank</vmenu-item>
                            <vmenu-item link="/invoice" icon="fa fa-angle-double-right" class="text-left">Invoice</vmenu-item>
                            <vmenu-item link="/pricing" icon="fa fa-angle-double-right" class="text-left">Pricing</vmenu-item>
                            <vmenu-item link="/contact_us" icon="fa fa-angle-double-right" class="text-left">Contact us</vmenu-item>
                            <vmenu-item link="/404" icon="fa fa-angle-double-right" class="text-left">404 Error</vmenu-item>
                            <vmenu-item link="/500" icon="fa fa-angle-double-right" class="text-left">500 Error</vmenu-item>
                        </vsub-menu>
                        <vmenu-item link="/user_profile" icon="icon-user text-mint" class="  text-center">Profile
                        </vmenu-item>
                        <vmenu-item link="/contact_us" icon="icon-phone" class="  text-center">Contact</vmenu-item>
                        <vmenu-item link="/lockscreen" icon="icon-lock" class="  text-center">
                            Screen
                        </vmenu-item>
                        <vmenu-item link="/login" icon="icon-login" class=" text-center">Logout</vmenu-item>
                    </vmenu>
                </ul>
                <!-- / .navigation -->
                <!--<vmenu>-->
                    <!---->
                <!--</vmenu>-->
            </div>
            <!-- menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
</template>
<script>
import {
    vmenu,
    vmenuItem,
    vsubMenu
} from './menu'
export default {
    name: "left-side",
    components: {
        vmenu,
        vsubMenu,
        vmenuItem
    }
}
</script>
<style scoped lang="scss">
    @import "../../css/customvariables";
.left-aside {
    width: 100px;
    background-repeat: repeat-y;
    background-color: $leftmenu_color;
}

.navigation {
    background: #fff ;
    padding: 0;
    margin-bottom: 0;
}

/* left side profile css */

.nav_profile {
    .profile-left {
        padding: 7px 11px;
        min-height: 85px;
        background: #fff;
    }
    .profile-left {
        .profile-thumb {
            border-radius: 50px;
            display: inline-block;
            padding-top: 8px;
            padding-left: 5px;
        }
        .media-heading {
            line-height: 20px;
            margin-top: 12px;
            font-weight: 600;
            font-size: 15px;
            color: #FFF;
        }
        .profile-thumb img {
            width: 54px;
            margin-left:7px;
        }
    }
}


/*side bar nav */

.sidebar {
    display: block;
    width: 100px;
}

.content {
    display: block;
    width: auto;
    overflow-x: hidden;
    padding: 0 15px;
}

.badge {
    padding: 3px 7px;
    font-size: 12px;
}

.left_calbadge {
    position: absolute;
    top: 13px;
    right:10px;
}
.badge{
    padding: 0.40em 0.55em;
    border-radius: 1rem;
    font-size: 11px;
}
    .api_icon{
        display: block !important;
        text-align: center !important;
        padding-left: 22px !important;
    }



</style>
