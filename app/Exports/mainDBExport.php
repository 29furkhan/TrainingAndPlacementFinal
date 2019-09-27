<?php

namespace App\Exports;

use App\mainDB;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class mainDBExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::select("select * from login_details");
    }
}
