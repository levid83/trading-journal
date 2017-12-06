const menu_items = [{
    name: 'Dashboard',
    link: '/dashboard',
    icon: ' icon-home'
}, {
    name: 'Assets',
    link: '/assets',
    icon: 'icon-screen-desktop'
}, {
    name: 'Trades',
    icon: 'icon-handbag',
    child:[
        {
            name:'Trade List',
            link:'/trades',
            icon:'fa fa-angle-double-right'
        }, {
            name:'Import Trades',
            link:'/import-trades',
            icon:'fa fa-angle-double-right'
        }]
    }];
export default menu_items;
