@extends('layout')
@section('body-content')
<table class="table table-bordered">
    <label for="title">Categories</label>
    <thead>
      <tr>
        <th style="width: 30px">#</th>
        <th>name</th>

      </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)

      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$category->name}}</td>

      </tr>

      @empty

      <tr>
        <td class="text-center" colspan="4">no data found</td>
      </tr>
      @endforelse

    </tbody>
  </table>

@endsection
