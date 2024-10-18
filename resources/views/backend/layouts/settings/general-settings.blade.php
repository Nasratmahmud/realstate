@extends('backend.app')

@section('title', 'System Settings')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">General Settings</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">General Settings</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="post" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail" class="form-label">Mail:</label>
                                    <input type="text" class="form-control @error('mail') is-invalid @enderror"
                                        name="mail" placeholder="mail" id="mail"
                                        value="{{ old('mail', $setting->mail ?? '') }}">
                                    @error('mail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="systemName" class="form-label">meta_description</label>
                                    <input type="text" class="form-control @error('meta_description') is-invalid @enderror"
                                        name="meta_description" placeholder="System Name" id="systemName"
                                        value="{{ old('meta_description', $setting->meta_description ?? '') }}">
                                    @error('meta_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone Number:</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" placeholder="Phone Number" id="phone"
                                        value="{{ old('phone', $setting->phone ?? '') }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="system_title" class="form-label">System Title:</label>
                                    <input type="text" class="form-control @error('system_title') is-invalid @enderror"
                                        name="system_title" placeholder="system_title" id="system_title"
                                        value="{{ old('system_title', $setting->system_title ?? '') }}">
                                    @error('system_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="copyRights" class="form-label">Meta Title:</label>
                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                name="meta_title" placeholder="Copy Rights Text" id="copyRights"
                                value="{{ old('meta_title', $setting->meta_title ?? '') }}">
                            @error('meta_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="meta_description" class="form-label">Meta Description:</label>
                            <input type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description"
                                placeholder="Copy Rights Text" id="meta_description"
                                value="{{ old('meta_description', $setting->meta_description ?? '') }}">
                            @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="meta_keywords" class="form-label">Meta Keywords:</label>
                            <textarea class="form-control @error('meta_keywords') is-invalid @enderror" 
                                      id="meta_keywords" 
                                      name="meta_keywords"
                                      placeholder="Enter keywords, separated by commas">{{ old('meta_keywords', $setting->meta_keywords ?? '') }}</textarea>
                            @error('meta_keywords')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo" class="form-label">Logo:</label>
                                    <input type="hidden" name="remove_logo" value="0">
                                    <input type="file" class="dropify @error('logo') is-invalid @enderror" name="logo"
                                        id="logo"
                                        data-default-file="{{ isset($setting->logo) ? asset($setting->logo) : '' }}">
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="favicon" class="form-label">Favicon:</label>
                                    <input type="hidden" name="remove_favicon" value="0">
                                    <input type="file" class="dropify @error('favicon') is-invalid @enderror"
                                        name="favicon" id="favicon"
                                        data-default-file="{{ isset($setting->favicon) ? asset($setting->favicon) : '' }}">
                                    @error('favicon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#logo').on('dropify.afterClear', function(event, element) {
                $('input[name="remove_logo"]').val('1');
                $(element.element).dropify('resetPreview');
            });

            $('#favicon').on('dropify.afterClear', function(event, element) {
                $('input[name="remove_favicon"]').val('1');
                $(element.element).dropify('resetPreview');
            });
        });
    </script>
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Tagify for the meta keywords field
            var input = document.querySelector('textarea[name="meta_keywords"]');
            new Tagify(input, {
                delimiters: ",", // keywords separated by commas
                maxTags: 10,     // maximum number of keywords
                whitelist: [],   // optional: predefined list of keywords
                blacklist: []    // optional: list of keywords that are not allowed
            });
        });
    </script>
@endpush

@endpush
