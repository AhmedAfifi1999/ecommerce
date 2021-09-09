@extends('layouts.admin')

@section('title','Users')

@section('breadcrumb')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
    </ol>
@endsection


@section('content')


    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-info">
            {{ \Illuminate\Support\Facades\Session::get('success') }}
        </div>
    @endif
    <br>


    <div class="card">
        <div class="d-flex justify-content-center">
            <a class="btn btn-sm btn-outline-primary" href="{{route('users.create')}}">Create</a>

        </div>

        <div class="card-header">
            <h3 class="card-title">List Users</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th ></th>
                    <th ></th>
                </tr>
                </thead>
                <tbody style="width:100%; !important;">
                @foreach ($data as $key => $user)
                    @if($user!=\Illuminate\Support\Facades\Auth::user())

                        <tr>

                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                            </td>
                            <td>
                                <form class="display: inline; fo" action="{{route('users.destroy',$user->id)}}"
                                      method="post">
                                    @csrf @method('delete')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            {{$data->links()}}
        </div>
    </div>
@endsection
