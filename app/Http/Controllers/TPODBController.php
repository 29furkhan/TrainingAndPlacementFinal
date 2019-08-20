<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TPODB;
use DB;

class TpoDBController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $table_rows = DB::table('temp')->paginate(10);
        return view('Pages.TPO.exportStudentsData')->with('table_rows',$table_rows);
    }

    public function getDropdowns(){
        $branch = DB :: table('branch')->get();
        return view('Pages.TPO.exportStudentsData')->with('branch',$branch);
    }
    
    public function fetch_data(Request $request){
        if($request->ajax()){
            $table_rows = DB::table('temp')->paginate(10);
            return view('studentsDataTable',compact('table_rows'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
