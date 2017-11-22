<?php
namespace App\My\Contracts;

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