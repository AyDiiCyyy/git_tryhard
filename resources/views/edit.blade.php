@extends('layout')
@section('title','Sửa')
@section('content')
<form method="POST" action="{{ route('game.update',$game)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
    <div class="mb-3">
      <label class="form-label">Tiêu đề</label>
      <input type="text" class="form-control" name="title" value="{{$game->title}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Ảnh</label>
      <input type="file" class="form-control" name="cover_art" value="{{$game->cover_art}}" >
    </div>
    <div class="mb-3">
      <label class="form-label">developer</label>
      <input type="text" class="form-control" name="developer" value="{{$game->developer}}">
    </div>
    <div class="mb-3">
      <label class="form-label">release_year</label>
      <input type="text" class="form-control" name="release_year" value="{{$game->release_year}}">
    </div>
    <div class="mb-3">
      <label class="form-label">genre</label>
      <input type="text" class="form-control" name="genre" value="{{$game->genre}}">
    </div>
    
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection