<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.users_index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        return view('users.users_create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $user = new User();
        $user->name = $request->user_name;   
        $user->email = $request->user_email;  
        
        $enc_pass = $request->user_pass;
        $user->password = bcrypt($enc_pass);   

        $user->phone = $request->user_phone;   
        $user->role_id = $request->user_role;   
        $user->gender = $request->user_gender;

        $imageName = date('YmdHis') . '.' . request()->user_image->getClientOriginalExtension();
        request()->user_image->move(public_path('images'),$imageName);
        $user->image = $imageName;

        $user->save();
        return redirect('/users')->with('message','New User have been Added!');
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
    public function edit(User $user)
    {
        $roles = Roles::all();
        return view('users.users_edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            'user_name' => 'required|max:255',
            'user_email' => 'required',
            'user_phone' => 'required|numeric',
            'user_role' => 'required',
        ]);
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->phone = $request->user_phone;
        $user->role_id = $request->user_role;
        $user->gender = $request->user_gender;
        if($request->user_image){
            $imageName = date('YmdHis') . '.' . request()->user_image->getClientOriginalExtension();
            request()->user_image->move(public_path('images'),$imageName);
            $user->image = $imageName;
        }
        $user->save();
        return redirect('/users')->with('message','User have been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users')->with('message','User have been Removed!');
    }
}
