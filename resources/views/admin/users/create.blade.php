@extends('layouts.admin')

@section('title','User Create')

@section('breadcrumb')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Users</a></li>
        <li class="breadcrumb-item active">Create</li>

    </ol>
@endsection



@section('content')
    <div class="card">
        <form method="post" action="{{route('users.store')}}" >
            @csrf
            @include('admin.users._form',[
    'button'=>'Add'])
        </form>
    </div>

@endsection
