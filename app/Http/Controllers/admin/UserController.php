<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::get();
        return view('admin.users.usersList',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->submitbtn =="add")
        {
            $messages=$this->messages();
            
            $data=$request->validate([
                'fullName'=>'required',
                'userName'=>'required',
                'email'=>'required',
                'password'=>'required',
            ],$messages);

            $data['status'] = isset($request['status']);
            $data['email_verified_at']=Carbon::now();
            $data['remember_token']= Str::random(10);
            User::create($data);
            return redirect('admin/users/')->with('success','user is added successfully');
        }
        else{
            return redirect()->back()->with('cancel','cancel request');
         }

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findOrFail($id);
       return view('admin.users.editUser',compact('user'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->submitbtn =="update"){
       $messages= $this->messages();
        $data=$request->validate([
            'fullName'=>'required',
            'userName'=>'required',
            'email'=>'required',
            'password'=>'required',
        ],$messages);

            $data['password'] = Hash::make($request['password']);
            $data['status'] = isset($request['status']);
            $data['email_verified_at']=Carbon::now();
            $data['remember_token']= Str::random(10);
        
        
            User::where('id', $id)->update($data);
        
            return redirect('admin/users')->with('success','user is updated successfully');}

            else{
                return redirect()->back()->with('cancel','update is cancelled');
            }
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function messages()
    {
        return [
            'fullName.required'=>'Fullname is required',
            'userName.required'=>'username is required',
            'email.required'=>'username is required',
            'password.required'=>'required',

           ];
    }
}