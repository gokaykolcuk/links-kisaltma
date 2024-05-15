<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $user = auth()->user();

         if($user->role == 'admin'){
           $category = Category::latest()->get();
         }
         else {
           $category = Category::where('user_id', $user->id)->latest()->get();
         }
         return view('category.index',compact('category'));

     }
     public function create(){
        $category = Category::all();

        return view('category.create',compact('category'));
     }
     public function store(Request $request){
        $request->validate([
            'name' =>'required',
        ]);
          $category = new Category();
          $category->user_id = Auth::user()->id;
          $category->name = $request->name;
          $category->slug = Str::slug($request->name);
          $category->save();
 
          $notification = array(
             'message' => 'Category Created Successfully',
              'alert-type' =>'success'
          );
          return redirect()->route('categories.index')->with($notification);
      }
 
      public function edit($id){
         $category = Category::findOrFail($id);
         return view('category.edit',compact('category'));
      }
 
      public function update(Request $request,$id){
           
           Category::findOrFail($id)->update([
             'name'=>$request->name,
             'slug'=>Str::slug($request->name),
           ]);
 
           $notification = array(
             'message' => 'Category Created Successfully',
              'alert-type' =>'success'
          );
 
           return redirect()->route('categories.index')->with($notification);
      }
 
      public function delete($id){
       //  $category = Category::findOrFail($id);
        $category = Category::with('links')->findOrFail($id);
        $category->delete(); 
 
        $notification = array(
         'message' => 'Category Created Successfully',
          'alert-type' =>'success'
      );
 
      return redirect()->route('categories.index')->with($notification);
 
      }
      public function inactiveCategory($id){
        Category::findOrFail($id)->update([
            'is_active' => 0
        ]);
        $notification = array(
          'message' => 'Category Inactive Successfully',
           'alert-type' =>'success'
       );
  
       return redirect()->route('categories.index')->with($notification);
      }

      public function activeCategory($id){
        Category::findOrFail($id)->update([
            'is_active' => 1
        ]);
        $notification = array(
          'message' => 'Category Active Successfully',
           'alert-type' =>'success'
       );
  
       return redirect()->route('categories.index')->with($notification);
      }
}
