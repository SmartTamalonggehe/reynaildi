 <nav id="sidebar" style="background-image: url({{ asset('images/bg_1.jpg') }})">
     <!-- Sidebar Content -->
     <div class="sidebar-content">
         <!-- Side Header -->
         <div class="content-header justify-content-lg-center">
             <!-- Logo -->
             <div>
                 <a class="link-fx fw-bold tracking-wide mx-auto" href="/">
                     <span class="smini-hidden">
                         <span class="fs-4 text-primary">Menu</span>
                     </span>
                 </a>
             </div>
             <!-- END Logo -->

             <!-- Options -->
             <div>
                 <!-- Close Sidebar, Visible only on mobile screens -->
                 <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                 <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout"
                     data-action="sidebar_close">
                     <i class="fa fa-fw fa-times"></i>
                 </button>
                 <!-- END Close Sidebar -->
             </div>
             <!-- END Options -->
         </div>
         <!-- END Side Header -->

         <!-- Sidebar Scrolling -->
         <div class="js-sidebar-scroll">
             <!-- Side User -->
             <div class="content-side content-side-user px-0 py-0">
                 <!-- Visible only in mini mode -->
                 <div class="smini-visible-block animated fadeIn px-3">
                     <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}"
                         alt="">
                 </div>
                 <!-- END Visible only in mini mode -->

                 <!-- Visible only in normal mode -->
                 <div class="smini-hidden text-center mx-auto">
                     <a class="img-link" href="javascript:void(0)">
                         <img class="img-avatar" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
                     </a>
                     <ul class="list-inline mt-3 mb-0">
                         <li class="list-inline-item">
                             <a class="link-fx text-dual fs-sm fw-semibold text-uppercase" href="javascript:void(0)">
                                 Admin</a>
                         </li>
                         <li class="list-inline-item">
                             <a class="link-fx text-dual" title="Logout" href="{{ route('logout') }}">
                                 <i class="fa fa-sign-out-alt"></i>
                             </a>
                         </li>
                     </ul>
                 </div>
                 <!-- END Visible only in normal mode -->
             </div>
             <!-- END Side User -->

             <!-- Side Navigation -->
             <div class="content-side content-side-full">
                 <ul class="nav-main">
                     <li class="nav-main-item">
                         <a class="nav-main-link{{ request()->is('admin') ? ' active' : '' }}"
                             href={{ route('admin') }}>
                             <i class="nav-main-link-icon fa fa-house-user"></i>
                             <span class="nav-main-link-name">Dashboard</span>
                         </a>
                     </li>
                     <li class="nav-main-heading">Master</li>
                     <li class="nav-main-item">
                         <a class="nav-main-link{{ request()->is('admin/jenis') ? ' active' : '' }}"
                             href={{ route('jenis.index') }}>
                             <i class="fa-solid fa-briefcase nav-main-link-icon"></i>
                             <span class="nav-main-link-name">Jenis</span>
                         </a>
                     </li>
                     <li class="nav-main-item">
                         <a class="nav-main-link{{ request()->is('admin/surat') ? ' active' : '' }}"
                             href={{ route('surat.index', 'tipe=Surat Masuk') }}>
                             <i class="fa-solid fa-lightbulb nav-main-link-icon"></i>
                             <span class="nav-main-link-name">Surat</span>
                         </a>
                     </li>
                     <li class="nav-main-item">
                         <a class="nav-main-link{{ request()->is('admin/grafik') ? ' active' : '' }}"
                             href={{ route('grafik.index') }}>
                             <i class="fa-solid fa-person nav-main-link-icon"></i>
                             <span class="nav-main-link-name">Grafik</span>
                         </a>
                     </li>

                     {{-- get date now --}}
                     @php
                         $date = date('Y-m-d');
                     @endphp
                     <li class="nav-main-item">
                         <a class="nav-main-link{{ request()->is('admin/laporan') ? ' active' : '' }}"
                             href={{ route('laporan.index', "tgl_absen=$date") }}>
                             <i class="fa-solid fa-book nav-main-link-icon "></i>
                             <span class="nav-main-link-name">Laporan</span>
                         </a>
                     </li>
                 </ul>
             </div>
             <!-- END Side Navigation -->
         </div>
         <!-- END Sidebar Scrolling -->
     </div>
     <!-- Sidebar Content -->
 </nav>
