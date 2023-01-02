  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="/dashboard/index" class="nav-link">{{ trans('words.home') }}</a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
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
          </li>

       
          <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                  <i class="fas fa-th-large"></i>
              </a>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
          <img src="/dashboard/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="/dashboard/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                  <span class="text-danger m-auto">{{ Auth::user()->role }}</span>
                  <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-sm text-light">
                          {{ trans('words.logout') }}
                      </button>
                  </form>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                  {{-- Lang --}}
                  <li class="nav-item my-3">
                      <ul>
                          @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                              <li>
                                  <a rel="alternate" hreflang="{{ $localeCode }}"
                                      href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                      {{ $properties['native'] }}
                                  </a>
                              </li>
                          @endforeach

                      </ul>
                  </li>
                  {{-- Lang --}}

                  {{-- <li class="nav-item menu-open">
                      <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="./ar_index.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>لوحة تحكم RTL v1</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index.html" class="nav-link active">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dashboard v1</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index2.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dashboard v2</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index3.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dashboard v3</p>
                              </a>
                          </li>
                      </ul>
                  </li> --}}

                    <li class="nav-item ">
                      <a href="#" class="nav-link ">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              {{ trans('words.posts') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                        
                          <li class="nav-item">
                              <a href="{{route('post.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ trans('words.list-posts') }}</p>
                              </a>
                          </li>

                        
                          @can('create' , \App\Models\Post::class)                              
                            <li class="nav-item">
                                <a href="{{route('post.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ trans('words.add') }}</p>
                                    </a>
                                </li>
                          @endcan

                            

                   
                          
                       
                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
