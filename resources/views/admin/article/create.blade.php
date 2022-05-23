@extends('layouts.sb-admin')

@section('content')

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Article</h1>
                    <p class="mb-4">This is article page for administrator.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Article</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required autocomplete="name" autofocus placeholder="title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                   <select name="category_id" class="form-control @error('category_id') is-invalid @enderror"  value="{{ old('category_id') }}" required autocomplete="name">
                                       <option value="">Choose Category</option>
                                       @foreach ($categories as $result)
                                           <option value="{{ $result->id}}">{{ $result->name}}</option>
                                       @endforeach  
                                   </select>
                                   @error('category_id')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Content</label>
                                    <textarea type="text" name="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}" required autocomplete="name"></textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success" type="submit">Create Article</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                <!-- /.container-fluid -->
@endsection
