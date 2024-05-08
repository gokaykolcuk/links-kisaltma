<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
 
class AdminController extends Controller
{
     public function allUsers(){
        $allusers = User::where('role','user')->get();
        return view('admin.users.allusers',compact('allusers'));
     }
     public function editUsers($id){
        $allusers = User::find($id);
        return view('admin.users.usersEdit',compact('allusers'));
     }
     public function showUsers(Request $request,$id){
        $allusers = User::find($id);
        return view('admin.users.usersShow',compact('allusers'));
     }
     public function inactiveUser($id){
        User::findOrFail($id)->update([
            'role' => 'inactive',
        ]);
        $notification = array(
            'message' => 'User Successfully Inactive',
             'alert-type' =>'success'
         );
        return redirect()->route('admin.allusers')->with($notification);
    }
    public function activeUser($id){
        User::findOrFail($id)->update([
            'role' => 'active',
        ]);

        $notification = array(
            'message' => 'User Successfully Active',
             'alert-type' =>'success'
         );
        return redirect()->route('admin.allusers')->with($notification);
    }

    public function delete($id){
        User::findOrFail($id)->delete();
        $notification = array(
            'message' => 'User Successfully Deleted',
             'alert-type' =>'success'
         );
         return redirect()->route('admin.allusers')->with($notification);
    }
}
