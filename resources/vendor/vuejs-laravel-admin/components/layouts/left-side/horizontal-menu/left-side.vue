<template>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-aside sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">
                <vmenu>
                    <vsub-menu title="Dashboards" icon="icon-home">
                        <vmenu-item link="/" icon="fa fa-angle-double-right"><span class="txt_dash">Dashboard 1</span></vmenu-item>
                        <vmenu-item link="/index2" icon="fa fa-angle-double-right icon_layout">Dashboard 2</vmenu-item>
                    </vsub-menu>


                    <vsub-menu title="E-Commerce" icon="icon-handbag">
                        <vmenu-item link="/e_dashboard"  icon="fa fa-angle-double-right">E Dashboard</vmenu-item>
                        <vmenu-item link="/cart_details"  icon="fa fa-angle-double-right">Cart Details</vmenu-item>
                        <vmenu-item link="/product_details"  icon="fa fa-angle-double-right">Product Details</vmenu-item>
                        <vmenu-item link="/product_edit"  icon="fa fa-angle-double-right">Product Edit</vmenu-item>
                        <vmenu-item link="/product_gallery" icon="fa fa-angle-double-right">Product Gallery</vmenu-item>
                    </vsub-menu>

                    <vsub-menu title="Forms" icon="icon-note icon_pencil">
                        <vmenu-item link="/form_elements"  icon="fa fa-angle-double-right">Form elements</vmenu-item>
                        <vmenu-item link="/form_validations"  icon="fa fa-angle-double-right">Form validations</vmenu-item>
                        <vmenu-item link="/form_editors"  icon="fa fa-angle-double-right">Form editors</vmenu-item>
                        <vmenu-item link="/dropdowns"  icon="fa fa-angle-double-right">Dropdowns</vmenu-item>
                        <vmenu-item link="/typography"  icon="fa fa-angle-double-right">Radio&Checkboxes</vmenu-item>
                    </vsub-menu>


                    <vsub-menu title="Components" icon="icon-speedometer icon_world">

                        <vmenu-item link="/ui_elements"  icon="fa fa-angle-double-right">UI elements</vmenu-item>
                        <vmenu-item link="/cards"  icon="fa fa-angle-double-right">Cards</vmenu-item>
                        <vmenu-item link="/buttons"  icon="fa fa-angle-double-right">Buttons</vmenu-item>
                        <vmenu-item link="/vscroll"  icon="fa fa-angle-double-right">Vscroll</vmenu-item>
                        <vmenu-item link="/modals"  icon="fa fa-angle-double-right">Modals</vmenu-item>
                        <vmenu-item link="/vue-datepicker"  icon="fa fa-angle-double-right">Vue-Datepicker</vmenu-item>
                        <vmenu-item link="/vue-slider"  icon="fa fa-angle-double-right">Vue slider</vmenu-item>
                        <vmenu-item link="/notifications"  icon="fa fa-angle-double-right">Notifications</vmenu-item>
                        <vmenu-item link="/timeline"  icon="fa fa-angle-double-right">Timeline</vmenu-item>
                        <vmenu-item link="/transitions"  icon="fa fa-angle-double-right">Transitions</vmenu-item>
                    </vsub-menu>

                    <vsub-menu title="App" icon="fa fa-clone">
                        <vmenu-item link="/typography" icon="fa fa-angle-double-right">Typography</vmenu-item>
                        <vmenu-item link="/api" icon="fa fa-angle-double-right">API</vmenu-item>
                        <vmenu-item link="/calendar" icon="fa fa-angle-double-right">Calendar</vmenu-item>
                        <vmenu-item link="/widgets" icon="fa fa-angle-double-right">Widgets</vmenu-item>

                    </vsub-menu>


                    <vsub-menu title="Charts" icon="icon-pie-chart icon_chart">
                        <vmenu-item link="/chartist"  icon="fa fa-angle-double-right">Chartist charts</vmenu-item>
                        <vmenu-item link="/e_linecharts"  icon="fa fa-angle-double-right">Echarts - Line</vmenu-item>
                        <vmenu-item link="/e_barcharts"  icon="fa fa-angle-double-right">Echarts - Bar</vmenu-item>
                        <vmenu-item link="/e_piecharts"  icon="fa fa-angle-double-right">Echarts - Pie</vmenu-item>
                    </vsub-menu>
                    <vsub-menu title="Tables" icon="icon-organization icon_table">
                        <vmenu-item link="/simple_tables"  icon="fa fa-angle-double-right">Simple tables</vmenu-item>
                        <vmenu-item link="/advanced_tables"  icon="fa fa-angle-double-right">Advanced tables</vmenu-item>
                    </vsub-menu>
                    <vsub-menu title="Files" icon="fa fa-file-o icon_file">
                        <vmenu-item link="/multi_file_upload"  icon="fa fa-angle-double-right">Multi file upload</vmenu-item>
                        <vmenu-item link="/vue_dropzone"  icon="fa fa-angle-double-right">Vue dropzone</vmenu-item>
                        <vmenu-item link="/gallery" icon="fa fa-angle-double-right">Gallery</vmenu-item>
                    </vsub-menu>
                    <vsub-menu title="Users" icon="icon-people icon_user">
                        <vmenu-item link="/user_profile" icon="fa fa-angle-double-right">User profile</vmenu-item>
                        <vmenu-item link="/add_user" icon="fa fa-angle-double-right">Add new user</vmenu-item>
                        <vmenu-item link="/users_list" icon="fa fa-angle-double-right">Users list</vmenu-item>
                    </vsub-menu>
                    <vsub-menu title="Pages" icon="icon-layers icon_pages">
                        <vmenu-item link="/login" icon="fa fa-angle-double-right">Login</vmenu-item>
                        <vmenu-item link="/register" icon="fa fa-angle-double-right">Register</vmenu-item>
                        <vmenu-item link="/forgotpassword" icon="fa fa-angle-double-right">Forgot password</vmenu-item>
                        <vmenu-item link="/reset_password" icon="fa fa-angle-double-right">Reset password</vmenu-item>
                        <vmenu-item link="/lockscreen" icon="fa fa-angle-double-right">Lockscreen</vmenu-item>

                    </vsub-menu>
                    <vsub-menu title="Extra Pages" icon="fa fa-files-o icon_extrapage">
                        <vmenu-item link="/blank" icon="fa fa-angle-double-right">Blank</vmenu-item>
                        <vmenu-item link="/invoice" icon="fa fa-angle-double-right">Invoice</vmenu-item>
                        <vmenu-item link="/invoice_page" icon="fa fa-angle-double-right">Invoice_page</vmenu-item>
                        <vmenu-item link="/contact_us" icon="fa fa-angle-double-right">Contact us</vmenu-item>
                        <vmenu-item link="/pricing" icon="fa fa-angle-double-right">pricing</vmenu-item>
                        <vmenu-item link="/404" icon="fa fa-angle-double-right">404</vmenu-item>
                        <vmenu-item link="/500" icon="fa fa-angle-double-right">500</vmenu-item>
                    </vsub-menu>
                </vmenu>
                <!-- / .navigation -->
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
} from './menu';
require("./menu/tidy-menu.css");
export default {
    name: "left-side",
    components: {
        vmenu,
        vsubMenu,
        vmenuItem
    },
    data() {
        return {

        }
    },
    mounted() {
        require("./menu/tidy-menu.js")
    }
}
</script>
<style src="./css/default.scss" lang="scss"></style>
<style scoped lang="scss">
@import "../../css/customvariables";
.left-aside {
    background: $leftmenu_color;
    background-repeat: repeat-y;
}

.navigation {
    padding: 0;
}


/*side bar nav */

.sidebar {
    display: block;
}

.content {
    display: block;
    width: auto;
    overflow-x: hidden;
    padding: 0 15px;
}
</style>
