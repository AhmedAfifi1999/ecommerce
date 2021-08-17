@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @enderror


    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" class="form-control @error('name')  is-invalid @enderror" name="name" id="name"
                   value="{{old('name',$product->name)}}"
                   placeholder="Enter Name">
            @error('name')
            <label class="invalid-feedback">{{$message}}</label>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Category</label>
            <select class="form-control" name="category_id">
                <option value="">No parent</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if(old('category_id',$category->id)==$product->id) selected @endif>{{$category->name}}</option>

                @endforeach
            </select>


        </div>
        <div class="form-group">
            <label for="exampleInputFile">Description</label>
            <textarea class="form-control @error('description') is-invalid  @enderror " name="description"
                      id="description">{{ old('description',$product->description) }}</textarea>
            @error('description')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image_path" id="image_path">
                    <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Status</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio1" value="active"
                       @if(old('status',$product->status) =='Active') checked @endif
                       name="status">
                <label for="customRadio1" class="custom-control-label">Active</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio2" value="draft"
                       @if(old('status',$product->status) =='draft') checked @endif
                       name="status">
                <label for="customRadio2" class="custom-control-label">Draft</label>
                @error('status')
                <label class="invalid-feedback">{{$message}}</label>
                @enderror
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{$button}}</button>
    </div>
