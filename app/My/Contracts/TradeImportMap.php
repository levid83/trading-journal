<?php
namespace App\My\Contracts;

interface TradeImportMap
{
	
	
	/**
	 * @param array $data
	 *
	 * @return Array
	 */
    public function map(array $data): array ;
}