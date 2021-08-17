@extends('layouts.admin')

@section('title','Products')

@section('breadcrumb')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Products</li>
    </ol>
@endsection
@section('content')



    <br>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List Products</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->slug}}</td>
                        <td>{{$product->category_id}}</td>
                        <td>{{$product->status}}</td>
                        <td>{{$product->created_at}}</td>
                        <td><a class="btn btn-sm btn-dark" href="{{route('products.edit',$product->id)}}">Edit</a>
                            </td>
                        <td>
                            <form action="{{route('products.destroy',$product->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
