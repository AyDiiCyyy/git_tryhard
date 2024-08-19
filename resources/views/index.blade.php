@extends('layout')
@section('title','List')
@section('content')
<a href="{{ route('game.create') }}" class="btn btn-primary">Thêm</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tiêu đề</th>
        <th scope="col">Ảnh</th>
        <th scope="col">developer</th>
        <th scope="col">release_year</th>
        <th scope="col">genre</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($game as $data )
        <tr>
          <th scope="row">{{$data->id}}</th>
          <td>{{$data->title}}</td>
          <td><img src="{{ asset('storage') }}/{{$data->cover_art}}"  alt="" width="100"></div></td>
          <td>{{$data->developer}}</td>
          <td>{{$data->release_year}}</td>
          <td>{{$data->genre}}</td>
          <td>
              <a href="{{ route('game.edit', $data) }}" class="btn btn-primary">Sửa</a>
              <form action="{{ route('game.destroy', $data) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger">Xóa</button>
              </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection