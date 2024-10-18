<header class="main-header">
    <div class="container">
      <div class="header-inner">
        <a href="{{ route('home') }}" class="logo-holder"
          ><img src="{{ asset('frontend/images/logo.png') }}" alt=""
        /></a>
        <!--  navigation -->
        <div class="nav-holder main-menu">
        </div>
        <!-- navigation  end -->
        <!-- nav-button-wrap-->
        <div class="nav-button-wrap">
          <div class="nav-button">
            <span></span><span></span><span></span>
          </div>
        </div>
        <!-- nav-button-wrap end-->
        <div
          class="header-search-btn tolt"
          data-microtip-position="bottom"
          data-tooltip="Search"
        >
          <i class="fa-regular fa-magnifying-glass"></i>
        </div>
        <div class="show-reg-form modal-open">
          <i class="fa-thin fa-user"></i><span>Sign In</span>
        </div>
        <!-- header-search-wrap  -->
        <div class="header-search-wrap novis_search">
          <div class="header-search">
            <div class="header-search-nav">
              <div class="header-search-nav_container">
                <div class="header-search-radio">
                  <input
                    class="hidden radio-label"
                    type="radio"
                    name="accept-offers"
                    id="sale-button"
                    checked="checked"
                  />
                  <label class="button-label" for="sale-button">Sale</label>
                  <input
                    class="hidden radio-label"
                    type="radio"
                    name="accept-offers"
                    id="rent-button"
                  />
                  <label class="button-label" for="rent-button">Rent</label>
                  <input
                    class="hidden radio-label"
                    type="radio"
                    name="accept-offers"
                    id="comm-button"
                  />
                  <label class="button-label" for="comm-button"
                    >Commercial</label
                  >
                </div>
              </div>
            </div>
            <div class="header-search-container">
              <div class="custom-form">
                <!-- listsearch-input-item -->
                <div class="cs-intputwrap">
                  <i class="fa-light fa-house"></i>
                  <input type="text" placeholder="Keywords..." value="" />
                </div>
                <!-- listsearch-input-item -->
                <!-- listsearch-input-item -->
                <div class="cs-intputwrap">
                  <i class="fa-light fa-location-dot"></i>
                  <input type="text" placeholder="Location..." value="" />
                </div>
                <!-- listsearch-input-item -->
                <!-- listsearch-input-item -->
                <div class="cs-intputwrap">
                  <div class="price-range-wrap">
                    <label>Price Range</label>
                    <div class="price-rage-item">
                      <input
                        type="text"
                        class="price-range-double"
                        data-min="100"
                        data-max="100000"
                        name="price-range1"
                        data-step="1"
                        value="1"
                        data-prefix="$"
                      />
                    </div>
                  </div>
                </div>
                <!-- listsearch-input-item -->
                <button
                  class="commentssubmit commentssubmit_fw"
                >
                  Search
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- header-search-wrap  end -->
      </div>
    </div>
  </header>
  <div
  class="body-overlay fs-wrapper search-form-overlay close-search-form"
></div>
<div class="wrapper">