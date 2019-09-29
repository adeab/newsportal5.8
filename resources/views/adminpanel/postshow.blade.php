@extends('layouts.admin')
    @section('page_title')
    Post Page
    @endsection

    @section('body_content')
<div class="graphs">
        <div class="grid_3 grid_4">

            <h3>{{$post->title}}</h3>
            <h4>{{$post->category->name}}</h4>
            <img class=" img-responsive" style="margin:0 auto;"  src="{{ asset('storage/blogImage/' . $post->cover_image) }}" >
            <hr>
            <p>{!!$post->body!!}</p>
        </div>
</div>
@endsection