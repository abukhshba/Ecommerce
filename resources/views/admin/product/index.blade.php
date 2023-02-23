@extends('layout')
@section('body-content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>name</th>
                <th>description</th>
                <th>price</th>
                <th>image</th>
                <th>category</th>
                <th>update</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{$product->image}}</td>
                    <td><a href="{{route('product.category', $product->id) }}" class="btn btn-success">show categories</a></td>

                    <td><a class="btn btn-info" href="{{ url("admin/product/edit/$product->id") }}">update</a></td>
                    <td><a class="btn btn-danger" href="{{ url("admin/product/delete/$product->id") }}">delete</a></td>
                </tr>
                @empty

                <tr>
                  <td class="text-center" colspan="6">no data found</td>
                </tr>
                @endforelse
        </tbody>
    </table>
@endsection
