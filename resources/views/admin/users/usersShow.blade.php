@extends('back.layouts.master')
@section('content')
 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Show AllUsers</h4>
                <p class="card-title-desc"> Show Allusers </p>
                <form>
                    
                
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" disabled type="text" value="{{$allusers->fullname}}" name="fullname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        
                        <input type="text" disabled class="form-control" value="{{ $allusers->email }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"> Username</label>
                    <div class="col-sm-10">
                        
                        <input type="text"  disabled    class="form-control" value="{{ $allusers->username }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        
                        <input type="text" disabled id="original_url" class="form-control" value="{{ $allusers->phone }}" required>
                    </div>
                </div>
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update User">
            </form>
            </div>
           
             
           
        </div>
    </div>  
</div>

 

@endsection