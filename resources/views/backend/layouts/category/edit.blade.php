@extends('backend.app')

@section('title', 'edit eminities')

@section('content')
    <div class="container-fluid mt-4 mb-4">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mt-5">Category</h3>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">category</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <div class="container-fluid">
        <div class="row">
                <div class="card mt-5">
                    <div class="card-body ">
                        <form action="{{ route('categories.update', $category->id) }}" method="post" class="forms-sample">
                            @csrf
                            @method('patch')
                            <div class="form-group row mb-3">
                                <label for="name" class="form-label mb-3">Edit Category</label>
                                <input type="text"
                                    class="form-control form-control-mb border-left-0 mb-3 @error('name') is valid @enderror" name="name"
                                    value="{{ $category->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancle</a>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
