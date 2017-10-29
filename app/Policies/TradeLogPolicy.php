<?php

namespace App\Policies;

use App\User;
use App\TradeLog;
use Illuminate\Auth\Access\HandlesAuthorization;

class TradeLogPolicy
{
    use HandlesAuthorization;
	
	public function before($user){
		if ($user->role_id==User::SUPERUSER_ROLE_ID){
			return true;
		}
	}
	
	/**
	 * Determine whether the user can import the tradeLog.
	 *
	 * @param  \App\User  $user
	 * @param  \App\TradeLog  $tradeLog
	 * @return mixed
	 */
	public function import(User $user, TradeLog $tradeLog)
	{
		$result=$user->whereHas('tradingAccounts',
						function($query) use ($tradeLog){
							$query->where('id',$tradeLog->trader_id)->where('account_type','trader');
						}
				)->first();
		return !empty($result);
	}
	
    /**
     * Determine whether the user can view the tradeLog.
     *
     * @param  \App\User  $user
     * @param  \App\TradeLog  $tradeLog
     * @return mixed
     */
    public function view(User $user, TradeLog $tradeLog)
    {
        //
    }

    /**
     * Determine whether the user can create tradeLogs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
		//
    }

    /**
     * Determine whether the user can update the tradeLog.
     *
     * @param  \App\User  $user
     * @param  \App\TradeLog  $tradeLog
     * @return mixed
     */
    public function update(User $user, TradeLog $tradeLog)
    {
		$result=$user->whereHas('tradingAccounts',
			function($query) use ($tradeLog){
				$query->where('id',$tradeLog->trader_id)->where('account_type','trader');
			}
		)->first();

		return !empty($result);
    }

    /**
     * Determine whether the user can delete the tradeLog.
     *
     * @param  \App\User  $user
     * @param  \App\TradeLog  $tradeLog
     * @return mixed
     */
    public function delete(User $user, TradeLog $tradeLog)
    {
        //
    }
}
