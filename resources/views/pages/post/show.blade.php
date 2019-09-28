@if (Auth::check())
@if (Auth::user()->category=="Admin" || Auth::user()->category=="Editor" || Auth::user()->category=="Contributor")
@php $layout="layouts.admin"; @endphp
@else
@php $layout="layouts.mainlayout"; @endphp
@endif
@else
@php $layout="layouts.mainlayout"; @endphp
@endif

@extends($layout)
    @section('page_title')
    Post Page
    @endsection

    @section('body_content')
<div class="graphs">
        <div class="grid_3 grid_4">

            <h3>{{$post->title}}</h3>
            <h4>Category</h4>
            <img class=" img-responsive" style="margin:0 auto;"  src="{{ asset('storage/blogImage/' . $post->cover_image) }}" >
            <hr>
            <p>{!!$post->body!!}</p>
        </div>
</div>
@endsection