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
        <form method="post" action="{{route('categories.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Parent</label>
                    <select class="form-control" name="parent_id">
                        <option value="">No parent</option>
                        @foreach($parents as $parent)
                            <option value="{{$parent->id}}">{{$parent->name}}</option>

                        @endforeach
                    </select>


                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Description</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection
