<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Roles::latest()->paginate(3);
        return view('roles.roles_index',compact('roles'));
    }

    public function store(Request $request){
        request()->validate([
            'role_name' => 'required'
        ]);
        $role = new Roles();
        $role->name = $request->role_name;
        $role->save();
        return redirect('/roles')->with('message','New Role have been Added!');
    }

    public function edit(Roles $role){
        return view('roles.roles_edit',compact('role'));
    }

    public function update(Request $request , Roles $role){
        request()->validate([
            'role_name'=>'required'
        ]);
        $role->name = $request->role_name;
        $role->save();
        return redirect('/roles')->with('message','Role have been Updated!');
    }

    public function search(Request $request){
        $query = request()->input('query');
        if($query != ''){
            $roles = Roles::where('name','like',"%$query%")->paginate(3);
        } else {
            $roles = Roles::all();
        }
        return view('roles.roles_index',compact('roles'));
    }
}
