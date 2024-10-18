@extends('frontend.app')
@section('title','Home Page')

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@php
// dd($category);
    use App\Models\Category;
    use App\Models\Property;
        $addvanceCategory = '';
        $addvanceCategory = Category::get();
        $allproperty = Property::get();
        $array = explode(';', $urlPrice);
        $minPrice = $array[0];
        $maxPrice = $array[1];
@endphp
@section('content')
  <div class="content">
    <div class="section hero-section home-hero-section">
      <div class="hero-section-wrap">
        <div class="hero-section-wrap-item">
      <!--container-->
            <div class="container">
              <!--breadcrumbs-list-->
              <div class="breadcrumbs-list bl_flat">
                  <a href="#">Home</a><a href="#">Advance Search</a>
                  <div class="breadcrumbs-list_dec">
                      <i class="fa-thin fa-arrow-up"></i>
                  </div>
              </div>
      <!--breadcrumbs-list end-->
              <!--main-content-->
              <div class="main-content">
                  <!--boxed-container-->
                  <div class="boxed-container">
                      <div class="show-mob-filter">
                          <i class="far fa-sliders-h"></i> Search Filters
                      </div>
                      <!-- list-searh-input-wrap-->
                      <div class="list-searh-input-wrap box_list-searh-input-wrap lws_mobile lsw_mb-btn">
                          <div class="close_mob-filter cmf">
                              <i class="fa-regular fa-xmark"></i>
                          </div>
                          <div class="list-searh-input-wrap-title_wrap">
                              <div class="list-searh-input-wrap-title">
                                  <i class="far fa-sliders-h"></i><span> Advance Search Filters</span>
                              </div>
                          </div>
                          <form action="http://127.0.0.1:8000/advance/search" method="post">
                              <input type="hidden" name="_token" value="r7ljMe7YecZyK6egPG34Otq4DCcSXgnJT9UdWx9a" autocomplete="off">                       
                               <div class="custom-form">
                                  <div class="row">
                                      <!-- listsearch-input-item -->
                                      <!-- listsearch-input-item -->
                                      <div class="col-lg-4">
                                          <div class="cs-intputwrap">
                                              <i class="fa-light fa-calendar-days"></i>
                                              <input type="text" class="dateInput" placeholder="Arrival Date"
                                                  name="" value="{{ $arrivel }}" />
                                          </div>
                                      </div>
                                      <!-- listsearch-input-item -->
                                      <!-- listsearch-input-item -->
                                      <div class="col-lg-4">
                                          <div class="cs-intputwrap">
                                              <i class="fa-light fa-calendar-days"></i>
                                              <input type="text" class="dateInput" placeholder="Departure Date"
                                                  name="" value="{{ $departure }}" />
                                          </div>
                                      </div>
                                      <!-- listsearch-input-item -->
                                      <!-- listsearch-input-item -->
                                      <div class="col-lg-4">
                                          <div class="cs-intputwrap">
                                              <i class="fa-light fa-layer-group"></i>
                                              <select data-placeholder="Categories"
                                                  class="chosen-select on-radius no-search-select" name="">
                                                  <option>Type of property</option>
                                                  @foreach ($allproperty as $oneproperty)
                                                    <option value="{{ $oneproperty->id }}">{{ $oneproperty->title }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                      <!-- listsearch-input-item -->
                                      <!-- listsearch-input-item -->
                                      <div class="col-lg-4">
                                          <div class="cs-intputwrap">
                                              <i class="fa-light fa-city"></i>
                                              <select data-placeholder="All Cities"
                                                  class="chosen-select on-radius no-search-select" name="type_id">
                                                  {{-- <option>All Category</option> --}}
                                                    @foreach ($addvanceCategory as $cate)
                                                      <option {{ $category == $cate->id ? 'selected' : '' }}>{{ $cate->name }}</option>
                                                    @endforeach
                                              </select>
                                          </div>
                                      </div>
                                      <!-- listsearch-input-item -->
                                      <!-- listsearch-input-item -->
                                      <div class="col-lg-4">
                                          <div class="cs-intputwrap" >
                                            <div class="price-range-wrap fl-wrap">
                                                <label>Price Range</label>
                                                <div class="price-range-item">
                                                    <input type="text" class="price-range-double" data-min="{{ $minPrice }}" data-max="{{ $maxPrice }}" 
                                                        name="price-range1" data-step="1" value="{{ $minPrice }},{{ $maxPrice }}" data-prefix="" />
                                                </div>
                                            </div>                                            
                                          </div>
                                      </div>
                                      <!-- listsearch-input-item -->
                                      <!-- listsearch-input-item -->
                                      <div class="col-lg-4">
                                          <div class="cs-intputwrap">
                                              <div class="price-range-wrap fl-wrap">
                                                  <label>Area Sq/mt</label>
                                                  <div class="price-rage-item pr-nopad fl-wrap">
                                                      <input type="text" class="price-range-double" data-min="1"
                                                          data-max="10000" name="area_range" data-step="1" value="1"
                                                          data-prefix="" />
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- listsearch-input-item -->
                                      <!-- listsearch-input-item -->
                                      <div class="col-lg-2">
                                          <div class="hidden-listing_search_wrap">
                                              <div class="more_search-btn">
                                                  More Options <i class="fa-regular fa-plus"></i>
                                              </div>
                                              <div class="hidden-listing-filter">
                                                  <!-- quantity_wrap -->
                                                  <div class="quantity_wrap">
                                                      <div class="quantity_wrap_title">
                                                          <i class="fa-light fa-bath"></i><span>Bathrooms</span>
                                                      </div>
                                                      <div class="quantity">
                                                          <div class="quantity-item">
                                                              <input type="button" value="-" class="minus" />
                                                              <input type="text" name="quantity" title="Qty" class="qty"
                                                                  data-min="1" data-max="6" data-step="1" value="1" />
                                                              <input type="button" value="+" class="plus" />
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- quantity_wrap end-->
                                                  <!-- hidden-listing-item -->
                                                  <div class="hidden-listing-item">
                                                      <div class="filter-tags-title">Amenities</div>
                                                      <div class="filter-tags">
                                                          <ul class="no-list-style">
                                                              <li>
                                                                  <input id="check-c" type="checkbox" name="amenities[]"
                                                                      value="1" />
                                                                  <label for="check-c">Wi Fi</label>
                                                              </li>
                                                              <li>
                                                                  <input id="check-c" type="checkbox" name="amenities[]"
                                                                      value="2" />
                                                                  <label for="check-c">Swimming</label>
                                                              </li>
                                                              <li>
                                                                  <input id="check-c" type="checkbox" name="amenities[]"
                                                                      value="3" />
                                                                  <label for="check-c">Security</label>
                                                              </li>
                                                              <li>
                                                                  <input id="check-c" type="checkbox" name="amenities[]"
                                                                      value="4" />
                                                                  <label for="check-c">Laundry Room</label>
                                                              </li>
                                                              <li>
                                                                  <input id="check-c" type="checkbox" name="amenities[]"
                                                                      value="5" />
                                                                  <label for="check-c">Equipped Kitchen</label>
                                                              </li>
                                                              <li>
                                                                  <input id="check-c" type="checkbox" name="amenities[]"
                                                                      value="6" />
                                                                  <label for="check-c">Air Conditioning</label>
                                                              </li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <!-- hidden-listing-item end-->
                                              </div>
                                          </div>
                                      </div>
                                      <!-- listsearch-input-item -->
                                      <!-- listsearch-input-item -->
                                      <div class="col-lg-2">
                                          <button onclick="window.location.href='listing.html'" class="commentssubmit commentssubmit_fw">
                                              Search
                                          </button>
                                      </div>
                                      <!-- listsearch-input-item -->
                                  </div>
                          </form>
                      </div>
                  </div>
                  <!-- list-searh-input-wrap end-->
                  <div class="mob-filter-overlay cmf fs-wrapper"></div>
                  <!-- list-main-wrap-header-->
                  <div class="list-main-wrap-header box-list-header ">
                      <!-- list-main-wrap-title-->
                      <div class="list-main-wrap-title col-md-12">
                          <h2 class="mb-3">
                              Popular Properties
                          </h2>
                          @foreach ($property as $item )
                              {{-- {{ $item->category->name }} --}}
                              <div class="listing-grid-item cat-sale cat-rent">
                                <div class="listing-item">
                                  <div class="geodir-category-listing" style="width: 400px">
                                    <div class="geodir-category-img">
                                        <a href="{{ route('single.page',$item->id) }}" class="geodir-category-img_item" >
                                          <div class="bg" data-bg="{{ asset('uploads/backend/property/'.$item->image) }}"></div>
                                          <div class="overlay"></div>
                                        </a>
                                      <div class="geodir-category-location">
                                        <a href="#4" class="map-item tolt single-map-item" data-newlatitude="40.88496706" data-newlongitude="-73.88191222" data-microtip-position="top" data-tooltip="On the map">
                                          <i class="fas fa-map-marker-alt"></i>{{ $item->city }}</a>
                                      </div>
                                      <ul class="list-single-opt_header_cat">
                                        <li><a href="#" class="cat-opt">{{ $item->accommodation }}</a></li>
                                      </ul>
                                      <a href="#" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="Save"><span><i class="fal fa-heart"></i></span></a>
                                      <div class="geodir-category-listing_media-list">
                                        <span><i class="fas fa-camera"></i>{{ $item->category->name }}</span>
                                      </div>
                                    </div>
                                    <div class="geodir-category-content">
                                        <h3>
                                          <a href="{{ route('single.page',$item->id) }}">{{ $item->title }}</a>
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
                                              <i class="fa-light fa-bath"></i><span>{{ $item->bathrooms }}</span>
                                            </li>
                                            <li>
                                              <i class="fa-light fa-chart-area"></i
                                              ><span>{{ $item->area }}</span>
                                            </li>
                                          </ul>
                                        </div>
                                    </div>
                                    <div class="geodir-category-footer" >
                                      <a href="" class="gcf-company"><img src="{{ asset('frontend/images/avatar/1.jpg') }}" alt=""/><span>
                                          {{ $item->agent->name }}</span>
                                      </a>
                                      <a href="{{ route('single.page',$item->id) }}" class="gid_link">
                                        <span>View Details</span>
                                        <i class="fa-solid fa-caret-right"></i
                                      ></a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          @endforeach
                      </div>
                      <!-- list-main-wrap-title end-->
                  </div>
                  {{-- {{ $arrivel }} --}}
                  <!-- list-main-wrap-header end-->
                  <!--listing-item-container-->
                  <div class="listing-item-container three-columns-grid">
                      <!-- listing-item -->
                      {{-- @foreach ($property as $item )
                      <div class="listing-grid-item cat-sale cat-rent">
                        <div class="listing-item">
                          <div class="geodir-category-listing">
                            <div class="geodir-category-img">
                              <a
                              href="{{ route('single.page',$item->id) }}"
                              class="geodir-category-img_item"
                            >
                              <div class="bg" data-bg="{{ asset('uploads/backend/property/'.$item->image) }}"></div>
                              <div class="overlay"></div>
                            </a>
                            <div class="geodir-category-location">
                              <a
                                href="#4"
                                class="map-item tolt single-map-item"
                                data-newlatitude="40.88496706"
                                data-newlongitude="-73.88191222"
                                data-microtip-position="top"
                                data-tooltip="On the map"
                                ><i class="fas fa-map-marker-alt"></i>{{ $item->city }}</a
                              >
                            </div>
                            <ul class="list-single-opt_header_cat">
                              <li><a href="#" class="cat-opt">{{ $item->accommodation }}</a></li>
                            </ul>
                            <a
                              href="#"
                              class="geodir_save-btn tolt"
                              data-microtip-position="left"
                              data-tooltip="Save"
                              ><span><i class="fal fa-heart"></i></span
                            ></a>
                            <div class="geodir-category-listing_media-list">
                              <span><i class="fas fa-camera"></i>{{ $item->category->name }}</span>
                            </div>
                            </div>
                            <div class="geodir-category-content">
                                <h3>
                                  <a href="{{ route('single.page',$item->id) }}">{{ $item->title }}</a>
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
                                      <i class="fa-light fa-bath"></i><span>{{ $item->bathrooms }}</span>
                                    </li>
                                    <li>
                                      <i class="fa-light fa-chart-area"></i
                                      ><span>{{ $item->area }}</span>
                                    </li>
                                  </ul>
                                </div>
                            </div>
                            <div class="geodir-category-footer">
                              <a href="" class="gcf-company"
                                ><img src="{{ asset('frontend/images/avatar/1.jpg') }}" alt="" /><span
                                  >{{ $item->agent->name }}</span
                                ></a>
                              <a href="{{ route('single.page',$item->id) }}" class="gid_link"
                                ><span>View Details</span>
                                <i class="fa-solid fa-caret-right"></i
                              ></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach --}}
                  </div>
              </div>
              <!--boxed-container end-->
          </div>
          <!--main-content end-->
          <div class="to_top-btn-wrap">
              <div class="to-top to-top_btn">
                  <span>Back to top</span> <i class="fa-solid fa-arrow-up"></i>
              </div>
              <div class="svg-corner svg-corner_white" style="top: 0; left: -40px; transform: rotate(-90deg)"></div>
              <div class="svg-corner svg-corner_white" style="top: 0; right: -40px; transform: rotate(-180deg)"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js" integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
     