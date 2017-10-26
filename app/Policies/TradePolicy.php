<?php

namespace App\Policies;

use App\My\Models\TradingAccount;
use App\User;
use App\My\Models\Trade;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;

class TradePolicy
{
    use HandlesAuthorization;

    public function before($user){
		if ($user->role_id==User::SUPERUSER_ROLE_ID){
			return true;
		}
	}
    
    /**
     * Determine whether the user can view the trade.
     *
     * @param  \App\User  $user
     * @param  \App\Trade  $trade
     * @return mixed
     */
    public function view(User $user, Trade $trade)
    {
        //
    }

    /**
     * Determine whether the user can create trades.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the trade.
     *
     * @param  \App\User  $user
     * @param  \App\Trade  $trade
     * @return mixed
     */
    public function update(User $user, Trade $trade)
    {
		$result=Trade::where('id',$trade->id)
					->whereHas('trader.user',
							function($query) use ($user){
								$query->where('id',$user->id);
							}
					)
				->first();
        return !empty($result);
    }

    /**
     * Determine whether the user can delete the trade.
     *
     * @param  \App\User  $user
     * @param  \App\Trade  $trade
     * @return mixed
     */
    public function delete(User $user, Trade $trade)
    {
        //
    }
}
