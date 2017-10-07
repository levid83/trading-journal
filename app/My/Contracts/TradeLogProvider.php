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
    public function getBroker();

    public function getMethod();

    public function getTradeLogs();

    public function buildTradeLogs(Array $params=[]);
}