@extends('back.layouts.master')
@section('content')
 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Category</h4>
                <p class="card-title-desc"> Edit Category </p>
                <form action="{{route('categories.update',$category->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$category->id}}}">
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$category->name}}" name="name">
                    </div>
                </div>
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Create Links">
            </form>
            </div>
        </div>
    </div>  
</div>

@endsection