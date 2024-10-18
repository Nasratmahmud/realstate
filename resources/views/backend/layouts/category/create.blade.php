@extends('backend.app')

@section('title', 'Category')

@section('content')

 <div class="container-fluid mt-4 mb-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mt-5">Category Create Form</h3>
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
<div class="container-flex">
    <div class="row">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <div class="form-grop row mb-3">
                                <div class="col">
                                    <label class="form-lable" for="name">Category Name:</label>
                                    <input type="text"
                                        class="form-control mb-3 form-control-md border-left-0
                                    @error('name') is valid @enderror"
                                        placeholder="Category Name" id='name' name="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancle</a>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
