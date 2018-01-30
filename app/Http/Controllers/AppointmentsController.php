<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;

class AppointmentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.appointments.index');
    }

 
    public function create()
    { 
        $time_slots = \App\TimeSlot::all();
        $patients = \App\Patient::all();
        return view('admin.appointments.create')->with('time_slots', $time_slots)
                                                ->with('patients', $patients);
    }
 
    public function store(Request $request)
    {
        $time = \App\TimeSlot::find($request->time_slot);

            // return response()->json(['success' => false, 'msg' => 'An error occured while adding appointment!', $request->date_time.' '.$time]);

        $data = request()->validate([
            'date_time'     => 'required',//|unique:appointments,date_time',
            'remarks'       => 'nullable|string',            
            'user_id'       => 'required',
            'patient_id'    => 'required',
            'timeslot_id'   => 'required'
        ]);


        //$status = \App\Appointment::create($data); 
        try{
            $status = \App\Appointment::create($data); 
            if($status){
                return response()->json(['success' => true, 'msg' => 'Appointment Successfully added!']);
            }
        }        
        catch (Exception $e)
        {
            return response()->json($e->getMessage());
        }
        
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
        $appointment = \App\Appointment::find($id);
        $patients =  \App\Patient::all();
        $time_slots = \App\TimeSlot::all();

        return view('admin.appointments.edit')->with('appointment', $appointment)
                                            ->with('patients', $patients)
                                            ->with('time_slots', $time_slots);
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
        $data = request()->validate([
            'date_time'     => 'required',//|unique:appointments,date_time',
            'remarks'       => 'nullable|string',            
            'user_id'       => 'required',
            'patient_id'    => 'required',
            'timeslot_id'   => 'required'
        ]);
        
        $status = \App\Appointment::find($id)->update($data); 
        if($status){
            return response()->json(['success' => true, 'msg' => 'Appointment Successfully updated!']);
        }else{
            return response()->json(['success' => false, 'msg' => 'An error occured while updating appointment!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = \App\Appointment::destroy($id); 
        if($status){
            return response()->json(['success' => true, 'msg' => 'Data Successfully deleted!']);
        }else{
            return response()->json(['success' => false, 'msg' => 'An error occured while deleting data!']);
        }
    }

    public function all(){
        DB::statement(DB::raw('set @row:=0'));
        $data = \App\Appointment::selectRaw('*, @row:=@row+1 as row');

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
            ->AddColumn('scheduled_by', function($column){
               return $column->user->username;
            }) 

            ->AddColumn('actions', function($column){
                    return '<div class="btn-group table-dropdown">
                                <button class="btn-xs btn btn-primary edit-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <button class="btn-xs btn btn-danger delete-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-trash-o"></i> Delete
                                </button> 
                            </div>';
                
            }) 
            ->rawColumns(['actions', 'status'])
            ->make(true);    
    }

    public function getAvalableTime($date, $id = null){
        $arr = [];
        if($id){
            $ids = \App\Appointment::selectRaw('timeslot_id as id')->where('date_time', $date)->where('status', 'pending')->where('id', '!=',$id)->get();
        }else{
            $ids = \App\Appointment::selectRaw('timeslot_id as id')->where('date_time', $date)->where('status', 'pending')->get();   
        }
        foreach ($ids as $id) {
           array_push($arr, $id->id);
        }
        $records  = DB::table('time_slots')->whereNotIn('id', $arr)->get();
        
        return response()->json(['records'=>$records]);
    }
}
