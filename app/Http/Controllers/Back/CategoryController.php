<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::latest()->get();
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
}