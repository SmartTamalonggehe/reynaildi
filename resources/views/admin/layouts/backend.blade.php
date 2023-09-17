<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Arsip Dinas Perumahan Rakyat dan Kawasan Permukiman Kabupaten Tambrauw</title>

    <meta name="description" content="Website Dinas Perumahan Rakyat dan Kawasan Permukiman Kabupaten Tambrauw">
    <meta name="author" content="Robert">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dinas Perumahan Rakyat dan Kawasan Permukiman Kabupaten Tambrauw">
    <meta property="og:site_name" content="Robert">
    <meta property="og:description" content="Website Dinas Perumahan Rakyat dan Kawasan Permukiman Kabupaten Tambrauw">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <!-- Modules -->
    @yield('css')
    @vite(['resources/sass/main.scss', 'resources/js/codebase/app.js'])

    <!-- Alternatively, you can also include a specific color theme after the main stylesheet to alter the default color theme of the template -->
    {{-- @vite(['resources/sass/main.scss', 'resources/sass/codebase/themes/corporate.scss', 'resources/js/codebase/app.js']) --}}
</head>

<body>
    <!-- Page Container -->
    <!--
    Available classes for #page-container:

    SIDEBAR & SIDE OVERLAY

      'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
      'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
      'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
      'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
      'sidebar-dark'                              Dark themed sidebar

      'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
      'side-overlay-o'                            Visible Side Overlay by default

      'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

      'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

    HEADER

      ''                                          Static Header if no class is added
      'page-header-fixed'                         Fixed Header

    HEADER STYLE

      ''                                          Classic Header style if no class is added
      'page-header-modern'                        Modern Header style
      'page-header-dark'                          Dark themed Header (works only with classic Header style)
      'page-header-glass'                         Light themed Header with transparency by default
                                                  (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
      'page-header-glass page-header-dark'        Dark themed Header with transparency by default
                                                  (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

    MAIN CONTENT LAYOUT

      ''                                          Full width Main Content if no class is added
      'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
      'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

    DARK MODE

      'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
  -->
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
        <!-- Side Overlay-->
        <aside id="side-overlay">
            <!-- Side Header -->
            <div class="content-header">
                <!-- User Avatar -->
                <a class="img-link me-2" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
                </a>
                <!-- END User Avatar -->

                <!-- User Info -->
                <a class="link-fx text-body-color-dark fw-semibold fs-sm" href="javascript:void(0)">
                    Admin
                </a>
                <!-- END User Info -->

                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-danger ms-auto" data-toggle="layout"
                    data-action="side_overlay_close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
                <!-- END Close Side Overlay -->
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="content-side">
                <p>
                    Content..
                </p>
            </div>
            <!-- END Side Content -->
        </aside>
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <!--
      Helper classes

      Adding .smini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
      Adding .smini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
        If you would like to disable the transition, just add the .no-transition along with one of the previous 2 classes

      Adding .smini-hidden to an element will hide it when the sidebar is in mini mode
      Adding .smini-visible to an element will show it only when the sidebar is in mini mode
      Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
        @include('admin.layouts.sidebar')
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="space-x-1">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Open Search Section -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <div class="d-inline">
                        <span class="fs-5 text-primary fw-bold">Dinas Perumahan Rakyat dan Kawasan Permukiman
                            Tambrauw</span>
                    </div>
                    <!-- END Open Search Section -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                @include('admin.layouts.rightbar')
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->


            <!-- Header Loader -->
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="far fa-sun fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        {{-- template from codebase --}}
        <footer id="page-footer">
            <div class="content py-3 bg-white">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href=""
                            target="_blank">King Pro</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="" target="_blank">Stevi Reynaldi Wongkar</a> &copy;
                        <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    {{-- @vite(['resources/js/codebase/modules/myModule.js']) --}}
    @vite(['resources/js/codebase/modules/myModule.js'])
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    @vite(['resources/js/app.js'])
    @yield('js')


</body>

</html>
