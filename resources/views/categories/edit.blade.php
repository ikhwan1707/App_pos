@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Form Edit Category</h3>
            </div>
            <form action="{{route('category.update',$dataEditcategory->category_id)}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name"
                            value="{{$dataEditcategory->category_name}}" />
                        @if ($errors->has('category_name'))
                        <span class="text-danger">{{ $errors->first('category_name') }}</span>
                        @endif
                    </div>
                    <br class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{$dataEditcategory->description}}</textarea></br>
                    @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif</br>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection