@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
    <h1>Control Structures </h1>
    @if(true)
    <p>This will only show if condition is true</p>
    @else
    <p>This will only show if condition is false </p>
    @endif
    @for($i =0;$i < 5 ; $i++)
    <p>  {{$i + 1 }} . Iteration </p>
    @endfor
    </div>
</div>
@endsection
