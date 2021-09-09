@extends('layouts.admin')

@section('title','User Edit')

@section('breadcrumb')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Users</a></li>
        <li class="breadcrumb-item active">edit</li>

    </ol>
@endsection



@section('content')
    <div class="card">
        <form method="post" action="{{route('users.update',$user->id)}}" >
            @csrf
            @method('put')
            @include('admin.users._form',[
    'button'=>'Add'])
        </form>
    </div>

@endsection
