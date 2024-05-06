@extends('back.layouts.master')
@section('content')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Kişisel Bilgiler</h4>
                <p class="card-title-desc"> Kişisel Bilgiler Düzenleme Alanı </p>
                <form action="{{route('profiles.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" value="{{$edit->name}}" id="example-text-input">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="lastname" value="{{$edit->lastname}}"  id="example-text-input">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$edit->full_name}}"  disabled id="example-text-input">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-search-input" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="username" value="{{$edit->username}}" id="example-search-input">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" name="email" value="{{$edit->email}}"  id="example-email-input">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="photo"  id="image">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-xl"  src="{{ (!empty($edit->photo)) ? url('upload/images/'.$edit->photo) : url('upload/no_image.jpg')}}" alt="Card image cap" >
                    </div>
                </div>

                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">

            </form>
            </div>
        </div>
    </div>  
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){  
            var reader = new FileReader();  
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);  
            }
            reader.readAsDataURL(this.files[0]);  
        });
    });
</script>
@endsection