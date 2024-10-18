@extends('backend.app')

@section('title', 'Property')

@section('content')

    <div class="container-fluid mt-4 mb-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mt-5">Property Create Form</h3>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">property</li>
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
                    <form action="{{ route('property.store') }}" method="POST" class="forms-sample"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-grop row mb-3">
                            <div class="col col-md-4 ">
                                <label class="form-lable" for="title">Property Title:</label>
                                <input type="text"
                                    class="form-control mb-3 form-control-md border-left-0
                                        @error('title') is valid @enderror"
                                    placeholder="Title" id='title' name="title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col col-md-4">
                                <label class="form-lable" for="city">City:</label>
                                <input type="text"
                                    class="form-control mb-3 form-control-md border-left-0
                                        @error('city') is valid @enderror"
                                    placeholder="city" id='city' name="city">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col col-md-4">
                                <label class="form-lable" for="area">Property Area:</label>
                                <input type="text"
                                    class="form-control mb-3 form-control-md border-left-0
                                        @error('area') is valid @enderror"
                                    placeholder="area" id='area' name="area">
                                @error('area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grop row mb-3">
                            <div class="col col-md-4">
                                <label class="form-lable" for="bedrooms">Bedrooms:</label>
                                <input type="text"
                                    class="form-control mb-3 form-control-md border-left-0
                                        @error('bedrooms') is valid @enderror"
                                    placeholder="bedrooms" id='bedrooms' name="bedrooms">
                                @error('bedrooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col col-md-4">
                                <label class="form-lable" for="bathrooms">Bathrooms:</label>
                                <input type="text"
                                    class="form-control mb-3 form-control-md border-left-0
                                        @error('bathrooms') is valid @enderror"
                                    placeholder="bathrooms" id='bathrooms' name="bathrooms">
                                @error('bathrooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col col-md-4">
                                <label class="form-lable" for="accommodation">Accommodation:</label>
                                <input type="text"
                                    class="form-control mb-3 form-control-md border-left-0
                                        @error('accommodation') is valid @enderror"
                                    placeholder="accommodation" id='accommodation' name="accommodation">
                                @error('accommodation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grop row mb-3">
                            <div class="col col-md-12">
                                <label class="form-lable" for="details">Property Details:</label>
                                <textarea name="details" id="summernote" cols="30" rows="10" class="form-control mb-3 form-control-md border-left-0
                                @error("details") is vaild @enderror"></textarea>
                                @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grop row mb-3">
                            <div class="col col-md-12">
                                <label class="form-lable" for="subdetail">Sub details:</label>
                                <textarea name="subdetail" id="summernote" cols="30" rows="10" class="form-control mb-3 form-control-md border-left-0
                                @error('subdetail') is valid @enderror"></textarea>
                                @error("subdetail")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grop row mb-3">
                            <div class="col col-md-12">
                                <label class="form-lable" for="subsubdetails">Property Sub sub details:</label>
                                <textarea name="subsubdetails" id="summernote" cols="30" rows="10" class="form-control mb-3 form-control-md border-left-0
                                @error('subsubdetails') is valid @enderror"></textarea>
                                @error('subsubdetails')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grop row mb-3">
                            <div class="col col-md-4">
                                <label class="form-lable" for="price">Property Price:</label>
                                <input type="text"
                                    class="form-control mb-3 form-control-md border-left-0
                                        @error('price') is valid @enderror"
                                    placeholder="price" id='price' name="price">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col col-md-4">
                                <label class="form-lable" for="phone">Agent phone:</label>
                                <input type="text"
                                    class="form-control mb-3 form-control-md border-left-0
                                        @error('phone') is valid @enderror"
                                    placeholder="Title" id='phone' name="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col col-md-4">
                                <label class="form-lable" for="email">Agent email:</label>
                                <input type="text"
                                    class="form-control mb-3 form-control-md border-left-0
                                        @error('email') is valid @enderror"
                                    placeholder="email" id='email' name="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grop row mb-3">
                            <div class="col col-md-9">
                                <label class="form-lable" for="aminity">Aminities:</label>
                                    <div class="col form-check">
                                        @foreach ($aminities as $aminity)
                                        <input type="checkbox" name="aminity_id[]" class="form-check-input mb-3
                                         @error('aminity') is valid @enderror" value="{{ $aminity->id }}">
                                        <label class="form-check-label">{{ $aminity->name }}</label>.
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                    </div>
                                @error('aminity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col col-md-3">
                                <label class="form-lable" for="category">Property Category:</label>
                                <div id="myModal" class="" tabindex="" role="dialog" aria-hidden="true">
                                    <select id="mySelect2" name="category_id">
                                        @foreach ($categories as $category)
                                          <option selected="" value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grop row mb-3">
                            <div class="col col-md-12">
                                <label class="form-lable" for="address">Agent address:</label>
                                <textarea name="address" id="summernote" cols="30" rows="10" class="form-control mb-3 form-control=-md border-left-0"
                                @error('address') is valid @enderror></textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="col col-md-12 mb-3">
                                <label class="form-lable" for="address">Property Image:</label>
                                <input type="file"
                                    class="form-control dropify mb-3 form-control-md border-left-0
                                        @error('image') is valid @enderror"
                                    placeholder="image" id='image' name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col col-md-12 mb-3">
                                <label class="form-lable" for="address">Property Video:</label>
                                <input type="file"
                                    class="form-control dropify mb-3 form-control-md border-left-0
                                        @error('video') is valid @enderror"
                                    placeholder="video" id='video' name="video" >
                                @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ route('property.index') }}" class="btn btn-danger">Cancle</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
         $('#mySelect2').select2({
             dropdownParent: $('#myModal'),
                selectOnClose: true,
        });
        $(document).ready(function() {
            $('#image').dropify();

            $('#image').on('dropify.afterClear', function(event, element) {
                $('input[name="remove_image"]').val('1');
                $(element.element).dropify('resetPreview');
            });
        });
        $(document).ready(function() {
            $('#video').dropify();

            $('#video').on('dropify.afterClear', function(event, element) {
                $('input[name="remove_image"]').val('1');
                $(element.element).dropify('resetPreview');
            });
        });
    </script>
@endpush
