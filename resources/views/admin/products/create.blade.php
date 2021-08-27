@extends('layouts.admin')

@section('title','Products Create')

@section('breadcrumb')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Products</a></li>
        <li class="breadcrumb-item active">Create</li>

    </ol>
@endsection


@section('content')
    <div class="card">
        <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
            @csrf
            @include('admin.products._form',[
    'button'=>'Add'])
        </form>
    </div>

@endsection
