
const routes= [
	  {
		  path: '/',
		  component: resolve => require(['../../../vendor/vuejs-laravel-admin/layout.vue'], resolve),
		  children: [{
			  path: '/trades',
			  component: resolve => require(['../../../vendor/vuejs-laravel-admin/components/index.vue'], resolve),
			  meta: {
				  title: "Dashboard",
			  }
		  }, {
			  path: '/import-trades',
			  component: resolve => require(['../../../vendor/vuejs-laravel-admin/components/index2.vue'], resolve),
			  meta: {
				  title: "Dashboard2",
			  }
		  }]
	  },{
		  path: '/500',
		  component: resolve => require(['../../../vendor/vuejs-laravel-admin/components/500.vue'], resolve),
		  meta: {
			  title: "500",
		  }
	  }
];
export default routes
