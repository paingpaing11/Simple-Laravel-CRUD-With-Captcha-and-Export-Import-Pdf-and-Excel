@extends('layout.master')

@section('content')
    <div class="card text-lg-center">
        <h1 class="text-secondary p-2 m-2 text-decoration-underline">Employee Detail</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            {{$errors->first()}}
        </div>
        @endif
        <div class="card-body">
            <button>{{$tag->name}}</button>
            <button>{{$tag->email}}</button>
            <button>{{$tag->phone}}</button>
            <button>{{$tag->nrc}}</button>
            <button>{{$tag->position}}</button>
            <button>{{$tag->status}}</button>
            <button>{{$tag->department}}</button>
            <button>{{$tag->title}}</button>
            <button><img src="{{$tag->image}}" alt="image" width="100px" height="100px"/></button>
        </div>
    </div>
    <div class="card-text text-lg-left">
        <a href="{{route('tag.index')}}">
            <button type="button" class="btn btn-danger">Back</button>
        </a>
    </div>
@endsection
