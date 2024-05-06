<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
     public function index(){
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('profile.profile',compact('data'));
     }

     public function profileEdit(){
        $id = Auth::user()->id;
        $edit = User::find($id);
        return view('profile.profiles_edit',compact('edit'));
     }

     public function profileStore(Request $request){
         $id = Auth::user()->id;
         $data = User::find($id);
         $data->name = $request->name;
         $data->lastname = $request->lastname;
         $data->username = $request->username;
         $data->email = $request->email;

         if($request->file('photo')){
            $file = $request->file('photo');

            $filename = date("Y-m-d H:i:s").$file->getClientOriginalName();
            $file->move(public_path('upload/images'), $filename);

            $data['photo'] =$filename;
         }
         $data->save();
         $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
         );
         return redirect()->route('profile')->with($notification);
     }

     public function passwordChange(){
        return view('profile.password_change');
     }

     public function passwordUpdates(Request $request){
         $validateData= $request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required',
            'confirm_password' =>'required|same:newpassword',
         ]);
         $hashPass = Auth::user()->password;
         if(Hash::check($request->oldpassword,$hashPass)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();
            
            session()->flash('message', 'Password has been changed');
            return redirect()->back();
         }else {
            session()->flash('message', 'Old password is not correct');
            return redirect()->back();
         }
     }
}
