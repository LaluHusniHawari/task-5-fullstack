@extends('layouts.sb-admin')

@section('content')
          
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Artice</h1>
                    <p class="mb-4">This is artice page for administrator.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Artice</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Content</th>
                                            <th>Image</th>
                                            <th>Editing</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $result)
                                        <tr>
                                            <td>{{$result->title}}</td>
                                            <td>{{$result->category->name}}</td>
                                            <td>{{$result->content}}</td>
                                            <td>{{$result->image}}</td>
                                            <td><a href="{{route('articles.edit', $result->id)}}" class="btn btn-sm btn-info">Edit</a></td>
                                            <td>
                                                <form action="{{route('articles.destroy', $result->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>    
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

      
@endsection
