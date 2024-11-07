@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-titler">Form Edit User</h3>
            </div>
            <form action="{{route('user.update',$dataEdituser->user_id)}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT" />
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$dataEdituser->name}}">
                        @if ($errors->has('name'))
                        <span class="label label-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$dataEdituser->email}}"></br>
                        @if ($errors->has('email'))
                        <span class="label label-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="role" value="Admin" {{
                                ($dataEdituser->role=="Admin")? "checked" : "" }}>
                            <label for="role" class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="role" value="Cashier" {{
                                ($dataEdituser->role=="Cashier")? "checked" : "" }}>
                            <label for="role" class="form-check-label">Cashier</label>

                        </div>
                        @if ($errors->has('role'))
                        <span class="label label-danger">{{ $errors->first('role') }}</span>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection