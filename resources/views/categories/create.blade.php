<h1>Form Category</h1>
<form action="{{route('category.store')}}" method="POST">
    {{ csrf_field() }}
    Category Name : <input type="text" name="category_name" value="{{ old('category_name') }}"/></br>
    @if ($errors->has('category_name'))
    <span class="label label-danger">{{ $errors->first('category_name') }}</span>
    @endif</br>
    Description : <textarea name="description">{{ old('description') }}</textarea></br>
    @if ($errors->has('description'))
    <span class="label label-danger">{{ $errors->first('description') }}</span>
    @endif</br>
    <button type="submit">Save</button>
</form>