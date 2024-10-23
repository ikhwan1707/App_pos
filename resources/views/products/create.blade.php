<h1>FORM PRODUCTS</h1>
<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label>Product Name</label>
    <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}"></br>
    @if ($errors->has('product_name'))
    <span class="label label-danger">{{ $errors->first('product_name') }}</span>
    @endif</br>
    
    <label>Foto Produk:</label>
    <input type="file" name="photo"><br>
    
    <label class="control-label col-sm-2">Product Category</label>
    <select name="category_id">
        <option value="">Select Category</option>
        @foreach ($dataCategory as $v)
        <option value="{{ $v->category_id }}" @if (old('category_id')==$v->category_id) selected @endif>{{ $v->category_name }}</option>
        @endforeach
    </select></br>
    @if ($errors->has('category_id'))
    <span class="label label-danger">{{ $errors->first('category_id') }}</span>
    @endif</br>
    
    <label>Price</label>
    <input type="text" class="form-control" name="price" value="{{ old('price') }}"></br>
    @if ($errors->has('price'))
    <span class="label label-danger">{{ $errors->first('price') }}</span>
    @endif</br>

    <label>Stock</label>
    <input type="text" class="form-control" name="stock" value="{{ old('stock') }}"></br>
    @if ($errors->has('stock'))
    <span class="label label-danger">{{ $errors->first('stock') }}</span>
    @endif</br>
    
    <label>Product Description</label>
    <textarea type="text" class="form-control" name="product_description">{{ old('product_description') }}</textarea></br>
    @if ($errors->has('product_description'))
    <span class="label label-danger">{{ $errors->first('product_description') }}</span>
    @endif</br>
    <button type="submit">Save</button>
</form>