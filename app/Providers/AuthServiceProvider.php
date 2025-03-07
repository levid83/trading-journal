<?php

namespace App\Providers;

use App\Permission;
use App\My\Models\Trade;
use App\My\Models\TradeLog;
use App\Policies\TradeLogPolicy;
use App\Policies\TradePolicy;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
		Trade::class => TradePolicy::class,
		TradeLog::class => TradeLogPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies($gate);
	
		// Dynamically register permissions with Laravel's Gate.
		foreach ($this->getPermissions() as $permission) {
			$gate->define($permission->name, function ($user) use ($permission) {
				return $user->hasPermission($permission);
			});
		}
    }
	
	/**
	 * Fetch the collection of site permissions.
	 *
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	protected function getPermissions()
	{
		return Permission::with('roles')->get();
	}
}
