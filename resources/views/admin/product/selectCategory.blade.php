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

                                <label class="" for="name">Select Product</label>
                                <div class="mb-6 ">
                                <select name="doctor_id[]"  class="form-control">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>

                                </div><label class="" for="name">Select Category</label>
                                <div class="mb-6 ">
                                <select name="categoriesId[]" multiple class="form-control">
                                    @foreach ($allcategories as $allcategory)
                                        <option value="{{ $allcategory->id }}">{{ $allcategory->name }}</option>
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
