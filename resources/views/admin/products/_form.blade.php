@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-info">
            {{ \Illuminate\Support\Facades\Session::get('success') }}
        </div>
    @endif

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
            <x-form-select label="Category" name="category_id" :options="$categories" :selected="$product->category_id"/>

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
            <label for="exampleInputEmail1">Product price</label>
            <input type="number" class="form-control @error('price')  is-invalid @enderror" name="price" id="price"
                   value="{{old('name',$product->price)}}"
                   placeholder="Enter price">
            @error('price')
            <label class="invalid-feedback">{{$message}}</label>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product sale price</label>
            <input type="number" class="form-control @error('sale_price')  is-invalid @enderror" name="sale_price"
                   id="sale_price"
                   value="{{old('name',$product->sale_price)}}"
                   placeholder="Enter sale_price">
            @error('sale_price')
            <label class="invalid-feedback">{{$message}}</label>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product quantity</label>
            <input type="number" class="form-control @error('quantity')  is-invalid @enderror" name="quantity"
                   id="quantity"
                   value="{{old('name',$product->quantity)}}"
                   placeholder="Enter quantity">
            @error('quantity')
            <label class="invalid-feedback">{{$message}}</label>
            @enderror
        </div>
        <div class="form-group">
            <x-form-input type="number" name="width" lable="Product width" :value="$product->width"/>

        </div>

        <div class="form-group">
            <x-form-input type="number" name="height" lable="Product height" :value="$product->height"/>

        </div>
        <div class="form-group">
            <x-form-input type="number" name="weight" lable="Product weight" :value="$product->weight"/>
        </div>

        <div class="form-group">
            <x-form-input type="number" name="length" lable="length" :value="$product->length"/>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <div class="input-group">
                <div class="custom-file">
                    <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                    <input type="file" class="custom-file-input  @error('image')  is-invalid @enderror" name="image"
                           id="image">
                    @error('image')
                    <label class="invalid-feedback">{{$message}}</label>
                    @enderror
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
