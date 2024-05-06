@extends('back.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Cards</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">UI Elements</a></li>
                    <li class="breadcrumb-item active">Cards</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <center> 
                 <img class="rounded-circle avatar-xl mt-2" src="{{ (!empty($data->photo)) ? url('upload/images/'.$data->photo) : url('upload/no_image.jpg')}}" alt="Card image cap" >
            
            </center>
            <div class="card-body">
                <h4 class="card-title"> Name:  {{$data->name}} </h4>
                <h4 class="card-title">Email: {{$data->email}}</h4>
                <h4 class="card-title">Username : {{$data->username}}</h4>
                <hr>
                <a href="{{route('profiles.edit')}}" class="btn btn-info btn-rounded waves-effect waves-light">Düzenle</a>
            </div>
        </div>
    </div>

 

</div>
@endsection