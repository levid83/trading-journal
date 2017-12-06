
const routes= [
	  {
		  path: '/',
		  component: resolve => require(['./layout.vue'], resolve),
		  children: [{
			  path: '/dashboard',
			  component: resolve => require(['../vuejs-laravel-admin/components/index.vue'], resolve),
			  meta: {
				  title: "Dashboard",
			  }
		  },{
			  path: '/assets',
			  component: resolve => require(['../vuejs-laravel-admin/components/modals.vue'], resolve),
			  meta: {
				  title: "Dashboard",
			  }
		  },{
			  path: '/trades',
				component: resolve => require(['./pages/TradesPage.vue'], resolve),
				meta: {
					title: "Dashboard",
				}
			}, {
			  path: '/import-trades',
			  component: resolve => require(['../vuejs-laravel-admin/components/simple_tables.vue'], resolve),
			  meta: {
				  title: "Dashboard2",
			  }
		  }]
	  },{
		  path: '/500',
		  component: resolve => require(['../vuejs-laravel-admin/components/500.vue'], resolve),
		  meta: {
			  title: "500",
		  }
	  }, {
		path: '*',
		component: resolve => require( ['../vuejs-laravel-admin/components/404.vue'], resolve),
		meta: {
			title: "404",
		}
	}
];
export default routes
