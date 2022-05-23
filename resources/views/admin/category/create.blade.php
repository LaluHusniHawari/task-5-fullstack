@extends('layouts.sb-admin')

@section('content')

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Category</h1>
                    <p class="mb-4">This is category page for administrator.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('categories.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="category name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success" type="submit">Create Category</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                <!-- /.container-fluid -->
@endsection
