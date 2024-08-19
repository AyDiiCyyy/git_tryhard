@extends('layout')
@section('title', 'Thêm')
@section('content')
    <form method="POST" action="{{ route('game.store') }}" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="cover_art">
        </div>
        <div class="mb-3">
            <label class="form-label">developer</label>
            <input type="text" class="form-control" name="developer">
        </div>
        <div class="mb-3">
            <label class="form-label">release_year</label>
            <input type="text" class="form-control" name="release_year">
        </div>
        <div class="mb-3">
            <label class="form-label">genre</label>
            <input type="text" class="form-control" name="genre">
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
