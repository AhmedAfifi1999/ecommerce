@extends('layouts.admin')

@section('title','Categories Edit')

@section('breadcrumb')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('categories.index')}}">Categories</a></li>
        <li class="breadcrumb-item active">Edit</li>

    </ol>
@endsection
@section('content')

    <div class="card">
        <form method="post" action="{{route('categories.update',$category->id)}}">
            @csrf

            @include('admin.categories._form',[
    'button'=>'Update'])
        </form>
    </div>

@endsection
