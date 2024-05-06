@extends('back.layouts.master')
@section('content')
 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Link</h4>
                <p class="card-title-desc"> Edit Link </p>
                <form action="{{route('link.update',$links->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$links->id}}}">
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">link Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$links->title}}" name="title">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Original URL</label>
                    <div class="col-sm-10">
                        
                        <input type="text" name="original_url" id="original_url" class="form-control" value="{{ $links->original_url }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                       <select name="category_id" id="category_id" class="form-control">
                            <option value="">No Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $links->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <input type="submit" class="btn btn-info waves-effect waves-light" value="Create Links">
            </form>
            </div>
           
            <div class="text-center mt-4">
                <button id="showMessageButton" class="btn btn-primary waves-effect waves-light">Show Short Link</button>
            </div>
            <div class="text-center mt-4">
                <div id="message"> 
                    <a href="{{ route('short_url', $links->short_url) }}" target="_blank">
                        {{ route('short_url', $links->short_url) }}
                    </a>
                </div>
           </div>
           
        </div>
    </div>  
</div>

<script>
     document.addEventListener('DOMContentLoaded', function() {
            var messageDiv = document.getElementById('message');
            // Sayfa yüklenirken mesajı gizle
            messageDiv.style.display = 'none';

            // Butona tıklama olayını işle
            document.getElementById('showMessageButton').addEventListener('click', function() {
                // Eğer mesaj gizliyse göster, değilse gizle
                if (messageDiv.style.display === 'none') {
                    messageDiv.style.display = 'block';
                } else {
                    messageDiv.style.display = 'none';
                }
            });
        });
</script>

@endsection