@extends('frontend.app')
@section('title', 'Home Page')

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .listing-grid_heroheader .gallery-filters {
            position: absolute !important;
            top: -20px !important;
            right: 20px !important;
            border: 1px solid #eee !important;
            overflow: hidden !important;
            border-radius: 10px !important;
            padding: 6px !important;
            background: #fff !important;
            box-shadow: 0px 10px 8px 0px rgba(0, 0, 0, .04) !important;
        }

        .gallery-filters .gallery-filter-active {
            color: #666;
            background: #f9f9f9;
        }

        .gallery-filters .gallery-filter:first-child {
            border-left: 1px solid #eee;
            border-radius: 4px 0 0 4px;
        }

        .gallery-filters .btn,
        .gallery-filters a {
            float: left;
            font-size: .9em;
            text-transform: uppercase;
            cursor: pointer;
            color: #000;
            font-weight: 600;
            height: 42px;
            line-height: 42px;
            padding: 0 25px;
            border: 1px solid #eee;
            border-left: none;
            background: #fff;
            border-radius: 0;
            /* Remove default border-radius */
        }

        .gallery-filters .btn {
            background: #fff;
            /* Ensure the background matches */
            border: 1px solid #eee;
            /* Match the border style */
            cursor: pointer;
            /* Pointer cursor */
        }

        a {
            text-decoration: none;
            position: relative;
            color: #000;
        }
    </style>
@endpush
@php
  use App\Models\Property;
@endphp
@section('content')
    <div class="content">
        <div class="section hero-section home-hero-section">
            <div class="hero-section-wrap">
                <div class="hero-section-wrap-item">
                    <div class="container">
                        <div class="hero-section-container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="hero-slider-wrapper">
                                        <div class="hero-slider">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <div class="hero-carousel_item"
                                                            data-imbg="{{ asset('frontend/images/bg/8.jpg') }}">
                                                            <div class="hero-section-title hs_align-title">
                                                                <div class="hero-section-title_sub">
                                                                    Welcome to the Renstate Agency
                                                                </div>
                                                                <h2>
                                                                    Find The House of Your Dream Using
                                                                    <br />
                                                                    Our RealEstate Platform
                                                                </h2>
                                                                <h5>
                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                    adipiscing elit. Ut nec tincidunt arcu,
                                                                    sit amet fermentum sem.
                                                                </h5>
                                                                <a href="#sec1"
                                                                    class="commentssubmit csb_color custom-scroll-link"
                                                                    style="margin-top: 40px">Start Explore</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="hero-carousel_item"
                                                            data-imbg="{{ asset('frontend/images/bg/8.jpg') }}">
                                                            <div class="hero-section-title hs_align-title">
                                                                <div class="hero-section-title_sub">
                                                                    View Our Hot Offer
                                                                </div>
                                                                <h2>
                                                                    <a href="listing-single.html">House in Financial
                                                                        District</a>
                                                                </h2>
                                                                <div class="geodir-category-location">
                                                                    <a href="#4" class="map-item single-map-item"><i
                                                                            class="fas fa-map-marker-alt"></i>
                                                                        70 Bright St, Jersey City, NJ USA</a>
                                                                </div>
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                    adipiscing elit. Maecenas in pulvinar
                                                                    neque. Nulla finibus lobortis pulvina
                                                                </p>
                                                                <a href="listing-single.html"
                                                                    class="commentssubmit csb_color"
                                                                    style="margin-top: 40px">View Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="hero-carousel_item"
                                                            data-imbg="{{ asset('frontend/images/bg/9.jpg') }}">
                                                            <div class="hero-section-title hs_align-title">
                                                                <div class="hero-section-title_sub">
                                                                    Few Words About Our Agency
                                                                </div>
                                                                <h2>
                                                                    We are International <br />
                                                                    RealEstate Agency
                                                                </h2>
                                                                <h5>
                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                    adipiscing elit. Ut nec tincidunt arcu,
                                                                    sit amet fermentum sem.
                                                                </h5>
                                                                <a href="about.html"
                                                                    class="commentssubmit csb_color custom-scroll-link"
                                                                    style="margin-top: 40px">Read more about us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mob-hid">
                                    <div
                                        class="list-searh-input-wrap box_list-searh-input-wrap lws_column hero_home_search lsiw_dec">
                                        <form action="{{ route('property.search') }}" method="get"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="custom-form">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="cs-intputwrap">
                                                            <i class="fa-light fa-layer-group"></i>
                                                            <select data-placeholder="Categories"
                                                                class="chosen-select on-radius no-search-select"
                                                                name="category">
                                                                <option value="" selected>Category</option>
                                                                @foreach ($category as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="cs-intputwrap">
                                                                    <i class="fa-light fa-calendar-days"></i>
                                                                    <input type="text" class="dateInput"
                                                                        placeholder="Arrival Date" value=""
                                                                        name="postDate" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="cs-intputwrap">
                                                                    <i class="fa-light fa-calendar-days"></i>
                                                                    <input type="text" class="dateInput"
                                                                        placeholder="Departure Date" value=""
                                                                        name="rangeDate" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="cs-intputwrap">
                                                            <div class="price-range-wrap">
                                                                <label>Price Range</label>
                                                                <div class="price-rage-item">
                                                                    <input type="text" class="price-range-double"
                                                                        data-min="100" data-max="1000000" name="pricerange"
                                                                        data-step="1" value="" data-prefix="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="commentssubmit commentssubmit_fw" type="submit"> Search
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hs-scroll-down-wrap">
                            <div class="scroll-down-item">
                                <div class="mousey">
                                    <div class="scroller"></div>
                                </div>
                                <span>Scroll Down To Discover</span>
                            </div>
                            <div class="svg-corner svg-corner_white"
                                style="bottom: 0; right: -39px; transform: rotate(90deg)"></div>
                            <div class="svg-corner svg-corner_white" style="bottom: 0; left: -39px"></div>
                        </div>
                        <div class="sc-controls shc_controls2 shc_controls3 slideshow-container-pag-init"></div>
                        <div class="hs-slider-controls">
                            <div class="hs-button-prev hs-slider-button">
                                <i class="fa-solid fa-chevron-left"></i>
                            </div>
                            <div class="hs-button-next hs-slider-button">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-wrap bg-hero bg-parallax-wrap-gradien fs-wrapper">
                        <div class="hero-blur-container fs-wrapper">
                            <div class="hero-blur-container_item fs-wrapper">
                                <div class="bg" data-bg=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--section-end-->
        <!--container-->
        <div class="container">
            <!--main-content-->
            <div class="main-content ms_vir_height" id="sec1">
                <!--boxed-container-->
                <div class="boxed-container">
                    <div class="listing-grid_heroheader">
                        <h3>Browse Hot Properties</h3>
                        {{-- @if (isset($_GET['category']))
                            <div style="margin-top: 20px; font-size: 20px;">
                                You clicked : {{ $_GET['category'] }}
                            </div>
                        @endif --}}
                        <div class="gallery-filters">
                            <a href="#" class="gallery-filter gallery-filter-active" data-filter="*">All Properties</a>
                            <form action="" method="get">
                                @csrf
                                @foreach ($category as $item)
                                    <button type="submit" name="category" value="{{ $item->id }}"class="btn gallery-filter">{{ $item->name }}</button>
                                @endforeach
                            </form>
                            <a href="#" class="gallery-filter" data-filter=".cat-comercial">Comercial</a>
                        </div>
                    </div>
                    <!-- listing-grid-->
                    <div class="listing-grid gisp">
                        <!-- listing-grid-item end-->
                        <!-- listing-grid-item-->
                        @if (isset($_GET['category']))
                            @php
                              $id = $_GET['category'];
                              $propertysortbycategory = Property::with(['aminites','category'])->where('category_id',$id)->get();
                            @endphp
                            @foreach ($propertysortbycategory as $item)
                                <div class="listing-grid-item cat-sale cat-rent">
                                    <div class="listing-item">
                                        <div class="geodir-category-listing">
                                            <div class="geodir-category-img">
                                                <a href="{{ route('single.page', $item->id) }}"
                                                    class="geodir-category-img_item">
                                                    <div class="bg"
                                                        data-bg="{{ asset('uploads/backend/property/' . $item->image) }}">
                                                    </div>
                                                    <div class="overlay"></div>
                                                </a>
                                                <div class="geodir-category-location">
                                                    <a href="#4" class="map-item tolt single-map-item"
                                                        data-newlatitude="40.88496706" data-newlongitude="-73.88191222"
                                                        data-microtip-position="top" data-tooltip="On the map">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{ $item->city }}
                                                    </a>
                                                </div>
                                                <ul class="list-single-opt_header_cat">
                                                    <li><a href="#" class="cat-opt">{{ $item->accommodation }}</a></li>
                                                </ul>
                                                <a href="#" class="geodir_save-btn tolt" data-microtip-position="left"
                                                    data-tooltip="Save">
                                                    <span>
                                                        <i class="fal fa-heart"></i>
                                                    </span>
                                                </a>
                                                <div class="geodir-category-listing_media-list">
                                                    <span><i class="fas fa-camera"></i>{{ $item->category->name }}</span>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content">
                                                <h3>
                                                    <a href="{{ route('single.page', $item->id) }}">{{ $item->title }}</a>
                                                </h3>
                                                <div class="geodir-category-content_price">
                                                    $ {{ $item->price }}
                                                </div>
                                                <p>
                                                    {{ $item->details }}
                                                </p>
                                                <div class="geodir-category-content-details">
                                                    <ul>
                                                        <li>
                                                            <i class="fa-light fa-bed"></i><span>{{ $item->bedrooms }}</span>
                                                        </li>
                                                        <li>
                                                            <i
                                                                class="fa-light fa-bath"></i><span>{{ $item->bathrooms }}</span>
                                                        </li>
                                                        <li>
                                                            <i
                                                                class="fa-light fa-chart-area"></i><span>{{ $item->area }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="geodir-category-footer">
                                                <a href="" class="gcf-company"><img
                                                        src="{{ asset('frontend/images/avatar/1.jpg') }}"
                                                        alt="" /><span>{{ $item->agent->name }}</span></a>
                                                <a href="{{ route('single.page', $item->id) }}" class="gid_link"><span>View
                                                        Details</span><i class="fa-solid fa-caret-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @foreach ($property as $item)
                            <div class="listing-grid-item cat-sale cat-rent">
                                <div class="listing-item">
                                    <div class="geodir-category-listing">
                                        <div class="geodir-category-img">
                                            <a href="{{ route('single.page', $item->id) }}"
                                                class="geodir-category-img_item">
                                                <div class="bg"
                                                    data-bg="{{ asset('uploads/backend/property/' . $item->image) }}">
                                                </div>
                                                <div class="overlay"></div>
                                            </a>
                                            <div class="geodir-category-location">
                                                <a href="#4" class="map-item tolt single-map-item"
                                                    data-newlatitude="40.88496706" data-newlongitude="-73.88191222"
                                                    data-microtip-position="top" data-tooltip="On the map">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    {{ $item->city }}
                                                </a>
                                            </div>
                                            <ul class="list-single-opt_header_cat">
                                                <li><a href="#" class="cat-opt">{{ $item->accommodation }}</a></li>
                                            </ul>
                                            <a href="#" class="geodir_save-btn tolt" data-microtip-position="left"
                                                data-tooltip="Save">
                                                <span>
                                                    <i class="fal fa-heart"></i>
                                                </span>
                                            </a>
                                            <div class="geodir-category-listing_media-list">
                                                <span><i class="fas fa-camera"></i>{{ $item->category->name }}</span>
                                            </div>
                                        </div>
                                        <div class="geodir-category-content">
                                            <h3>
                                                <a href="{{ route('single.page', $item->id) }}">{{ $item->title }}</a>
                                            </h3>
                                            <div class="geodir-category-content_price">
                                                $ {{ $item->price }}
                                            </div>
                                            <p>
                                                {{ $item->details }}
                                            </p>
                                            <div class="geodir-category-content-details">
                                                <ul>
                                                    <li>
                                                        <i class="fa-light fa-bed"></i><span>{{ $item->bedrooms }}</span>
                                                    </li>
                                                    <li>
                                                        <i
                                                            class="fa-light fa-bath"></i><span>{{ $item->bathrooms }}</span>
                                                    </li>
                                                    <li>
                                                        <i
                                                            class="fa-light fa-chart-area"></i><span>{{ $item->area }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="geodir-category-footer">
                                            <a href="" class="gcf-company"><img
                                                    src="{{ asset('frontend/images/avatar/1.jpg') }}"
                                                    alt="" /><span>{{ $item->agent->name }}</span></a>
                                            <a href="{{ route('single.page', $item->id) }}" class="gid_link"><span>View
                                                    Details</span><i class="fa-solid fa-caret-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- listing-grid end-->
                </div>
                <!--boxed-container end-->
            </div>
            <!--main-content end-->
        </div>
        <!--container end-->
        <div class="dark-bg half-carousel-container">
            <div class="city-carousel-wrap">
                <div class="half-carousel-title-wrap">
                    <div class="half-carousel-title">
                        <h2>Explore Best Cities</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua.
                        </p>
                    </div>
                    <div class="abs_bg"></div>
                </div>
                <div class="city-carousel">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!--city-carousel-item-->
                            <div class="swiper-slide">
                                <div class="city-carousel-item">
                                    <div class="bg-wrap fs-wrapper">
                                        <div class="bg" data-bg="images/bg/long/1.jpg" data-swiper-parallax="10%">
                                        </div>
                                        <div class="overlay"></div>
                                    </div>
                                    <div class="city-carousel-content">
                                        <div class="hc-counter">26 Properties</div>
                                        <h3><a href="listing.html">Explore NewYork</a></h3>
                                        <p>
                                            Constant care and attention to the patients makes
                                            good record
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--city-carousel-item end-->
                            <!--city-carousel-item-->
                            <div class="swiper-slide">
                                <div class="city-carousel-item">
                                    <div class="bg-wrap fs-wrapper">
                                        <div class="bg" data-bg="{{ asset('frontend/images/bg/long/2.jpg') }}"
                                            data-swiper-parallax="10%"></div>
                                        <div class="overlay"></div>
                                    </div>
                                    <div class="city-carousel-content">
                                        <div class="hc-counter">15 Properties</div>
                                        <h3><a href="listing.html">Awesome Rome</a></h3>
                                        <p>
                                            Constant care and attention to the patients makes
                                            good record
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--city-carousel-item end-->
                            <!--city-carousel-item-->
                            <div class="swiper-slide">
                                <div class="city-carousel-item">
                                    <div class="bg-wrap fs-wrapper">
                                        <div class="bg" data-bg="{{ asset('frontend/images/bg/long/3.jpg') }}"
                                            data-swiper-parallax="10%"></div>
                                        <div class="overlay"></div>
                                    </div>
                                    <div class="city-carousel-content">
                                        <div class="hc-counter">78 Properties</div>
                                        <h3>
                                            <a href="listing.html">Elite Houses in Dubai</a>
                                        </h3>
                                        <p>
                                            Constant care and attention to the patients makes
                                            good record
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--city-carousel-item end-->
                            <!--city-carousel-item-->
                            <div class="swiper-slide">
                                <div class="city-carousel-item">
                                    <div class="bg-wrap fs-wrapper">
                                        <div class="bg" data-bg="{{ asset('frontend/images/bg/long/4.jpg') }}"
                                            data-swiper-parallax="10%"></div>
                                        <div class="overlay"></div>
                                    </div>
                                    <div class="city-carousel-content">
                                        <div class="hc-counter">32 Properties</div>
                                        <h3>
                                            <a href="listing.html">Find Dream in Paris</a>
                                        </h3>
                                        <p>
                                            Constant care and attention to the patients makes
                                            good record
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--city-carousel-item end-->
                        </div>
                    </div>
                    <div class="sc-controls city-pag-init"></div>
                </div>
            </div>
            <div class="city-carousel_controls">
                <div class="csc-button csc-button-prev">
                    <i class="fas fa-caret-left"></i>
                </div>
                <div class="csc-button csc-button-next">
                    <i class="fas fa-caret-right"></i>
                </div>
            </div>
        </div>
        <!--main-content-->
        <div class="main-content ms_vir_height">
            <!--container -->
            <div class="container">
                <div class="boxed-container">
                    <div class="boxed-content">
                        <div class="about-wrap boxed-content-item">
                            <div class="row">
                                <div class="col-lg-5">
                                    @foreach ($cms as $chooseproperty)
                                        @if ($chooseproperty->id == 1)
                                            <div class="about-title ab-hero">
                                                <h2>{{ $chooseproperty->title }}</h2>
                                                <h4>
                                                    {{ $chooseproperty->sub_title }}
                                                </h4>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="services-opions">
                                        <ul>
                                            <li>
                                                @foreach ($cms as $support)
                                                    @if ($support->id == 2)
                                                        <i class="fal fa-headset"></i>
                                                        <h4>{{ $support->title }}</h4>
                                                        <p>
                                                            {{ $support->sub_title }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </li>
                                            <li>
                                                @foreach ($cms as $useradmin)
                                                    @if ($useradmin->id == 3)
                                                        <i class="fal fa-users-cog"></i>
                                                        <h4>{{ $useradmin->title }}</h4>
                                                        <p>
                                                            {{ $useradmin->sub_title }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </li>
                                            <li>
                                                @foreach ($cms as $usability)
                                                    @if ($usability->id == 4)
                                                        <i class="fal fa-phone-laptop"></i>
                                                        <h4>{{ $usability->title }}</h4>
                                                        <p>
                                                            {{ $usability->sub_title }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    @foreach ($cms as $aboutus)
                                        @if ($aboutus->id == 5)
                                            <div class="about-img">
                                                {{-- @dd($aboutus->image_url) --}}
                                                <img src="{{ asset('uploads/backend/' . $aboutus->image_url) }}"
                                                    class="respimg" alt="" />
                                                <div class="about-img-hotifer">
                                                    <p>
                                                        {{ $aboutus->sub_title }}
                                                    </p>
                                                    <h4>{{ $aboutus->title }}</h4>
                                                    <h5>Renstate CEO</h5>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--container end-->
            <div class="parallax-section-wrap">
                <div class="bg-wrap fs-wrapper" data-scrollax-parent="true">
                    <div class="bg" data-bg="{{ asset('frontend/images/bg/works-bg.jpg') }}"
                        data-scrollax="properties: { translateY: '20%' }"></div>
                    <div class="overlay"></div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            @foreach ($cms as $howWork)
                                @if ($howWork->id == 6)
                                    <div class="parallax-section-content">
                                        <h3>{{ $howWork->title }}</h3>
                                        <p>
                                            {!! $howWork->description !!}
                                        </p>
                                        <a href="add-listing.html" class="commentssubmit csb_color"
                                            style="margin-top: 20px">Add Your Propperty</a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-8">
                            <div class="process-wrap">
                                <ul>
                                    <li>
                                        <div class="process-item">
                                            @foreach ($cms as $placeWork)
                                                @if ($placeWork->id == 7)
                                                    <span class="process-count">01 . </span>
                                                    <div class="process-item-icon">
                                                        <i class="fa-light fa-house-building"></i>
                                                    </div>
                                                    <h4>{{ $placeWork->title }}</h4>
                                                    <p>
                                                        {!! $placeWork->description !!}
                                                    </p>
                                                @endif
                                            @endforeach
                                        </div>
                                        <span class="pr-dec"></span>
                                    </li>
                                    <li>
                                        <div class="process-item">
                                            @foreach ($cms as $owner)
                                                @if ($owner->id == 8)
                                                    <span class="process-count">02 .</span>
                                                    <div class="process-item-icon">
                                                        <i class="fa-light fa-mailbox"></i>
                                                    </div>
                                                    <h4>{{ $owner->title }}</h4>
                                                    <p>
                                                        {!! $owner->description !!}
                                                    </p>
                                                @endif
                                            @endforeach
                                        </div>
                                        <span class="pr-dec"></span>
                                    </li>
                                    <li>
                                        <div class="process-item">
                                            @foreach ($cms as $owner)
                                                @if ($owner->id == 9)
                                                    <span class="process-count">03 .</span>
                                                    <div class="process-item-icon">
                                                        <i class="fa-light fa-layer-plus"></i>
                                                    </div>
                                                    <h4>{{ $owner->title }}</h4>
                                                    <p>
                                                        {!! $owner->description !!}
                                                    </p>
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--container-->
            <div class="container">
                <div class="api-wrap">
                    <div class="api-container">
                        <div class="api-img">
                            <img src="{{ asset('frontend/images/api.png') }}" alt="" class="respimg" />
                        </div>
                        <div class="api-text">
                            <h3>Discover Modern Living</h3>
                            <p>
                                In ut odio libero, at vulputate urna. Nulla tristique mi a
                                massa convallis cursus. Nulla eu mi magna. Etiam suscipit
                                commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer
                                adipiscing elit, sed diam nonu mmy nibh euismod tincidunt
                                ut laoreet dolore magna aliquam erat.
                            </p>
                            <div class="api-text-links">
                                <a href="#"><span> Discover with us</span><i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="api-wrap-bg" data-run="2">
                            <div class="api-wrap-bg-container">
                                <span class="api-bg-pin"></span><span class="api-bg-pin"></span>
                                <div class="abs_bg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="to_top-btn-wrap">
                    <div class="to-top to-top_btn">
                        <span>Back to top</span> <i class="fa-solid fa-arrow-up"></i>
                    </div>
                    <div class="svg-corner svg-corner_white" style="top: 0; left: -40px; transform: rotate(-90deg)"></div>
                    <div class="svg-corner svg-corner_white" style="top: 0; right: -40px; transform: rotate(-180deg)">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"
        integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
@endpush
