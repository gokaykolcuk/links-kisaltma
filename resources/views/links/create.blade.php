@extends('back.layouts.master')
@section('content')
 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Create Links</h4>
                <p class="card-title-desc"> Create Links </p>
                <form action="{{route('link.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="title"  id="example-text-input">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="category_id" id="category_id">
                            <option value="">No Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Original URL</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="original_url" id="original_url">
                    </div>
                </div>
                 
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Create Links">

            </form>
            </div>
        </div>
    </div>  
</div>

@endsection