@extends('back.layouts.master')
@section('content')
 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit AllUsers</h4>
                <p class="card-title-desc"> Edit Allusers </p>
                <form action="{{route('link.update',$allusers->id)}}" method="post">
                    @csrf
                    @method('PUT')
                  <input type="hidden" name="id" value="{{$allusers->id}}}">
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$allusers->fullname}}" name="fullname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        
                        <input type="text" name="email" id="email" class="form-control" value="{{ $allusers->email }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"> Username</label>
                    <div class="col-sm-10">
                        
                        <input type="text" name="username" id="username" class="form-control" value="{{ $allusers->username }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        
                        <input type="text" name="original_url" id="original_url" class="form-control" value="{{ $allusers->phone }}" required>
                    </div>
                </div>
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update User">
            </form>
            </div>
           
             
           
        </div>
    </div>  
</div>

 

@endsection