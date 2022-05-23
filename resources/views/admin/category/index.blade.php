@extends('layouts.sb-admin')

@section('content')
          
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Category</h1>
                    <p class="mb-4">This is category page for administrator.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Category</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Editing</th>
                                            <th>Deleting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $result)
                                        <tr>
                                            <td>{{$result->name}}</td>
                                            <td><a href="{{route('categories.edit', $result->id)}}" class="btn btn-sm btn-info">Edit</a></td>
                                            <td>
                                                <form action="{{route('categories.destroy', $result->id)}}" method="POST">
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
