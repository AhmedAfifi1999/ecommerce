@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @enderror

    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-info">
            {{ \Illuminate\Support\Facades\Session::get('success') }}
        </div>
    @endif



    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control @error('name')  is-invalid @enderror" name="name" id="name"
                   value="{{old('name',$category->name)}}"
                   placeholder="Enter Name">
            @error('name')
            <label class="invalid-feedback">{{$message}}</label>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Parent</label>
            <select class="form-control" name="parent_id">
                <option value="">No parent</option>
                @foreach($parents as $parent)
                    <option value="{{$parent->id}}"
                            @if(old('parent_id',$parent->id)==$category->parent_id) selected @endif>{{$parent->name}}</option>

                @endforeach
            </select>


        </div>
        <div class="form-group">
            <label for="exampleInputFile">Description</label>
            <textarea class="form-control @error('description') is-invalid  @enderror " name="description"
                      id="description">{{ old('description',$category->description) }}</textarea>
            @error('description')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <div class="input-group">
                <div class="custom-file">
                    <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                    <input type="file" class="custom-file-input  @error('image_path')  is-invalid @enderror""
                    name="image_path" id="image_path">
                    @error('image_path')
                    <label class="invalid-feedback">{{$message}}</label>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Status</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio1" value="active"
                       @if(old('status',$category->status) =='Active') checked @endif
                       name="status">
                <label for="customRadio1" class="custom-control-label">Active</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio2" value="draft"
                       @if(old('status',$category->status) =='draft') checked @endif
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
