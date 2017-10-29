<?php

namespace App\Providers;

use App\My\Models\Trade;
use App\My\Models\TradeLog;
use App\Policies\TradeLogPolicy;
use App\Policies\TradePolicy;
use Illuminate\Support\Facades\Gate;
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
    public function boot()
    {
        $this->registerPolicies();
        
		//
    }
}
