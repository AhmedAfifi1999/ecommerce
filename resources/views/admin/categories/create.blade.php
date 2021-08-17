@extends('layouts.admin')

@section('title','Categories Create')

@section('breadcrumb')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('categories.index')}}">Categories</a></li>
        <li class="breadcrumb-item active">Create</li>

    </ol>
@endsection
@section('content')



    <div class="card">
        <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
            @csrf
            @include('admin.categories._form',[
    'button'=>'Add'])
        </form>
    </div>

@endsection
