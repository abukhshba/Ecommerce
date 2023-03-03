@extends('layout')
@section('body-content')
<table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>image</th>
        <th>product</th>

      </tr>
    </thead>
    <tbody>
        @forelse($images as $image)

      <tr>
        <td>{{$image->id}}</td>
        <td>{{$image->image}}</td>
        <td>{{$image->product->name}}</td>

      </tr>

      @empty

      <tr>
        <td class="text-center" colspan="4">no data found</td>
      </tr>
      @endforelse

    </tbody>
  </table>
@endsection
