<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class UsersController extends Controller
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
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'account_type' => 'required', 
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6|same:password_confirm'
        ]);
        if($data['password']){
            $data['password'] = bcrypt($data['password']);          
        }

        $status = \App\User::create($data); 
        if($status){
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
        $user = \App\User::find($id);
        return view('admin.users.view')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::find($id);
        return view('admin.users.edit')->with('user', $user);
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
            'account_type' => 'required', 
            'username' => 'required|string|max:255|unique:users,username,'.$id,
            'password' => 'nullable|string|min:6|same:password_confirm'
        ]);
        
        $user = \App\User::find($id);
        $user->username         = $request->get('username');
        $user->account_type        = $request->get('account_type');
        if($request->get('password')){
            $user->password     = bcrypt($request->get('password'));
        } 
 
        if($user->save()){
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
        $status = \App\User::destroy($id); 
        if($status){
            return response()->json(['success' => true, 'msg' => 'Data Successfully deleted!']);
        }else{
            return response()->json(['success' => false, 'msg' => 'An error occured while deleting data!']);
        }
    }

    public function all(){
        DB::statement(DB::raw('set @row:=0'));
        $data = \App\User::selectRaw('*, @row:=@row+1 as row');

         return DataTables::of($data)
            ->AddColumn('row', function($column){
               return $column->row;
            })
            ->AddColumn('username', function($column){
               return $column->username;
            }) 
            ->AddColumn('account_type', function($column){
               return $column->account_type;
            }) 
            ->AddColumn('actions', function($column){
                if($column->id == 1){
                    return '<div class="btn-group table-dropdown">
                                <button class="btn-xs btn btn-primary edit-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <button class="btn-xs btn btn-info view-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-eye"></i> View
                                </button>
                            </div>';
                }else{

                    return '<div class="btn-group table-dropdown">
                                <button class="btn-xs btn btn-primary edit-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <button class="btn-xs btn btn-info view-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-eye"></i> View
                                </button>
                                <button class="btn-xs btn btn-danger delete-data-btn" data-id="'.$column->id.'">
                                    <i class="fa fa-trash-o"></i> Delete
                                </button> 
                            </div>';
                
                }
            }) 
            ->rawColumns(['actions'])
            ->make(true);    
    }

    public function myProfile(){
        return view('admin.users.myProfile');
    }

    public function changePassword(Request $request){

        $data = request()->validate([

            'username' => 'required|string',
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:5|same:confirm_password',
            'confirm_password' => 'required|string|min:5',
        ]);

        if (Hash::check($request->new_password, Auth::user()->password)) {
            $user = \App\User::findOrFail(Auth::user()->id);
            $user->username = $request->get('username');
            $user->password = bcrypt($request->new_password);
            if($user->save()){
                return response()->json(['success' => true, 'msg' => 'Password Successfully changed!']);                
            }else{
                return response()->json(['success' => false, 'msg' => 'An error occurred while changing password!']);   
            }
        }else{
            return response()->json(['success' => false, 'msg' => 'An error occurred while changing password!']);
        }
    }
}
