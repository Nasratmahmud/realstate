@extends('backend.app')

@section('title', 'Property')

@push('styles')

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">


    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 160px;
        }

        .input-group-label {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .input-group-label .input-group-text {
            flex: 0 0 auto;
            width: auto;
            max-width: 150px;
            text-align: right;
        }

        .input-group-label .form-control {
            flex: 1;
            min-width: 0;
        }

        .mission-item {
            margin-bottom: 1rem;
            border: 1px solid #000000;
            border-radius: 0.25rem;
        }
    </style>
@endpush

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">About Property</h1>
        </div>
    </div>
    {{-- PAGE-HEADER --}}

    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    {{-- Page contant here --}}
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        {{-- <h4 class="card-title">Property Setting</h4> --}}
                                        <p class="card-description">Setup your property, please <code>provide your valid
                                                data</code>.</p>
                                        <div class="mt-4">
                                            <form class="forms-sample" method="POST" action="{{ route('about.update') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="col mb-3">
                                                    <label>Title:</label>
                                                    <input type="text"
                                                        class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                                        placeholder="Title" name="title"
                                                        value="{{ old('title', $cms->title) }}">
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col mb-3">
                                                    <label>Sub Title:</label>
                                                    <input type="text"
                                                        class="form-control form-control-md border-left-0 @error('sub_title') is-invalid @enderror"
                                                        placeholder="Sub Title" name="sub_title"
                                                        value="{{ old('sub_title', $cms->sub_title) }}">
                                                    @error('sub_title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="image" class="form-lable text-uppercase">Image <span class="text-danger">*</span>(max-size-3MB)</label>
                                                    <input type="file" id="image" class="form-control form-control-md border-left-0 dropify" name="image"  data-default-file="{{ asset('uploads/backend/'.$cms->image_url) }}">
                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="icon" class="form-lable text-uppercase">Icon <span class="text-danger">*</span>(jpg, jpeg, png)</label>
                                                    <input type="file" id="icon" class="form-control form-control-md border-left-0 dropify" name="icon"  data-default-file="{{ asset('uploads/backend/'.$cms->image_icon) }}">
                                                    @error('icon')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary me-3">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#image').dropify();

            $('#image').on('dropify.afterClear', function(event, element) {
                $('input[name="remove_image"]').val('1');
                $(element.element).dropify('resetPreview');
            });
        });
        $(document).ready(function() {
            $('#icon').dropify();

            $('#icon').on('dropify.afterClear', function(event, element) {
                $('input[name="remove_image"]').val('1');
                $(element.element).dropify('resetPreview');
            });
        });
    </script>
@endpush
