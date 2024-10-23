<h1>Form User</h1>
<form action="{{route('user.store')}}" method="POST">
    {{ csrf_field() }}
    Name : <input type="text" name="name" value="{{old('name')}}"></br>
    @if ($errors->has('name'))
    <span class="label label-danger">{{ $errors->first('name') }}</span>
    @endif</br>

    Email : <input type="email" name="email" value="{{old('email')}}"></br>
    @if ($errors->has('email'))
    <span class="label label-danger">{{ $errors->first('email') }}</span>
    @endif</br>

    Password : <input type="password" name="password" value="{{old('password')}}"></br>
    @if ($errors->has('password'))
    <span class="label label-danger">{{ $errors->first('password') }}</span>
    @endif</br>

    Role : <input type="radio" name="role" value="Admin" checked>Admin
    <input type="radio" name="role" value="Cashier">Cashier</br>
    @if ($errors->has('role'))
    <span class="label label-danger">{{ $errors->first('role') }}</span>
    @endif</br>
    <button type="submit">Save</button>
</form>