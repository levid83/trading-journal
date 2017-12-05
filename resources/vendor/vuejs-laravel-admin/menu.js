const menu_items = [{
    name: 'Dashboard',
    link: '/',
    icon: ' icon-home'
}, {
    name: 'Dashboard2',
    link: '/index2',
    icon: 'icon-screen-desktop'
}, {
    name: 'E-Commerce',
    icon: 'icon-handbag',
    child:[
        {
            name:'E Dashboard',
            link:'/e_dashboard',
            icon:'fa fa-angle-double-right'
        }, {
            name:'Cart Details',
            link:'/cart_details',
            icon:'fa fa-angle-double-right'
        }, {
            name:'Product details',
            link:'/product_details',
            icon:'fa fa-angle-double-right'
        },{
            name:'Product Edit ',
            link:'/product_edit',
            icon:'fa fa-angle-double-right'
        },{
            name:'Product gallery ',
            link:'/product_gallery',
            icon:'fa fa-angle-double-right'
        }]
},{
    name: 'Forms',
    icon: 'icon-note',
    child: [{
        name: 'Form elements',
        link: '/form_elements',
        icon:'fa fa-angle-double-right'
    }, {
        name: 'Form validations',
        link: '/form_validations',
        icon:'fa fa-angle-double-right'
    }, {
        name: 'Form editors',
        link: '/form_editors',
        icon:'fa fa-angle-double-right'
    }, {
        name: 'Dropdowns',
        link: '/dropdowns',
        icon:'fa fa-angle-double-right'
    }, {
        name: 'Radio & Checkbox',
        link: '/radios_checkboxes',
        icon:'fa fa-angle-double-right'
    }]
}, {
    name: 'Typography',
    link: '/typography',
    icon: 'icon-drawer'
}, {
    name: 'API',
    link: '/api',
    icon: 'icon-book-open'
},
    {
        name: 'UI Components',
        title: ""
    }, {
        name: 'Components',
        icon: 'icon-speedometer',
        child: [{
            name: 'UI elements',
            link: '/ui_elements',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Cards',
            link: '/cards',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Buttons',
            link: '/buttons',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Vscroll',
            link: '/vscroll',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Modals',
            link: '/modals',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Vue-Datepicker',
            link: '/vue-datepicker',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Vue slider',
            link: '/vue-slider',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Notifications',
            link: '/notifications',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Timeline',
            link: '/timeline',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Transitions',
            link: '/transitions',
            icon:'fa fa-angle-double-right'
        }]
    }, {
        name: ' Widgets',
        link: '/widgets',
        icon: 'icon-grid'
    }, {
        name: 'Calendar', // <span class="badge-success badge pull-right">{{this.$store.state.cal_events.length}}</span>
        link: '/calendar',
        icon: 'icon-calendar'
    }, {
        name: 'Charts',
        title: ""
    }, {
        name: ' Charts',
        icon: 'icon-pie-chart',
        child: [{
            name: 'Chartist charts',
            link: '/chartist',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Echarts - Line',
            link: '/e_linecharts',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Echarts - Bar',
            link: '/e_barcharts',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Echarts - Pie',
            link: '/e_piecharts',
            icon:'fa fa-angle-double-right'
        }]
    }, {
        name: 'Tables',
        icon: 'icon-organization',
        child: [{
            name: 'Simple tables',
            link: '/simple_tables',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Advanced tables',
            link: '/advanced_tables',
            icon:'fa fa-angle-double-right'
        }]
    }, {
        name: 'Files & Gallery',
        title: ""
    }, {
        name: "Files",
        icon: "fa fa-file-o",
        child: [{
            name: 'Multi file upload',
            link: '/multi_file_upload',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Vue dropzone',
            link: '/vue_dropzone',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Gallery',
            link: '/gallery',
            icon:'fa fa-angle-double-right'
        }]
    }, {
        name: 'Maps',
        link: '/gmaps',
        icon: 'icon-location-pin'
    }, {
        name: "Users",
        icon: "icon-people",
        child: [{
            name: 'User profile',
            link: '/user_profile',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Add new user',
            link: '/add_user',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Users list',
            link: '/users_list',
            icon:'fa fa-angle-double-right'
        }]
    }, {
        name: 'Pages',
        title: ""
    }, {
        name: "Pages",
        icon: "icon-layers",
        child: [{
            name: 'Login',
            link: '/login',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Register',
            link: '/register',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Forgot password',
            link: '/forgotpassword',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Reset password',
            link: '/reset_password',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Lockscreen',
            link: '/lockscreen',
            icon:'fa fa-angle-double-right'
        }]
    }, {
        name: "Extra Pages",
        icon: "fa fa-files-o",
        child: [{
            name: 'Blank',
            link: '/blank',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Invoice',
            link: '/invoice',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Contact us',
            link: '/contact_us',
            icon:'fa fa-angle-double-right'
        }, {
            name: 'Pricing',
            link: '/pricing',
            icon:'fa fa-angle-double-right'
        }, {
            name: '404',
            link: '/404',
            icon:'fa fa-angle-double-right'
        }, {
            name: '500',
            link: '/500',
            icon:'fa fa-angle-double-right'
        }]
    }];
export default menu_items;
