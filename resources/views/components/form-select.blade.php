@if(isset($label))
    <label for="{{$id ?? $name}}">{{$label}}</label>
@endif
<select class="form-control @error('$name')  is-invalid @enderror" name="{{$name}}">
    <option value="">Select {{$label}}</option>
    @foreach($options as $value => $text)
        <option value="{{$value}}"
                @if(old('{{$name}}',($selected??null))==$value) selected @endif>{{$text}}</option>
    @endforeach
    @error('$name')
    <p class="invalid-feedback">{{$message}}</p>
    @enderror

</select>
