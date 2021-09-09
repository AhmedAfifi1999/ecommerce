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
        <x-form-input type="text" name="name" lable="User Name" :value="$user->name"/>

    </div>

    <div class="form-group">
        <x-form-input type="email" name="email" lable="Email" :value="$user->email"/>

    </div>
    <div class="form-group">
        <x-form-select label="Role" name="roles" :options="$roles" :selected="$userRole[0]"/>
    </div>
    <div class="form-group">
        <x-form-input type="password" name="password" lable="Password" />
    </div>

    <div class="form-group">
        <x-form-input type="password" name="confirm-password" lable="Confirm Password" />
    </div>


</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{$button}}</button>
</div>
