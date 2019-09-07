<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use Barryvdh\Debugbar\Facade as Debugbar;

class exportController extends Controller
{
    public function excel(){
        $data = DB::table('login_details')->get()->toArray();
        $data_array[]=array('Email','Password');
        Debugbar::info($data);
        foreach($data as $d)
        {
            $data_array[] = array(
                'Email' => $d->Email,
                'Password' => $d->password 
            );
        }
        Excel::download('User_Data',function($excel) use ($data_array){
            $excel->setTitle('Login Data');
            $excel->sheet('Login Data',function($sheet) use ($data_array){
                $sheet->fromArray($data_array,null,'A1',false,false);
            });
        })->download('xlsx');
    }
}
