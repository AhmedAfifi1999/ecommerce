@extends('layouts.admin')

@section('title','Categories')

@section('breadcrumb')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>
@endsection
@section('content')



    <br>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List Categories</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>ParentID</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->parent_id}}</td>
                        <td>{{$category->status}}</td>
                        <td>{{$category->created_at}}</td>
                        <td><a class="btn btn-sm btn-dark" href="{{route('categories.edit',$category->id)}}">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$categories->links()}}

        </div>
    </div>
@endsection
