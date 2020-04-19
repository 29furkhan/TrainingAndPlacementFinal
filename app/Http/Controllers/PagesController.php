<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as Debugbar;
use DB;

class PagesController extends Controller
{
    public function getDashboard()
    {
        $mech_placed =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Placed' and sp.Branch like 'Mech%'"));
        $mech_not_placed =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Not Placed' and sp.Branch like 'Mech%'"));
        $mech_entrepreneurs =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Entrepreneur' and sp.Branch like 'Mech%'"));
        
        // Debugbar::info($mech_placed);
        $cse_placed =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Placed' and sp.Branch like 'Comp%'"));
        $cse_not_placed =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Not Placed' and sp.Branch like 'Comp%'"));
        // Debugbar::info($cse_placed);
        $cse_entrepreneurs =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Entrepreneur' and sp.Branch like 'Comp%'"));

        $civil_placed =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Placed' and sp.Branch like 'Civil%'"));
        $civil_not_placed =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Not Placed' and sp.Branch like 'Civil%'"));
        $civil_entrepreneurs =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Entrepreneur' and sp.Branch like 'Civil%'"));
        
        $it_placed =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Placed' and sp.Branch like 'In%'"));
        $it_not_placed =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Not Placed' and sp.Branch like 'In%'"));
        $it_entrepreneurs =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Entrepreneur' and sp.Branch like 'Inf%'"));
        
        $etc_placed =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Placed' and sp.Branch like 'Ele%'"));
        $etc_not_placed =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Not Placed' and sp.Branch like 'Ele%'"));
        $etc_entrepreneurs =  count(DB::select("select * from student_profile sp inner JOIN placement_details pd where sp.Email = pd.Email AND pd.Placement_Status = 'Entrepreneur' and sp.Branch like 'Ele%'"));
        

        $placed = DB::table("placement_details")->where("placement_status",'Placed')->count();
        $total = DB::table("placement_details")->count();
        $not_placed = DB::table("placement_details")->where("placement_status",'Not Placed')->count();
        $entrepreneur = DB::table("placement_details")->where("placement_status",'Entrepreneur')->count();
        
        
        return view('pages.TPO.dashboardTPO',compact('placed','total','not_placed','entrepreneur','mech_placed','mech_not_placed','cse_placed','cse_not_placed','it_placed','it_not_placed','etc_placed','etc_not_placed','civil_placed','civil_not_placed','mech_entrepreneurs','civil_entrepreneurs','etc_entrepreneurs','it_entrepreneurs','cse_entrepreneurs'));
    }

    public function exportStudentsData()
    {
        return view('pages.TPO.exportStudentsData');
    }
    
}
