<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Session;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages=Message::get();
        return view ('admin.messages.messagesList',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message=Message::findOrFail($id);
        return view('admin.messages.showMessage',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Message::where('id',$id)->delete();
        return redirect()->back()->with('success','Message is deleted successfully');
    }
    public function unreadMessagesCount()
    {
   
       $unreadMessagesCount= Message::where('read',0)->get()->count();
      //  return redirect()->back()->with('success','Message deleted sccessfully');
        //return view('admin.layouts.dashboard',compact('unread'));
        Session::put('unreadMessagesCount', $unreadMessagesCount);
    
    }

    public function getDashboard()
    {
 
        $unreadMessages=$this->unreadMessagesCount();
        return view('admin.layouts.dashboard');
 
    }


}
