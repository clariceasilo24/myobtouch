<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
use Auth;
class CheckUpController extends Controller
{
    public function index(){
    	$appointments = \App\Appointment::where('date_time', date('Y-m-d'))->get();
    	return view('admin.check_up.index');
    }

    public function precheckup($id){
    	$checkup = \App\CheckUp::where('appointment_id',$id)->get();
    	if(sizeof($checkup)){
            return response()->json(['failed' => true, 'msg' => 'Appointment already has a pre-checkup detail!']);
    	}else{
	    	$appointment = \App\Appointment::findOrFail($id);
	    	return view('admin.check_up.pre-checkup')->with('appointment', $appointment);
    	}
    }

    public function save_precheckup(Request $request){

        $data = request()->validate([
        	'appointment_id'=>'required',
            'pregnancy' => 'required',
            'bp' => 'required',
            'hr' => 'required',
            'rr' => 'required',
            'height' => 'required',
            'weight' => 'required',
        ]);

        $status = \App\CheckUp::create($data); 
        if($status){
            return response()->json(['success' => true, 'msg' => 'Data Successfully added!']);
        }else{
            return response()->json(['success' => false, 'msg' => 'An error occured while adding data!']);
        }
    }

    public function checkup($id){
        $checkup = \App\CheckUp::where('appointment_id',$id)->first();
        if(!sizeof($checkup)){
            return response()->json(['failed' => true, 'msg' => 'Appointment has no pre-checkup detail!']);
        }
        $services = \App\Service::all(); 
        $cases = \App\Cases::all();
        if(!sizeof($checkup)){
            return response()->json(['failed' => true, 'msg' => 'Appointment already has no pre-checkup detail yet!']);
        }else{
            return view('admin.check_up.check-up')->with('checkup', $checkup)->with('services', $services)->with('cases', $cases);
        }
    }

    public function save_checkup(Request $request, $id){

        $data = request()->validate([
            'appointment_id' => 'required',
            'pregnancy'      => 'required',
            'bp'             => 'required',
            'hr'             => 'required',
            'rr'             => 'required',
            'height'         => 'required',
            'weight'         => 'required',
            'complaints'     => 'nullable',
            'assessments'    => 'nullable',
            'treatment'      => 'nullable',
            'prescribed_meds' => 'nullable',
            'last_menstruation_date' => 'required',
            'edc' => 'required',
            

        ]);
        $data['last_menstruation_date'] = date('Y-m-d', strtotime($data['last_menstruation_date']));
        $apt = \App\Appointment::findOrFail($request->appointment_id);
        $apt->status = 'served';
        $apt->save();

        $status = \App\CheckUp::findOrFail($id)->update($data); 

        \App\CaseDetail::where('appointment_id', $apt->id)->delete();
        for($i = 0 ; $i < sizeof($request->get('cases')) ; $i++){
            $c = new \App\CaseDetail;
            $c->appointment_id  = $apt->id;
            $c->case_id         = $request->get('cases')[$i];
            $c->save();
        }
        \App\ServiceDetail::where('appointment_id', $apt->id)->delete();
        for($i = 0 ; $i < sizeof($request->get('services')) ; $i++){
            $s = new \App\ServiceDetail;
            $s->appointment_id  = $apt->id;
            $s->service_id      = $request->get('services')[$i];
            $s->save();
        }
        if($status){
            return response()->json(['success' => true, 'msg' => 'Data Successfully added!']);
        }else{
            return response()->json(['success' => false, 'msg' => 'An error occured while adding data!']);
        }
    }

    public function all(){
        DB::statement(DB::raw('set @row:=0'));
        $data = \App\Appointment::selectRaw('*, @row:=@row+1 as row')->where('date_time', date('Y-m-d'))->where('status', '=','approved')->orWhere('status', '=','served')->get();

         return DataTables::of($data)
            ->AddColumn('row', function($column){
               return $column->row;
            }) 
            ->AddColumn('patient', function($column){
               return  '<b class="text-primary">'.date('H:i A', strtotime($column->timeslot->from)).' - '.date('H:i A', strtotime($column->timeslot->to)).'</b> - <b class="text-danger">'.$column->patient->firstname.' '.$column->patient->lastname.'</b>';
            }) 
            ->AddColumn('timeslot', function($column){
               return date('H:i A', strtotime($column->timeslot->from)).' - '.date('H:i A', strtotime($column->timeslot->to));
            })
            ->AddColumn('status', function($column){
               return $column->status == 'pending' ? '<span class="label badge-pill label-warning">'.$column->status.'</span>':'<span class="label badge-pill label-danger">'.$column->status.'</span>';
            })
            ->AddColumn('scheduled_by', function($column){
               return $column->user->username;
            }) 

            ->AddColumn('actions', function($column){
                if(Auth::user()->account_type == 'admin'){
                    return '
                                <button class="btn-xs btn btn-warning precheckup-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-list-alt"></i> Pre-Checkup<br> Details
                                </button>
                                <button class="btn-xs btn btn-success checkup-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-check"></i> Checkup <br>Details
                                </button> ';

                }else{
                    return '
                                <button class="btn-xs btn btn-warning precheckup-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-list-alt"></i> Pre-Checkup<br> Details
                                </button>';                 
                }
                
            }) 
            ->rawColumns(['actions','patient'])
            ->make(true);    
    }


    public function past(){
        DB::statement(DB::raw('set @row:=0'));
        $data = \App\Appointment::selectRaw('*, appointments.id as a_id, @row:=@row+1 as row')->where('date_time', '<',date('Y-m-d'))->where('status', '=','approved')->get();

         return DataTables::of($data)
            ->AddColumn('row', function($column){
               return $column->row;
            }) 
            ->AddColumn('patient', function($column){
               return  '<b class="text-primary">'.date('H:i A', strtotime($column->timeslot->from)).' - '.date('H:i A', strtotime($column->timeslot->to)).'</b> - <b class="text-danger">'.$column->patient->firstname.' '.$column->patient->lastname.'</b>';
            }) 
            ->AddColumn('timeslot', function($column){
               return date('H:i A', strtotime($column->timeslot->from)).' - '.date('H:i A', strtotime($column->timeslot->to));
            })
            ->AddColumn('status', function($column){
/*               return $column->status == 'pending' ? '<span class="label badge-pill label-warning">'.$column->status.'</span>':'<span class="label badge-pill label-danger">'.$column->status.'</span>';*/
              if($column->status == 'pending'){
                return '<span class="label badge-pill label-warning">'.$column->status.'</span>';     
                }
                if($column->status == 'approved'){
                return '<span class="label badge-pill label-info">'.$column->status.'</span>';   
                }
                if($column->status == 'served'){
                return '<span class="label badge-pill label-success">'.$column->status.'</span>';    
                } 
               return '<span class="label badge-pill label-danger">'.$column->status.'</span>';
            })
            ->AddColumn('scheduled_by', function($column){
               return $column->user->username;
            }) 

            ->AddColumn('actions', function($column){
                if(Auth::user()->account_type == 'admin'){
                    return '
                                <button class="btn-xs btn btn-warning precheckup-data-btn" data-id="'.$column->a_id.'">
                                    <i class="fa fa-list-alt"></i> Pre-Checkup<br> Details
                                </button>
                                <button class="btn-xs btn btn-success checkup-data-btn" data-id="'.$column->a_id.'">
                                    <i class="fa fa-check"></i> Checkup <br>Details
                                </button> ';

                }else{
                    return '
                                <button class="btn-xs btn btn-warning precheckup-data-btn" data-id="'.$column->a_id.'">
                                    <i class="fa fa-list-alt"></i> Pre-Checkup<br> Details
                                </button>';                 
                }
                
            }) 
            ->rawColumns(['actions','patient'])
            ->make(true);    
    }
}
