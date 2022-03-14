<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item underline text-sm text-gray-600 hover:text-gray-900">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
    {{--<li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
            <form class="form-inline">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>--}}

    <!-- Messages Dropdown Menu -->
    {{--   <li class="nav-item dropdown">
           <a class="nav-link" data-toggle="dropdown" href="#">
               <i class="far fa-comments"></i>
               <span class="badge badge-danger navbar-badge">3</span>
           </a>
           <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <a href="#" class="dropdown-item">
                   <!-- Message Start -->
                   <div class="media">
                       <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                       <div class="media-body">
                           <h3 class="dropdown-item-title">
                               Brad Diesel
                               <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                           </h3>
                           <p class="text-sm">Call me whenever you can...</p>
                           <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                       </div>
                   </div>
                   <!-- Message End -->
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
                   <!-- Message Start -->
                   <div class="media">
                       <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                       <div class="media-body">
                           <h3 class="dropdown-item-title">
                               John Pierce
                               <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                           </h3>
                           <p class="text-sm">I got your message bro</p>
                           <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                       </div>
                   </div>
                   <!-- Message End -->
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
                   <!-- Message Start -->
                   <div class="media">
                       <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                       <div class="media-body">
                           <h3 class="dropdown-item-title">
                               Nora Silvester
                               <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                           </h3>
                           <p class="text-sm">The subject goes here</p>
                           <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                       </div>
                   </div>
                   <!-- Message End -->
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
           </div>
       </li>--}}
    <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{route('article.index',['status' => "ASSIGNED","database" => "maria"])}}">
                <i class="far fa-bell" style="width: 20px;"></i>
                @php
                    $assignedCount = \Modules\Admin\Entities\Article::where('editor_id', \Illuminate\Support\Facades\Auth::user()->id)->where('status', \App\Parafesor\Constants\ArticleStatus::ASSIGNED)->count()
                @endphp
                <span
                        class="badge  navbar-badge {{$assignedCount > 0 ? 'badge-danger' : 'badge-success'}} text-sm ">{{$assignedCount}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        {{--   <li class="nav-item">
               <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                   <i class="fas fa-th-large"></i>
               </a>
           </li>--}}
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home.indextest')}}" target="_blank" class="brand-link">
        <img src="{{asset('modules/home/sample/img/logo-icon.svg')}}" alt="Parafesor Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Parafesor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fas fa-male mt-2" style="color: white"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                <li class="nav-item">
                    <a href="{{route('admin.index')}}"
                       class="nav-link {{request()->routeIs('admin.index') ? 'active' : ''}}">
                        <p>Genel</p>
                    </a>
                </li>
                <li class="nav-item">
                {{--  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Haberler
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>--}}
                {{--                    <ul class="nav nav-treeview">--}}
                @can('assign articles')
                    <li class="nav-item">
                        <a href="{{route('article.index')}}"
                           class="nav-link {{request()->routeIs('article.index') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Haberler</p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{route('article.postUpdate')}}"
                       class="nav-link {{request()->routeIs('article.postUpdate') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Yaz</p>
                    </a>
                </li>
                @can('edit articles')
                    <li class="nav-item">
                        <a href="{{route('article.index',['status' => "PUBLISHED","database" => "maria"])}}"
                           class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Yayınladıklarım</p>
                        </a>
                    </li>
                @endcan
                @can('edit articles')
                    <li class="nav-item">
                        <a href="{{route('article.index',['status' => "ASSIGNED","database" => "maria"])}}"
                           class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Bekleyenler</p>
                        </a>
                    </li>
                @endcan
                @can('assign articles')
                    <li class="nav-item">
                        <a href="{{route('article.index',['status' => "ASSIGNED","database" => "maria",'editor' => 'all'])}}"
                           class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Atananlar</p>
                        </a>
                    </li>
                @endcan
                {{--                    </ul>--}}
                <hr style="border-top: 1px solid #fff;  margin: 1em 0;">
                {{--                <li class="nav-item">--}}
                {{-- <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-tachometer-alt"></i>
                     <p>
                         Borsa Tube
                         <i class="right fas fa-angle-left"></i>
                     </p>
                 </a>--}}
                {{--                    <ul class="nav nav-treeview">--}}
                <li class="nav-item">
                    <a href="{{route('stockTube.index')}}"
                       class="nav-link {{request()->routeIs('stockTube.index') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Video Rapor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('stockTube.index',['channel'=> true])}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kanal Rapor</p>
                    </a>
                </li>
                {{--                    </ul>--}}
                <hr style="border-top: 1px solid #fff;  margin: 1em 0;">
                @can('assign articles')
                    <li class="nav-item">
                        <a href="{{route('bot.index')}}"
                           class="nav-link {{request()->routeIs('bot.index') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Bot Rapor
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('bot.report', [\Carbon\Carbon::now()->format('Y-m-d'),\Carbon\Carbon::yesterday()->format('Y-m-d')])}}"
                           class="nav-link {{request()->routeIs('bot.report*') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Bot Performans</p>
                        </a>
                        <form action="{{route('bot.run')}}">
                            <button class="btn btn-success btn-sm nav-link" style="font-weight: bold; color: black;">
                                Çalıştır
                            </button>
                        </form>
                    </li>
                @endcan
                <hr style="border-top: 1px solid #fff;  margin: 1em 0;">
                @can('assign articles')
                    {{--                    <li class="nav-item">--}}
                    {{--   <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p>
                               Editor Raporları
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>--}}
                    {{--                        <ul class="nav nav-treeview">--}}
                    <li class="nav-item">
                        <a href="{{route('editor.report')}}"
                           class="nav-link {{request()->routeIs('editor.report') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Editor Genel Rapor
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('editor.log')}}"
                           class="nav-link {{request()->routeIs('editor.log') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Editor Log</p>
                        </a>
                    </li>

                    {{--                        </ul>--}}
                @endcan
                <hr style="border-top: 1px solid #fff;  margin: 1em 0;">

                {{--                <li class="nav-item">--}}
                {{--  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Sistem
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>--}}
                {{--                    <ul class="nav nav-treeview">--}}
                @can('assign articles')
                    <li class="nav-item">
                        <a href="{{route('articleType.index')}}"
                           class="nav-link {{request()->routeIs('articleType.*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Kategoriler
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('system_user.index')}}"
                           class="nav-link {{request()->routeIs('system_user.*') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kullanıcılar</p>
                        </a>
                    </li>
                    <li class="nav-item">

                        <a href="{{route('system.menu.index')}} {{request()->routeIs('system.menu.*') ? 'active' : ''}}"
                           class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Menu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('system.download.sitemap')}}"
                           class="nav-link {{request()->routeIs('system.download.sitemap') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>SiteMap Indir</p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="{{route('system.company.index')}}"
                           class="nav-link {{request()->routeIs('system.company.*') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Şirketler</p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
