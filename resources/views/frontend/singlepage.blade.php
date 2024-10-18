@extends('frontend.app')
@section('title', 'single page')
@section('content')
            <div class="content">
                <!--container-->
                <div class="container">
                    <!--main-content-->
                    <div class="main-content ms_vir_height">
                        <!--boxed-container-->
                        <div class="boxed-container">
                            <div class="row">
                                <!-- pricing-column -->
                                <div class="col-lg-12">
                                    <div class="db-container">
                                        <!--dasboard-content-item-->
                                        <div class="dasboard-content-item">
                                            <div class="custom-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <!-- listsearch-input-item -->
                                                        <div class="cs-intputwrap">
                                                            <i class="fa-light fa-input-text"></i>
                                                            <input type="text" placeholder="Main Title"
                                                                value="{{ $property->title }}" />
                                                        </div>
                                                        <!-- listsearch-input-item -->
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <!-- listsearch-input-item -->
                                                        <div class="cs-intputwrap">
                                                            <i class="fa-light fa-building"></i>
                                                            <select data-placeholder="Categories"
                                                                class="chosen-select on-radius no-search-select">
                                                                <option>Appartement Types</option>
                                                                <option>Sale</option>
                                                                <option>Rent</option>
                                                                <option>Comercial</option>
                                                            </select>
                                                        </div>
                                                        <!-- listsearch-input-item -->
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="cs-intputwrap">
                                                            <i class="fa-light fa-layer-group"></i>
                                                            <select data-placeholder="Categories"
                                                                class="chosen-select on-radius no-search-select">
                                                                <option>{{ $property->category->name }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <!-- listsearch-input-item -->
                                                        <div class="cs-intputwrap">
                                                            <i class="fa-light fa-money-bill"></i>
                                                            <input type="text" placeholder="Price"
                                                                value="{{ $property->price }} " />
                                                        </div>
                                                        <!-- listsearch-input-item -->
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <!-- listsearch-input-item -->
                                                        <div class="cs-intputwrap">
                                                            <i class="fa-light fa-tags"></i>
                                                            <input type="text" placeholder="Keywords"
                                                                value="{{ $property->keywords }}" />
                                                        </div>
                                                        <!-- listsearch-input-item -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--dasboard-content-item end-->
                                        <!--dasboard-content-item-->
                                        <div class="dasboard-content-item" style="margin-top: 20px">
                                            <div class="custom-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <!-- listsearch-input-item -->
                                                        <div class="cs-intputwrap">
                                                            <i class="fa-light fa-phone-office"></i>
                                                            <input type="text" placeholder="Phone"
                                                                value="{{ $property->phone }}" />
                                                        </div>
                                                        <!-- listsearch-input-item -->
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <!-- listsearch-input-item -->
                                                        <div class="cs-intputwrap">
                                                            <i class="fa-light fa-envelope"></i>
                                                            <input type="text" placeholder="E-mail"
                                                                value="{{ $property->email }}" />
                                                        </div>
                                                        <!-- listsearch-input-item -->
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <!-- listsearch-input-item -->
                                                        <div class="cs-intputwrap">
                                                            <i class="fa-light fa-city"></i>
                                                            <select data-placeholder="All Cities"
                                                                class="chosen-select on-radius no-search-select">
                                                                <option>{{ $property->city }}</option>
                                                            </select>
                                                        </div>
                                                        <!-- listsearch-input-item end-->
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <!-- listsearch-input-item -->
                                                        <div class="cs-intputwrap">
                                                            <i class="fa-light fa-address-card"></i>
                                                            <input type="text" placeholder="Adress"
                                                                value="{{ $property->address }}" />
                                                        </div>
                                                        <!-- listsearch-input-item -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--dasboard-content-item end-->
                                        <!--dasboard-content-item-->
                                        <div class="dasboard-content-item" style="margin-top: 20px">
                                            <div class="custom-form">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <!-- listsearch-input-item -->
                                                        <video controls style="width:100%;height:400px;">
                                                            <source src="{{ asset('uploads/backend/property/'.$property->video) }}">
                                                       </video>
                                                        <!-- listsearch-input-item -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--dasboard-content-item end-->
                                        <!--dasboard-content-item-->
                                        <div class="dasboard-content-item" style="margin-top: 20px">
                                            <div class="dashboard-widget-title-single">
                                                {{-- {{ $property->details }} --}}
                                            </div>
                                            <div class="custom-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <!-- listsearch-input-item -->
                                                                <div class="cs-intputwrap">
                                                                    <i class="fa-light fa-chart-area"></i>
                                                                    <input type="text" placeholder="Area:"
                                                                        value="{{ $property->area }}" />
                                                                </div>
                                                                <!-- listsearch-input-item -->
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <!-- listsearch-input-item -->
                                                                <div class="cs-intputwrap">
                                                                    <i class="fa-light fa-bed"></i>
                                                                    <input type="text" placeholder="Bedrooms:"
                                                                        value="{{ $property->bedrooms }}" />
                                                                </div>
                                                                <!-- listsearch-input-item -->
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <!-- listsearch-input-item -->
                                                                <div class="cs-intputwrap">
                                                                    <i class="fa-light fa-bath"></i>
                                                                    <input type="text" placeholder="Bethrooms:"
                                                                        value="{{ $property->bathrooms }}" />
                                                                </div>
                                                                <!-- listsearch-input-item -->
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <!-- listsearch-input-item -->
                                                                <div class="cs-intputwrap">
                                                                    <i class="fa-light fa-car"></i>
                                                                    <input type="text" placeholder="Parking:"
                                                                        value="{{ $property->parking }}" />
                                                                </div>
                                                                <!-- listsearch-input-item -->
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <!-- listsearch-input-item -->
                                                                <div class="cs-intputwrap">
                                                                    <i class="fa-light fa-users"></i>
                                                                    <input type="text" placeholder="Accomodation:"
                                                                        value="{{ $property->accommodation }}" />
                                                                </div>
                                                                <!-- listsearch-input-item -->
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <!-- listsearch-input-item -->
                                                                <div class="cs-intputwrap">
                                                                    <i class="fa-light fa-globe-pointer"></i>
                                                                    <input type="text" placeholder="Web site:"
                                                                        value="{{ $property->website }}" />
                                                                </div>
                                                                <!-- listsearch-input-item -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="cs-intputwrap">
                                                            <textarea name="comments" id="comments" cols="40" rows="3" placeholder="Property Details:">{{ $property->details }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="dashboard-widget-title-single">
                                                            Amenities:
                                                        </div>
                                                        <ul class="filter-tags no-list-style ds-tg">
                                                            @foreach ($property->aminites as $aminity)
                                                                <li>
                                                                    <input id="check-aaa5" type="checkbox" name="check"
                                                                        checked="" />
                                                                    <label for="check-aaa5">{{ $aminity->name }}</label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="dashboard-widget-title-single">
                                                            Upload Plans and Brochure:
                                                        </div>
                                                        <!-- listsearch-input-item -->
                                                        <form class="fuzone">
                                                            <div class="fu-text">
                                                                <span><i class="fa-light fa-cloud-arrow-up"></i>
                                                                    Click here or drop files to upload</span>
                                                                <div class="photoUpload-files fl-wrap"></div>
                                                            </div>
                                                            <input type="file" class="upload" multiple />
                                                        </form>
                                                        <!-- listsearch-input-item -->
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="commentssubmit" style="margin-top: 10px">
                                                <span>Save Property Changes </span>
                                            </button>
                                        </div>
                                        <!--dasboard-content-item end-->
                                    </div>
                                </div>
                                <!-- pricing-column end-->
                            </div>
                            <div class="limit-box"></div>
                        </div>
                        <!--boxed-container end-->
                    </div>
                    <!--main-content end-->
                    <div class="to_top-btn-wrap">
                        <div class="to-top to-top_btn">
                            <span>Back to top</span> <i class="fa-solid fa-arrow-up"></i>
                        </div>
                        <div class="svg-corner svg-corner_white" style="top: 0; left: -40px; transform: rotate(-90deg)">
                        </div>
                        <div class="svg-corner svg-corner_white" style="top: 0; right: -40px; transform: rotate(-180deg)">
                        </div>
                    </div>
                </div>
          </div>
@endsection
       