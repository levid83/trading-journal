<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use DB;

class CsvController extends Controller
{
    public function index(){
        $data=Excel::load(realpath('uploads/csv/test.csv'), function($reader){})->get();
        if (!empty($data)){
            foreach ($data as $key => $row) {

                $insert[] = [   'drill_down' => isset($row['drill_down'])?$row['drill_down']:'',
                                'underlying' => isset($row['underlying'])?$row['underlying']:'',
                                'security_type' => isset($row['security_type'])?$row['security_type']:'',
                                'last_trading_day' => isset($row['last_trading_day'])?$row['last_trading_day']:'',
                                'strike' => isset($row['strike'])?$row['strike']:'',
                                'put_call' => isset($row['putcall'])?$row['putcall']:'',
                                'currency' => isset($row['currency'])?$row['currency']:'',
                                'action' => isset($row['action'])?$row['action']:'',
                                'action_subtype' => isset($row['action_sub_type'])?$row['action_sub_type']:'',
                                'quantity' => isset($row['quantity'])?$row['quantity']:'',
                                'comb' => isset($row['comb.'])?$row['comb.']:'',
                                'description' => isset($row['description'])?$row['description']:'',
                                'financial_instrument' => isset($row['fin_instrument'])?$row['fin_instrument']:'',
                                'symbol' => isset($row['symbol'])?$row['symbol']:'',
                                'price' => isset($row['price'])?$row['price']:'',
                                'time' => isset($row['time'])?$row['time']:'',
                                'exchange' => isset($row['exch.'])?$row['exch.']:'',
                                'vwap_time' => isset($row['vwap_time'])?$row['vwap_time']:'',
                                'comment' => isset($row['comment'])?$row['comment']:'',
                                'submitter' => isset($row['submitter'])?$row['submitter']:'',
                                'order_ref' => isset($row['order_ref.'])?$row['order_ref.']:'',
                                'transaction_id' => isset($row['id'])?$row['id']:'',
                                'yield' => isset($row['yield'])?$row['yield']:'',
                                'tx_yield' => isset($row['tx_yield'])?$row['tx_yield']:'',
                                'commission' => isset($row['commission'])?$row['commission']:'',
                                'realized_pl' => isset($row['realized_pl'])?$row['realized_pl']:'',
                                'economic_value_rule' => isset($row['economic_value_rule'])?$row['economic_value_rule']:'',
                                'currency_price' => isset($row['currency_price'])?$row['currency_price']:'',
                                'volatility' => isset($row['volatility'])?$row['volatility']:'',
                                'vol_link' => isset($row['vol._link'])?$row['vol._link']:'',
                                'savings' => isset($row['savings'])?$row['savings']:'',
                                'key' => isset($row['key'])?$row['key']:'',
                                'destination' => isset($row['destination'])?$row['destination']:'',
                                'order_id' => isset($row['order_id'])?$row['order_id']:'',
                                'exch_exec_id' => isset($row['exch._exec._id'])?$row['exch._exec._id']:'',
                                'exch_order_id' => isset($row['exch._order_id'])?$row['exch._order_id']:'',
                                'ticket_id' => isset($row['ticket_id'])?$row['ticket_id']:'',
                                'more_info' => isset($row['more_info'])?$row['more_info']:'',
                                'trading_class' => isset($row['trading_class'])?$row['trading_class']:'',
                                'price_difference' => isset($row['price_difference'])?$row['price_difference']:'',
                                'price_incl_fees' => isset($row['price_incl._fees'])?$row['price_incl._fees']:'',
                                'account' => isset($row['account'])?$row['account']:'',
                                'cash_qty' => isset($row['cash_qty'])?$row['cash_qty']:'',
                                'clearing' => isset($row['clearing'])?$row['clearing']:'',
                                'clearing_acct' => isset($row['clearing_acct'])?$row['clearing_acct']:'',
                                'soft_dollars' => isset($row['soft_dollars'])?$row['soft_dollars']:'',
                                'open_close' => isset($row['openclose'])?$row['openclose']:'',
                                'solicited' => isset($row['solicited'])?$row['solicited']:'',
                                'solicited_by_ibroker' => isset($row['solicited_by_ibroker'])?$row['solicited_by_ibroker']:'',


                ];
            }
            if(!empty($insert)){
                DB::table('trade_logs')->insert($insert);
                dd('Insert Record successfully.');
            }
        }
    }
}
