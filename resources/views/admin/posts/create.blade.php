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
        <form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                           id="title"
                           placeholder="Enter title">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Цитата</label>
                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                </div>
                <div class="form-group">
                    <label for="content">Контент</label>
                    <textarea name="content" id="content" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Категория</label>
                    <select class="form-control" name="category" id="category">
                        @foreach($categories as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tag">Tags</label>
                    <select name="tag" id="tag" class="select2" multiple="multiple" data-placeholder="Select a Tag"
                            style="width: 100%;">
                        @foreach($tags as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
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

