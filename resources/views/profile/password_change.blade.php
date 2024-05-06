@extends('back.layouts.master')
@section('content')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Change Password</h4>
                <p class="card-title-desc"> Change Password Area </p>

                @if(count($errors))
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissible fade show"> {{$error}} </p>
                    @endforeach
                @endif

                <form action="{{route('updates.password')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="oldpassword" id="oldpassword">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="newpassword" id="newpassword">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="confirm_password" id="confirm_password">
                    </div>
                </div>
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">

            </form>
            </div>
        </div>
    </div>  
</div>

 
@endsection