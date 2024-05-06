@extends('back.layouts.master')
@section('content')
 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Create Category</h4>
                <p class="card-title-desc"> Create Category </p>
                <form action="{{route('categories.store')}}" method="post">
                    @csrf
                    
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name"  id="example-text-input">
                    </div>
                </div>
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Create Links">
            </form>
            </div>
        </div>
    </div>  
</div>

@endsection