@extends('layouts.admin')

@section('title','Products')

@section('breadcrumb')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Products</li>
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
            <a class="btn btn-sm btn-outline-primary" href="{{route('products.create')}}">Restore all</a>
            <a class="btn btn-sm btn-outline-dark" href="{{route('products.trash')}}">Delete All</a>

        </div>

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

                        <td><img src="{{$product->image_url}}" width="100"></td>
                        {{--                        <td><img src="{{$product->image_path}}" width="100" height="100"></td>--}}
                        <td>{{$product->name}}</td>
                        <td>{{$product->slug}}</td>
                        <td>{{$product->category_id}}</td>
                        <td>{{$product->status}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>

                            <form action="{{route('products.restore',$product->id)}}" method="post">
                                @csrf
                                @method('put')
                                <button class="btn btn-sm btn-warning">Restore</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('products.force-delete',$product->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$products->links()}}
        </div>
    </div>
@endsection
