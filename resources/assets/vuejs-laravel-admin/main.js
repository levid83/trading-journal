window.axios = require('axios');
import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './App';
import routes from './routes.js'
import store from './store/store.js'

window.axios.defaults.headers.common = {
    // 'X-Requested-With': 'XMLHttpRequest'
};
Vue.use(VueRouter);
const router = new VueRouter({
    routes,
    linkActiveClass: "active"
});
router.beforeEach((to, from, next) => {
    store.commit("routeChange", "start");
    // scroll to top when changing pages
    if (document.scrollingElement) {
        document.scrollingElement.scrollTop = 0
    } else if (document.documentElement) {
        document.documentElement.scrollTop = 0
    }
    next()
});

//====change page title after route change

router.afterEach((to, from) => {
    if (to.meta.title) {
        document.title = to.meta.title + " - " + store.site_name
        // set pageTitle to null if it is set manually elsewhere
        store.commit('changePageTitle', to.meta.title);
        store.commit("routeChange", "end")
        if (window.innerWidth <= 992) {
            store.commit('left_menu', "close")
        } else {
            store.commit('left_menu', "open")
        }
    }
});


new Vue({
    router,
    store,
    template: '<App/>',
    components: {
        App
    }
}).$mount('#app');
