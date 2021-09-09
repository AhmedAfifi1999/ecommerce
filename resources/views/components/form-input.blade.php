<label for="{{$id ?? $name}}">{{ $lable }}</label>
<input type="{{$type}}" class="form-control " name="{{$name}}" id="{{$id ?? $name}}"
       value="{{old('$name',$value??null)}}"
       placeholder="{{ $lable }}">
@error('{{$name}}')
<label class="invalid-feedback">{{$message}}</label>
@enderror
