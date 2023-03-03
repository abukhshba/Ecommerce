@extends('layout')
@section('body-content')
    <table  style="text-align: center" class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">Id</th>
                <th>name</th>
                <th>description</th>
                <th>price</th>
                <th>image</th>
                <th>category</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>

                        <td><a href="{{route('product.image', $product->id) }}" class="btn btn-success">show images</a></td>
                       
                    <td><a href="{{route('product.category', $product->id) }}" class="btn btn-success">show categories</a></td>

                    <td><a style="margin-right: 4px" class="btn btn-info" href="{{ url("admin/product/edit/$product->id") }}">update</a>
                    <a style="margin-left: 4px" class="btn btn-danger" href="{{ url("admin/product/delete/$product->id") }}">delete</a></td>
                </tr>
                @empty

                <tr>
                  <td class="text-center" colspan="6">no data found</td>
                </tr>
                @endforelse
        </tbody>
    </table>
    <br>
    {{ $products->links() }}

@endsection
