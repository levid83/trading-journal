<?php
namespace App\My\Contracts;
/**
 * Created by PhpStorm.
 * User: Levi
 * Date: 2017-10-06
 * Time: 11:35 AM
 */

interface TradeImportMap
{
	
	/**
	 * @param $accountId
	 *
	 * @return mixed
	 */
    public function setAccountId($accountId);
	
	/**
	 * @param $tradeLogEntityId
	 *
	 * @return mixed
	 */
    public function setTradeLogEntityId($tradeLogEntityId);
	
	/**
	 * @param $data
	 *
	 * @return mixed
	 */
    public function setData($data);
	
	/**
	 * @return mixed
	 */
    public function map();
}