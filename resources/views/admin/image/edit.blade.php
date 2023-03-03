@extends('layout')
@section('body-content')
    <form action="{{ url('admin/category/update') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $image->id }}">
        <div class="form-group">
            <label for="name">image</label>
            <input type="file" class="form-control mb-6" value="{{ $image->image }} name="image[]" multiple id="image" placeholder="">

            <label class="" for="name">Select Product</label>
            <div class="mb-6 ">
            <select name="product_id" class="form-control">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>

            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success col-12" value="save">
        </div>
    </form>
@endsection
