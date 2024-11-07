@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-tittle">Form Edit Customer</h3>
            </div>
            <form action="{{route('customer.update', $dataEditcustomer->customer_id)}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT" />
                <div class="card-body">
                    <div class="form-group">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" name="customer_name" class="form-control"
                            value="{{$dataEditcustomer->customer_name}}">
                        @if ($errors->has('customer_name'))
                        <span class="text-danger">{{ $errors->first('customer_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$dataEditcustomer->email}}">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" name="phone" class="form-control" value="{{$dataEditcustomer->phone}}">
                        @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="member_status" class="form-label">Member Status</label>
                        <div class="form-check">
                            <input type="radio" name="member_status" class="form-check-input" value=1 {{
                                ($dataEditcustomer->member_status == 1)?
                            'checked' : ''}}>
                            <label for="member_status" class="form-check-label">True</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="member_status" class="form-check-input" value=0 {{ ($dataEditcustomer->member_status == 0)
                            ? 'checked' :
                            ''}}>
                            <label for="member_status" class="form-check-label">False</label>
                        </div>
                        @if ($errors->has('member_status'))
                        <span class="text-danger">{{ $errors->first('member_status') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" class="form-control">{{$dataEditcustomer->address}}</textarea>
                        @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
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