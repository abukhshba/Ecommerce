@extends('layout')
@section('body-content')
<table style="text-align: center" class="table table-bordered">
    <label for="title">Images</label>
    <thead>
      <tr>
        <th style="width: 30px">#</th>
        <th>image</th>

      </tr>
    </thead>
    <tbody>
        @forelse($images as $image)

      <tr>
        <td>{{$image->id}}</td>
        <td><img src="{{asset($image->image)}}" alt="dsa" width="150" , height="150"></td>

      </tr>

      @empty

      <tr>
        <td class="text-center" colspan="4">no data found</td>
      </tr>
      @endforelse

    </tbody>
  </table>

@endsection
