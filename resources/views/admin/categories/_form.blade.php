


<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Category Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}"
               placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Parent</label>
        <select class="form-control" name="parent_id">
            <option value="">No parent</option>
            @foreach($parents as $parent)
                <option value="{{$parent->id}}"
                        @if($parent->id==$category->parent_id) selected @endif>{{$parent->name}}</option>

            @endforeach
        </select>


    </div>
    <div class="form-group">
        <label for="exampleInputFile">Description</label>
        <textarea class="form-control" name="description"
                  id="description">{{$category->description}}</textarea>
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
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{$button}}</button>
</div>
