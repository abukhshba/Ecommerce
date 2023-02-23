@extends('layout')
@section('body-content')

        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Post Create') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ url('admin/product/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="name">

                                <label for="name">description</label>
                                <input type="text" class="form-control" name="description" id="description"
                                    placeholder="write short description">

                                <label for="name">price</label>
                                <input type="text" class="form-control" name="price" id="price"
                                    placeholder="article here">

                                <label for="name">image</label>
                                <input type="file" class="form-control mb-6" name="image[]" multiple id="image" placeholder="">


                                <label class="" for="name">Select Category</label>
                                <div class="mb-6 ">
                                <select name="category_id[]" multiple class="form-control">
                                    @foreach ($allcategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                </div>


                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success col-12" value="save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
