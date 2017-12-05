const routes = [{
    path: '/',
    component: resolve => require(['./layout.vue'], resolve),
    children: [{
            path: '/',
            component: resolve => require(['./components/index.vue'], resolve),
            meta: {
                title: "Dashboard",
            }
        }, {
            path: '/index2',
            component: resolve => require(['./components/index2.vue'], resolve),
            meta: {
                title: "Dashboard2",
            }
        }, {
            path: '/product_details',
            component: resolve => require(['./components/e-commerce/product_details.vue'], resolve),
            meta: {
                title: "Product details",
            }
        }, {
            path: '/product_edit',
            component: resolve => require(['./components/e-commerce/product_edit.vue'], resolve),
            meta: {
                title: "Product Edit",
            }
        },
        {
            path: '/e_dashboard',
            component: resolve => require(['./components/e-commerce/e_dashboard.vue'], resolve),
            meta: {
                title: "E dashboard",
            }
        },
        {
            path: '/cart_details',
            component: resolve => require(['./components/e-commerce/cart_details.vue'], resolve),
            meta: {
                title: "Cart Details",
            }
        },
        {
            path: '/product_gallery',
            component: resolve => require(['./components/e-commerce/product_gallery.vue'], resolve),
            meta: {
                title: "Product gallery",
            }
        },
        {
            path: 'form_elements',
            component: resolve => require(['./components/form_elements.vue'], resolve),
            meta: {
                title: "Form Elements",
            }
        }, {
            path: 'form_validations',
            component: resolve => require(['./components/form_validations.vue'], resolve),
            meta: {
                title: " Form Validations",
            }
        }, {
            path: 'dropdowns',
            component: resolve => require(['./components/dropdowns.vue'], resolve),
            meta: {
                title: " Dropdowns",
            }
        }, {
            path: 'cards',
            component: resolve => require(['./components/card.vue'], resolve),
            meta: {
                title: " Cards",
            }
        }, {
            path: 'buttons',
            component: resolve => require(['./components/buttons.vue'], resolve),
            meta: {
                title: "Buttons",
            }
        }, {
            path: 'radios_checkboxes',
            component: resolve => require(['./components/radios_checkboxes.vue'], resolve),
            meta: {
                title: " Radios & Checkboxes",
            }
        }, {
            path: 'vue-datepicker',
            component: resolve => require(['./components/vue-datepicker.vue'], resolve),
            meta: {
                title: " Datepickers",
            }
        }, {
            path: 'form_editors',
            component: resolve => require(['./components/form_editors.vue'], resolve),
            meta: {
                title: " Form Editors",
            }
        }, {
            path: 'notifications',
            component: resolve => require(['./components/notifications.vue'], resolve),
            meta: {
                title: " Notifications",
            }
        }, {
            path: 'modals',
            component: resolve => require(['./components/modals.vue'], resolve),
            meta: {
                title: " Modals",
            }
        }, {
            path: 'vscroll',
            component: resolve => require(['./components/vscroll.vue'], resolve),
            meta: {
                title: " Vscroll",
            }
        }, {
            path: 'vue-slider',
            component: resolve => require(['./components/vue_slider.vue'], resolve),
            meta: {
                title: " Vue Slider",
            }
        }, {
            path: 'ui_elements',
            component: resolve => require(['./components/ui_elements.vue'], resolve),
            meta: {
                title: " UI Elements",
            }
        }, {
            path: 'typography',
            component: resolve => require(['./components/typography.vue'], resolve),
            meta: {
                title: "Typography",
            }
        }, {
            path: 'api',
            component: resolve => require(['./components/api.vue'], resolve),
            meta: {
                title: "API",
            }
        }, {
            path: 'timeline',
            component: resolve => require(['./components/timeline.vue'], resolve),
            meta: {
                title: "Timeline",
            }
        }, {
            path: 'calendar',
            component: resolve => require(['./components/calendar.vue'], resolve),
            meta: {
                title: "Calendar",
            }
        }, {
            path: 'simple_tables',
            component: resolve => require(['./components/simple_tables.vue'], resolve),
            meta: {
                title: "Simple Tables",
            }
        }, {
            path: 'advanced_tables',
            component: resolve => require(['./components/advanced_tables.vue'], resolve),
            meta: {
                title: "Advanced Tables",
            }
        }, {
            path: 'widgets',
            component: resolve => require(['./components/widgets.vue'], resolve),
            meta: {
                title: "Widgets",
            }
        }, {
            path: 'chartist',
            component: resolve => require(['./components/chartist.vue'], resolve),
            meta: {
                title: "Chartist Charts",
            }
        }, {
            path: 'e_linecharts',
            component: resolve => require(['./components/e_linecharts.vue'], resolve),
            meta: {
                title: "Echarts - Line",
            }
        }, {
            path: 'e_barcharts',
            component: resolve => require(['./components/e_barcharts.vue'], resolve),
            meta: {
                title: "Echarts - Bar",
            }
        }, {
            path: 'e_piecharts',
            component: resolve => require(['./components/e_piecharts.vue'], resolve),
            meta: {
                title: "Echarts - Pie",
            }
        }, {
            path: 'gmaps',
            component: resolve => require(['./components/gmaps.vue'], resolve),
            meta: {
                title: "Maps",
            }
        }, {
            path: 'gallery',
            component: resolve => require(['./components/gallery.vue'], resolve),
            meta: {
                title: "Gallery",
            }
        }, {
            path: 'multi_file_upload',
            component: resolve => require(['./components/multi_file_upload.vue'], resolve),
            meta: {
                title: "Multi File Upload",
            }
        }, {
            path: 'vue_dropzone',
            component: resolve => require(['./components/vue-dropzone.vue'], resolve),
            meta: {
                title: "Vue Dropzone",
            }
        }, {
            path: 'user_profile',
            component: resolve => require(['./components/user_profile.vue'], resolve),
            meta: {
                title: "User Profile",
            }
        }, {
            path: 'add_user',
            component: resolve => require(['./components/add_user.vue'], resolve),
            meta: {
                title: "Add User",
            }
        }, {
            path: 'users_list',
            component: resolve => require(['./components/users_list.vue'], resolve),
            meta: {
                title: "Users List",
            }
        }, {
            path: 'edit_user',
            component: resolve => require(['./components/edit_user.vue'], resolve),
            meta: {
                title: "Edit User",
            }
        }, {
            path: 'blank',
            component: resolve => require(['./components/blank.vue'], resolve),
            meta: {
                title: "Blank",
            }
        }, {
            path: 'transitions',
            component: resolve => require(['./components/transitions.vue'], resolve),
            meta: {
                title: "Transitions",
            }
        }, {
            path: 'invoice',
            component: resolve => require(['./components/invoice.vue'], resolve),
            meta: {
                title: "Invoice",
            }
        }, {
            path: 'contact_us',
            component: resolve => require(['./components/contact_us.vue'], resolve),
            meta: {
                title: "Contact Us",
            }
        }, {
            path: 'Pricing',
            component: resolve => require(['./components/pricing.vue'], resolve),
            meta: {
                title: "Pricing",
            }
        }
    ]
}, {
    path: '/login',
    component: resolve => require(['./components/login.vue'], resolve),
    meta: {
        title: "Login",
    }
}, {
    path: '/register',
    component: resolve => require(['./components/register.vue'], resolve),
    meta: {
        title: "register",
    }
}, {
    path: '/forgotpassword',
    component: resolve => require(['./components/forgotpassword.vue'], resolve),
    meta: {
        title: "Forgot Password",
    }
}, {
    path: '/reset_password',
    component: resolve => require(['./components/reset_password.vue'], resolve),
    meta: {
        title: "Reset Password",
    }
}, {
    path: '/lockscreen',
    component: resolve => require(['./components/lockscreen.vue'], resolve),
    meta: {
        title: "Lockscreen",
    }
}, {
    path: '/500',
    component: resolve => require(['./components/500.vue'], resolve),
    meta: {
        title: "500",
    }
}, {
    path: '*',
    component: resolve => require(['./components/404.vue'], resolve),
    meta: {
        title: "404",
    }
}];
export default routes
