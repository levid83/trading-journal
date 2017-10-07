<?php
namespace App\My\Contracts;
/**
 * Created by PhpStorm.
 * User: Levi
 * Date: 2017-10-06
 * Time: 3:27 PM
 */
interface TradeLogProvider
{
	
	/**
	 * @return mixed
	 */
    public function getBroker();
	
	/**
	 * @return mixed
	 */
    public function getMethod();
	
	/**
	 * @return mixed
	 */
    public function getTradeLogs();
	
	/**
	 * @param array $params
	 *
	 * @return mixed
	 */
    public function buildTradeLogs(Array $params=[]);
}