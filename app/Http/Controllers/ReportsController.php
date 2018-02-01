<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
use Auth;

class ReportsController extends Controller
{
    public function cases_reports(){
    	$cases = \App\Cases::all();
    	return view('admin.reports.cases')->with('cases', $cases);
    }

    public function getCasesReports($case){

        DB::statement(DB::raw('set @row:=0'));
        if($case == 'all'){
        	$data = \App\CaseDetail::selectRaw('*, @row:=@row+1 as row');
        }else{
        	$data = \App\CaseDetail::selectRaw('*, @row:=@row+1 as row')->where('case_id', $case)->get();
        }

         return DataTables::of($data)
            ->AddColumn('row', function($column){
               return $column->row;
            }) 
            ->AddColumn('patient', function($column){
               return  $column->appointment->patient->firstname.' '.$column->appointment->patient->lastname;
            }) 
            ->AddColumn('case', function($column){
               return  $column->case->name;
            }) 
            ->make(true);    
    }
    public function appointment_reports(){
    	return view('admin.reports.appointment');
    }

    public function getAppointmentReports(Request $request){ 
        $date = date('Y-m-d', strtotime($request->get('date')));

        DB::statement(DB::raw('set @row:=0'));
        $data = \App\Appointment::selectRaw('*, @row:=@row+1 as row')->where('date_time', $date)->get();

         return DataTables::of($data)
            ->AddColumn('row', function($column){
               return $column->row;
            }) 
            ->AddColumn('patient', function($column){
               return $column->patient->firstname.' '.$column->patient->lastname;
            }) 
            ->AddColumn('date_time', function($column){
               return date('F d, Y', strtotime($column->date_time));
            })
            ->AddColumn('timeslot', function($column){
               return date('H:i A', strtotime($column->timeslot->from)).' - '.date('H:i A', strtotime($column->timeslot->to));
            })
            ->AddColumn('status', function($column){
               return $column->status == 'pending' ? '<span class="label badge-pill label-warning">'.$column->status.'</span>':'<span class="label badge-pill label-danger">'.$column->status.'</span>';
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);    
    }
}
