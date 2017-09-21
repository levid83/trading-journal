<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

class CsvController extends Controller
{
    public function index(){
        Excel::load(realpath('uploads/csv/test.csv'), function($reader){
            $reader->each(function ($sheet) {
                echo join(',',$sheet->toArray()). ' <br>';
            });
        });
    }
}
