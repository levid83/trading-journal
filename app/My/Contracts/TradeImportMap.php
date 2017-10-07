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
    public function setAccountId($accountId);
    public function setTradeLogEntityId($tradeLogEntityId);
    public function setData($data);

    public function map();
}