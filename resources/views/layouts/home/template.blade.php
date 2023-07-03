<!DOCTYPE html>
<!--
	App by FreeHTML5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>App &mdash; Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap  -->
    @include('layouts.home.partials.style')
</head>

<body>
    @include('sweetalert::alert')
    <div id="page-wrap">

        <!-- ==========================================================================================================
													   HERO
		 ========================================================================================================== -->

        @include('layouts.home.partials.hero')

        <!-- ==========================================================================================================
													 ADVANTAGES
		 ========================================================================================================== -->

        <div class="fh5co-advantages-outer">
            <div class="container">
                <h1 class="second-title"><span class="span-perfect">Perfect</span> <span
                        class="span-features">Features</span></h1>
                <small>Only necessary</small>

                <div class="row fh5co-advantages-grid-columns wow animated fadeIn" data-wow-delay="0.36s">

                    <div class="col-sm-4">
                        <img class="grid-image" src="{{ asset('assets/home/img/icon-1.png') }}" alt="Icon-1">
                        <h1 class="grid-title">Usability</h1>
                        <p class="grid-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem cupiditate.
                        </p>
                    </div>

                    <div class="col-sm-4">
                        <img class="grid-image" src="{{ asset('assets/home/img/icon-2.png') }}" alt="Icon-2">
                        <h1 class="grid-title">Parallax Effect</h1>
                        <p class="grid-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem cupiditate.
                        </p>
                    </div>

                    <div class="col-sm-4">
                        <img class="grid-image" src="{{ asset('assets/home/img/icon-3.png') }}" alt="Icon-3">
                        <h1 class="grid-title">Unlimited Colors</h1>
                        <p class="grid-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem cupiditate.
                        </p>
                    </div>


                </div>
            </div>
        </div>


        <!-- ==========================================================================================================
													  SLIDER
		 ========================================================================================================== -->

        <div class="fh5co-slider-outer wow fadeIn" data-wow-delay="0.36s">
            <h1>SIMPLE WIDGETS</h1>
            <small>Drag and Drop</small>
            <div class="container fh5co-slider-inner">

                <div class="owl-carousel owl-theme">

                    <div class="item"><img src="{{ asset('assets/home/img/smartphone-2.png') }}" alt=""></div>
                    <div class="item"><img src="{{ asset('assets/home/img/smartphone-2.png') }}" alt=""></div>
                    <div class="item"><img src="{{ asset('assets/home/img/iphone.png') }}" alt=""></div>
                    <div class="item"><img src="{{ asset('assets/home/img/smartphone-2.png') }}" alt=""></div>


                </div>

            </div>
        </div>


        <!-- ==========================================================================================================
													  FEATURES
		 ========================================================================================================== -->

        {{-- @include('layouts.home.partials.feature') --}}


        <!-- ==========================================================================================================
													  REVIEWS
		 ========================================================================================================== -->

        {{-- @include('layouts.home.partials.review') --}}


        <!-- ==========================================================================================================
                                                 BOTTOM
    ========================================================================================================== -->

        {{-- @include('layouts.home.partials.bottom') --}}


        <!-- ==========================================================================================================
                                               SECTION 7 - SUB FOOTER
    ========================================================================================================== -->

        @include('layouts.home.partials.footer')

        @include('layouts.home.partials.script')


    </div> <!-- main page wrapper -->


</body>

</html>