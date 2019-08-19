<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getDashboard()
    {
        return view('Pages.TPO.dashboardTPO');
    }

    public function exportStudentsData()
    {
        return view('Pages.TPO.exportStudentsData');
    }
    
}
