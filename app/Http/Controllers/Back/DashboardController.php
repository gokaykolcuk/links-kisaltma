<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function indexShow(){
        $user = auth()->user(); 
        $usersCount = 0;  
        if($user->role == 'admin'){
             $usersCount = User::count();
        }
        
        $activeLinksCount = Link::where('user_id', $user->id)
        ->where('is_active', 1)
        ->count();
        $inactiveLinksCount = Link::where('user_id', $user->id)
                              ->where('is_active', 0)
                              ->count();
        $activeCategoryCount = Category::where('user_id', $user->id)
        ->where('is_active', 1)
        ->count();
        $inactiveCategoryCount = Category::where('user_id', $user->id)
        ->where('is_active', 0)
        ->count();
        return view('dashboard',compact('activeLinksCount','inactiveLinksCount','activeCategoryCount','inactiveCategoryCount','usersCount'));
    }

     
    

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
