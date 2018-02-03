<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;

class PatientControler extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.patients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([ 
            'firstname'     => 'required|string',
            'nickname'    => 'nullable|string',
            'lastname'      => 'required|string', 
            'email'         => 'email|min:5|required|unique:patients,email',
            'birthdate'     => 'required|date',
            'gender'        => 'required|string',
            'status'        => 'required|string', 
            'address'       => 'nullable|string',
            'occupation'    => 'nullable|string',
            'pregnancy'     => 'nullable|numeric',
            'p_firstname'   => 'nullable|string', 
            'p_lastname'    => 'nullable|string',
            'reffered_by'   => 'nullable|string',
            'mobile_no'     => 'nullable|string',
        ]);

        $data2 = request()->validate([
            'account_type' => 'required', 
            'username' => 'required|string|max:255|unique:users,username',
            /*'password' => 'nullable|string|min:6|same:password_confirm'*/
        ]);

        //$data2['password'] = bcrypt($data2['password']);
        
        //$data2['password'] = bcrypt('123456');
        $data2['password'] = str_random(6);

        $status2 = \App\User::create($data2); 

        $data['user_id'] = $status2->id;
        $status = \App\Patient::create($data); 
        

        if($status && $status2){
            return response()->json(['success' => true, 'msg' => 'Data Successfully added!']);
        }else{
            return response()->json(['success' => false, 'msg' => 'An error occured while adding data!']);
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
        //return view
        $user = \App\User::find($id);
        $patient = \App\Patient::where('user_id', $id)->first();
        // $patient = \App\Patient::find('user_id', $id);
        return view('patients.home')->with('patient', $patient)
                                    ->with('user', $user);
    }
    public function view_p($id){

        $patient = \App\Patient::find($id);
        $user = \App\User::find($patient->user->id);
        // $patient = \App\Patient::find('user_id', $id);
        return view('admin.patients.view')->with('patient', $patient)
                                    ->with('user', $user);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = \App\Patient::find($id);
        return view('admin.patients.edit')->with('patient', $patient);
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
        $patient = \App\Patient::find($id);
        $data = request()->validate([ 
            'firstname'     => 'required|string',
            'nickname'    => 'nullable|string',
            'lastname'      => 'required|string', 
            'email'         => 'email|min:5|required|unique:patients,email,'.$id,
            'birthdate'     => 'required|date',
            'gender'        => 'required|string',
            'status'        => 'required|string', 
            'address'       => 'nullable|string',
            'occupation'    => 'nullable|string',
            'pregnancy'     => 'nullable|numeric',
            'p_firstname'   => 'nullable|string', 
            'p_lastname'    => 'nullable|string',
            'reffered_by'   => 'nullable|string',
            'mobile_no'     => 'nullable|string',
        ]);

        $data2 = request()->validate([
            'account_type' => 'required', 
            'username' => 'required|string|max:255|unique:users,username,'.$patient->user_id,
            /*'password' => 'nullable|string|min:6|same:password_confirm'*/
        ]);

        /*if($data2['password']){
            $data2['password'] = bcrypt($data2['password']);
        }*/
        //$data2['password'] = bcrypt('123456');
        $user = \App\User::find($patient->user_id);
        $user->username = $request->get('username');
        /*if($data2['password']){
            $user->password = bcrypt($data2['password']);
        }*/
        $status = \App\Patient::find($id)->update($data); 
        
        if($status && $user->save()){
            return response()->json(['success' => true, 'msg' => 'Data Successfully updated!']);
        }else{
            return response()->json(['success' => false, 'msg' => 'An error occured while updating data!']);
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

        try{

            DB::beginTransaction();
            $status = \App\Patient::destroy($id);  
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Data Successfully deleted!']);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['success' => false, 'msg' => 'Cannot Delete patient!']);
        }
        
    }

    public function all(){
        DB::statement(DB::raw('set @row:=0'));
        $data = \App\Patient::selectRaw('*, patients.id as pd_id, @row:=@row+1 as row');

         return DataTables::of($data)
            ->AddColumn('row', function($column){
               return $column->row;
            })
            ->AddColumn('name', function($column){
               return $column->firstname.' '.$column->lastname;
            })
            ->AddColumn('actions', function($column){
                    return '<div class="btn-group table-dropdown">
                                <button class="btn-xs btn btn-primary edit-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <button class="btn-xs btn btn-info view-data-btn" data-id="'.$column->pd_id.'">
                                    <i class="fa fa-eye"></i> View
                                </button> 
                                <button class="btn-xs btn btn-danger delete-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-trash-o"></i> Delete
                                </button> 
                            </div>';
                
            }) 
            ->rawColumns(['actions'])
            ->make(true);    
    }

    public function editMyProfile($id)
    {
        $patient = \App\Patient::find($id);
        return view('patients.edit')->with('patient', $patient);
    }
    public function updateaccount(){
        return view('patients.updateaccount');
    }


    public function changePassword(Request $request){

        $data = request()->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:5|same:confirm_password',
            'confirm_password' => 'required|string|min:5',
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            $user = \App\User::findOrFail(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            if($user->save()){
                return response()->json(['success' => true, 'msg' => 'Password Successfully changed!']);                
            }else{
                return response()->json(['success' => false, 'msg' => 'An error occurred while changing password!']);   
            }
        }else{
            return response()->json(['success' => false, 'msg' => 'Your current password does not match', 'not_match'=> true]);
        }
    }

    public function appointments(){
        return view('patients.appointments');
    }

    public function request_apt_form(){
        $time_slots = \App\TimeSlot::all();
        return view('patients.request')->with('time_slots', $time_slots);
    }
    public function save_request_apt(Request $request){ 

        // $time = \App\TimeSlot::find($request->time_slot);

        //     // return response()->json(['success' => false, 'msg' => 'An error occured while adding appointment!', $request->date_time.' '.$time]);

        // $data = request()->validate([
        //     'date_time'     => 'required',//|unique:appointments,date_time',
        //     'remarks'       => 'nullable|string',            
        //     'user_id'       => 'required',
        //     'patient_id'    => 'required',
        //     'timeslot_id'   => 'required'
        // ]);


        // //$status = \App\Appointment::create($data); 
        // try{
        //     $status = \App\Appointment::create($data); 
        //     if($status){
        //         return response()->json(['success' => true, 'msg' => 'Appointment Successfully added!']);
        //     }
        // }        
        // catch (Exception $e)
        // {
        //     return response()->json($e->getMessage());
        // }

        $time = \App\TimeSlot::find($request->time_slot);

            // return response()->json(['success' => false, 'msg' => 'An error occured while adding appointment!', $request->date_time.' '.$time]);

        $data = request()->validate([
            'date_time'     => 'required',//|unique:appointments,date_time',
            'remarks'       => 'nullable|string',            
            'user_id'       => 'required',
            'patient_id'    => 'required',
          /*'timeslot_id'   => 'required'*/
        ]);

        $data['date_time'] = date('Y-m-d', strtotime($data['date_time']));
        //$status = \App\Appointment::create($data); 
        $date = $data['date_time'];
        $arr = [];
        $ids = \App\Appointment::selectRaw('timeslot_id as id')->where('date_time', $date)->where('status', 'pending')->get();   
        foreach ($ids as $id) {
           array_push($arr, $id->id);
        }

        $timeslots  = DB::table('time_slots')->whereNotIn('id', $arr)->get();
        $data['timeslot_id'] = $timeslots[0]->id;

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
}
