<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;

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
            'password' => 'nullable|string|min:6|same:password_confirm'
        ]);

        $data2['password'] = bcrypt($data2['password']);
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
        
        $patient = \App\Patient::where('user_id', $id)->first();
        // $patient = \App\Patient::find('user_id', $id);
        return view('patients.home')->with('patient', $patient);
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
            'password' => 'nullable|string|min:6|same:password_confirm'
        ]);
        if($data2['password']){
            $data2['password'] = bcrypt($data2['password']);
        }

        $user = \App\User::find($patient->user_id);
        $user->username = $request->get('username');
        if($data2['password']){
            $user->password = bcrypt($data2['password']);
        }
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
        $status = \App\Patient::destroy($id); 
        if($status){
            return response()->json(['success' => true, 'msg' => 'Data Successfully deleted!']);
        }else{
            return response()->json(['success' => false, 'msg' => 'An error occured while deleting data!']);
        }
    }

    public function all(){
        DB::statement(DB::raw('set @row:=0'));
        $data = \App\Patient::selectRaw('*, @row:=@row+1 as row');

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
                                <button class="btn-xs btn btn-danger delete-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-trash-o"></i> Delete
                                </button> 
                            </div>';
                
            }) 
            ->rawColumns(['actions'])
            ->make(true);    
    }
}
