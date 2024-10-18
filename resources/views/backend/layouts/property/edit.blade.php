@extends('backend.app')

@section('title', 'edit property')

@section('content')
 <div class="container-fluid mt-4 mb-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mt-5">Property</h3>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Property</li>
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
                    <form action="{{ route('property.update', $property->id) }}" method="post" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-grop row mb-3">
                            <div class="col col-md-4 ">
                                <label class="form-lable" for="title">Property Title:</label>
                                <input type="text"
                                    class="form-control mb-3 form-control-md border-left-0
                                        @error('title') is valid @enderror"
                                    placeholder="Title" id='title' name="title" value="{{old('title' , $property->title) }}">
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
                                    placeholder="city" id='city' name="city" value="{{old('city' , $property->city) }}">
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
                                    placeholder="area" id='area' name="area" value="{{ old('area', $property->area) }}">
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
                                    placeholder="bedrooms" id='bedrooms' name="bedrooms" value="{{ old('bedrooms',$property->bedrooms) }}">
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
                                        @error('bathrooms') is-valid @enderror"
                                    placeholder="bathrooms" id='bathrooms' name="bathrooms" value="{{old('bathrooms',$property->bathrooms) }}">
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
                                        @error('accommodation') is-valid @enderror"
                                    placeholder="accommodation" id='accommodation' name="accommodation" value="{{old('accommodation',$property->accommodation)}}">
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
                                @error("details") is-vaild @enderror">{{old('details',$property->details) }}</textarea>
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
                                @error('subdetail') is-valid @enderror">{{old('subdetail' , $property->subdetails)}}</textarea>
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
                                @error('subsubdetails') is-valid @enderror">{{old('subsubdetails' , $property->subsubdetails)}}</textarea>
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
                                        @error('price') is-valid @enderror"
                                    placeholder="price" id='price' name="price" value="{{old('price', $property->price)}}">
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
                                        @error('phone') is-valid @enderror"
                                    placeholder="Title" id='phone' name="phone" value="{{old('phone',$property->phone)}}">
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
                                        @error('email') is-valid @enderror"
                                    placeholder="email" id='email' name="email" value = "{{old('email', $property->email) }}">
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
                                            <div class="d-inline-block p-3">
                                                <input type="checkbox" name="aminity_id[]" class="form-check-input mb-3
                                                    @error('aminity') is-invalid @enderror" value="{{ $aminity->id }}"
                                                    {{ $property && $property->aminites->contains('id', $aminity->id) ? 'checked' : '' }}>
                                                <label class="form-check-label">{{ $aminity->name }}</label>
                                            </div>
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
                                    <select id="" name="category_id">
                                        @foreach ($categories as $category)
                                          <option value="{{ $category->id }}" {{ $property->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                @error('address') is valid @enderror>{{ old('address') or '' }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grop row mb-3">
                            <div class="col col-md-12 mb-3">
                                <label class="form-lable" for="address">Property Image:</label>
                                <input type="file"
                                    class="form-control dropify mb-3 form-control-md border-left-0
                                        @error('image') is valid @enderror"
                                    placeholder="image" id='image' name="image" data-default-file="{{ asset('uploads/backend/property/'.$property->image) }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grop row mb-3">
                            <div class="col col-md-12 mb-3">
                                <label class="form-lable" for="address">Property video:</label>
                                <input type="file"
                                    class="form-control dropify mb-3 form-control-md border-left-0
                                        @error('video') is valid @enderror"
                                    placeholder="video" id='video' name="video">
                                @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                         
                        </div>
                        <div  class="form-grop row mb-3">
                            <video controls style="width:300px;height:100px;">
                                <source src="{{ asset('uploads/backend/property/'.$property->video) }}">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        <a href="{{ route('property.index') }}" class="btn btn-danger">Cancle</a>
                       </div>
                    </form>
                </div>
            </div>
    </div>
</div>

@endsection
