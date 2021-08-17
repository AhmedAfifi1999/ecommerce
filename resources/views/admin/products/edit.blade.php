@extends('layouts.admin')

@section('title','Products Edit')

@section('breadcrumb')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Categories</a></li>
        <li class="breadcrumb-item active">Edit</li>

    </ol>
@endsection
@section('content')

    <div class="card">
        <form method="post" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('admin.products._form',[
    'button'=>'Update'])
        </form>
    </div>

@endsection
