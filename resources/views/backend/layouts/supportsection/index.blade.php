@extends('backend.app')

@section('title', 'Property')

@push('styles')
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
            <h1 class="page-title">Choose Property</h1>
        </div>
        {{-- <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mission</li>
            </ol>
        </div> --}}
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
                                            <form class="forms-sample" method="POST" action="{{ route('support.update') }}"
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
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary me-2">Submit</button>
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
        // Add new mission item
        document.getElementById('add-mission-item').addEventListener('click', function() {
            const itemIndex = document.querySelectorAll('.mission-item').length;
            const missionItem = `
                <div class="mission-item card mb-3 p-3 shadow-sm">
                    <div class="input-group-label mb-3">
                        <span class="input-group-text">Title</span>
                        <input type="text" class="form-control" name="titles[]" placeholder="Enter the title of the mission item" title="Enter the title of the mission item">
                    </div>
                    <div class="form-group mb-3">
                        <label for="short_description_${itemIndex}" class="form-label">Short Description:</label>
                        <textarea class="form-control" id="short_description_${itemIndex}" name="short_descriptions[]" placeholder="Enter a brief description of the mission item" title="Enter a brief description of the mission item"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-outline-danger remove-mission-item">
                            <i class="fas fa-trash-alt"></i> Remove
                        </button>
                    </div>
                </div>`;
            document.getElementById('mission-items-wrapper').insertAdjacentHTML('beforeend', missionItem);
            ClassicEditor.create(document.querySelector(`#short_description_${itemIndex}`))
                .catch(error => {
                    console.error(error);
                });
        });

        // Remove mission item with SweetAlert
        document.addEventListener('click', function(e) {
            if (e.target && e.target.closest('.remove-mission-item')) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to recover this item!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        e.target.closest('.mission-item').remove();
                        Swal.fire(
                            'Deleted!',
                            'Your item has been deleted.',
                            'success'
                        )
                    }
                });
            }
        });

        // Initialize CKEditor for existing short description fields
        document.querySelectorAll('textarea[id^="short_description_"]').forEach(textarea => {
            ClassicEditor.create(textarea)
                .catch(error => {
                    console.error(error);
                });
        });

        // Initialize CKEditor for the description field
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });

        // Initialize Dropify
        $(document).ready(function() {
            $('#image').dropify();

            $('#image').on('dropify.afterClear', function(event, element) {
                $('input[name="remove_image"]').val('1');
                $(element.element).dropify('resetPreview');
            });
        });
    </script>
@endpush
