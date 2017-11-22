<?php
namespace App\My\Contracts;

interface TradeImportMap
{
	
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