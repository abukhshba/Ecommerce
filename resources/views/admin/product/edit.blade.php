@extends('layout')
@section('body-content')
    <form action="{{ url('admin/product/update') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="form-group">
            <label for="title">name</label>
            <input type="text" class="form-control" value="{{ $product->name }}" name="name" id="name"
                placeholder="name">

            <label for="description">description</label>
            <input type="text" class="form-control" value="{{ $product->description }}" name="description"
                id="description" placeholder="write description">

            <label for="content">price</label>
            <input type="text" class="form-control" value="{{ $product->price }}" name="price" id="price"
                placeholder="price">

            <label for="name">image</label>
            <input type="file" class="form-control" value="{{ $product->image }}" name="image[]" multiple id="image"
                placeholder="">


            <div class="mb-6 ">
                <label class="block">
                    <span class="text-gray-700">Select Category</span>
                    <select name="category_id[]" multiple class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>

        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success col-12" value="save">
        </div>
    </form>
@endsection
