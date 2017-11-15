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