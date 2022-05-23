@extends('layouts.sb-admin')

@section('content')

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Article</h1>
                    <p class="mb-4">This is article page for administrator.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Article <strong>{{$article->title}}</strong></h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('articles.update', $article->id)}}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$article->title}}"  required>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                   <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ $article->category_id }}"  required>
                                       @foreach ($categories as $result)
                                       @if($article->category_id == $result->id)
                                           <option value="{{ $result->id}}" selected>{{ $result->name}}</option>
                                       @else
                                        <option value="{{ $result->id}}">{{ $result->name}}</option>
                                       @endif
                                       @endforeach  
                                   </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Content</label>
                                    <textarea type="text" name="content" class="form-control @error('content') is-invalid @enderror"required>{{$article->content}}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" value="{{ $article->image}}"> 
                                </div>
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success" type="submit">Update Article</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                <!-- /.container-fluid -->
@endsection
