@extends('layouts.master')

@section('content')
@if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
@endif
<div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.create')}}" class="btn btn-success">New Post</a>
        </div>
</div>
<hr>
</div>
@foreach($posts as $post)
<div class="row">
        <div class="col-md-12">
            <p><strong></strong>{{$post['title']}} <a href="{{route('admin.edit',['id' =>array_search($post,$posts)])}}">Edit</a></p>
        </div>
</div>
@endforeach

@endsection
