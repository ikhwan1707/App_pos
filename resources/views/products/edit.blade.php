@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Form Edit Product</h3>
            </div>
            <form action="{{ route('product.update',$dataEditproduct) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT" />
                <div class="card-body">
                    <div class="form-group">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" name="product_name" class="form-control"
                            value="{{$dataEditproduct->product_name}}">
                        @if ($errors->has('product_name'))
                        <span class="text-danger">{{ $errors->first('product_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="photo" class="form-label">Foto Product</label>
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <div class="form-group">
                        @if($dataEditproduct->photo)
                        <label for="photo" class="form-label">Foto Saat ini</label>
                        <img src="{{ asset('storage/' . $dataEditproduct->photo) }}"
                            alt="{{ $dataEditproduct->product_name }}" class="img-thumbnail" width="200"></p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="category_id">Product Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $v)
                            <option value="{{ $v->category_id }}" {{ $v->category_id ==
                                $dataEditproduct->category_id ? 'selected' : '' }}>{{ $v->category_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="price">Price</label>
                        <input type="text" name="price" class="form-control" value="{{$dataEditproduct->price}}">
                        @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="stock">Stock</label>
                        <input type="text" name="stock" class="form-control" value="{{$dataEditproduct->stock}}">
                        @if ($errors->has('stock'))
                        <span class="text-danger">{{ $errors->first('stock') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="product_description">Product Description</label>
                        <textarea type="text" class="form-control" name="product_description">{{$dataEditproduct->product_description}}</textarea></br>
                        @if ($errors->has('product_description'))
                        <span class="text-danger">{{ $errors->first('product_description') }}</span>
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


