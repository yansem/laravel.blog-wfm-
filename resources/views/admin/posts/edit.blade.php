@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Посты</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form role="form" method="post" action="{{ route('posts.update', ['post' => $post->id]) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                       id="title"
                       placeholder="Enter title"
                value="{{ $post->title }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Цитата</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid
@enderror" rows="5" placeholder="Enter ...">{{ $post->description }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Контент</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror"
                          rows="5" placeholder="Enter ...">{{ $post->content }}</textarea>
                @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    @foreach($categories as $k => $v)
                        <option value="{{ $k }}" @if($post->category_id == $k) selected @endif>{{ $v }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Select a Tag"
                        style="width: 100%;">
                    @foreach($tags as $k => $v)
                        <option value="{{ $k }}"  @if($post->tags->contains($k)) selected @endif>{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="thumbnail">Изображение</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                        <label class="custom-file-label" for="thumbnail">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <!-- /.content -->
@endsection

