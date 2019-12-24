<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
  <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Viễn Đông - @yield('title')</title>
  <!-- <link rel="apple-touch-icon" href="{{URL::asset('template/app-assets/images/ico/apple-icon-120.png')}}"> -->
  <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('images/vd.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700"
  rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/vendors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/app.css')}}">
  <!-- END ROBUST CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/core/colors/palette-gradient.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/assets/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/other.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/plugins/charts/c3-chart.css')}}">
  @yield('css')
  <!-- END Custom CSS-->
</head>
<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns   menu-expanded"
data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-light navbar-border navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="{{route('index')}}">
              <img class="brand-logo" alt="robust admin logo" src="{{URL::asset('images/logo.jpg')}}" style="width: 150px; height: auto" >
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container container center-layout">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a></li>
          
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
              <div class="search-input">
                <input class="input" type="text" placeholder="Explore Robust...">
              </div>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-vn"></i><span>Vietnamese</span><span class="selected-language"></span></a>
              <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>
                <a
                class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item"
                  href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item"
                  href="#"><i class="flag-icon flag-icon-de"></i> German</a></div>
            </li>
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                <span class="badge badge-pill badge-default badge-danger badge-default badge-up">5</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Notifications</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                </li>
                <li class="scrollable-container media-list w-100">
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">You have new order!</h6>
                        <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading red darken-1">99% Server load</h6>
                        <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                        <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">Complete the task</h6>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">Generate monthly report</h6>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time>
                        </small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail"></i>
                <span class="badge badge-pill badge-default badge-info badge-default badge-up">5 </span>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Messages</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>
                </li>
                <li class="scrollable-container media-list w-100">
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left">
                        <span class="avatar avatar-sm avatar-online rounded-circle">
                          <img src="{{URL::asset('images/1.jpg')}}"
                          alt="avatar"><i></i></span>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">Margaret Govan</h6>
                        <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left">
                        <span class="avatar avatar-sm avatar-busy rounded-circle">
                          <img src="{{URL::asset('images/1.jpg')}}"
                          alt="avatar"><i></i></span>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">Bret Lezama</h6>
                        <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Tuesday</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left">
                        <span class="avatar avatar-sm avatar-online rounded-circle">
                          <img src="{{URL::asset('images/1.jpg')}}"
                          alt="avatar"><i></i></span>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">Carie Berra</h6>
                        <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Friday</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left">
                        <span class="avatar avatar-sm avatar-away rounded-circle">
                          <img src="{{URL::asset('images/1.jpg')}}"
                          alt="avatar"><i></i></span>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">Eric Alsobrook</h6>
                        <p class="notification-text font-small-3 text-muted">We have project party this saturday.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">last month</time>
                        </small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all messages</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                @if(Auth::check())
           <!--      <span class="avatar avatar-online">
                  <img src="{{URL::asset('images/NhanVien')}}/{{Auth::User()->manv}}.jpg"
                  alt="avatar"><i></i></span> -->
                <span class="user-name">{{Auth::User()->name}}</span>
                @else
                 <span class="avatar avatar-online">
                  <img src="{{URL::asset('images/1.jpg')}}"
                  alt="avatar"><i></i></span>
                <span class="user-name">{{Auth::User()->name}}</span>
                @endif
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{route('profile')}}"><i class="ft-user"></i> Profile</a> <a class="dropdown-item"
                  href="{{route('vi-tien')}}"><i class="fa fa-credit-card"></i> Ví tiền</a>
                <!-- <a
                class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                  <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item"
                  href="#"><i class="ft-message-square"></i> Chats</a> -->
                 
                  <div class="dropdown-divider"></div><a class="dropdown-item" onclick="$('#logout-form').submit()"><i class="ft-power"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="index.html" data-toggle="dropdown"><i class="fa fa-user"></i>
            <span data-i18n="nav.dash.main">Nhân sự</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="{{route('v-ho-so-nv')}}"
                  data-toggle="dropdown">Hồ sơ nhân viên</a>
                </li>
            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Lương</a>
              <ul class="dropdown-menu">
                <li data-menu=""><a class="dropdown-item" href="{{route('v-khai-bao-luong')}}" data-toggle="dropdown">Các điều khoản</a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="{{route('v-bang-luong-nv')}}"
                  data-toggle="dropdown">Bảng lương nhân viên</a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="{{route('v-bang-luong-nv')}}"
                  data-toggle="dropdown">Điều chỉnh lương</a>
                </li>
              </ul>
            </li>
           
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="fa fa-database"></i><span data-i18n="nav.templates.main">Cơ sở vật chất</span></a>
          <ul class="dropdown-menu">
            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Quản lý tài sản</a>
              <ul class="dropdown-menu">
               <!--  <li data-menu=""><a class="dropdown-item" href="../vertical-menu-template" data-toggle="dropdown">Classic Menu</a>
                </li>
                -->
              </ul>
            </li>
            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Thanh Lý Giá Trị</a>
              <ul class="dropdown-menu">
              <!--   <li data-menu=""><a class="dropdown-item" href="{{route('nhan-dau-gia')}}" data-toggle="dropdown">Duyệt giá gửi</a>
                </li> -->
                <li data-menu=""><a class="dropdown-item" href="{{route('duyet-tl')}}" data-toggle="dropdown">Sản phẩm Thanh Lý Đợi Duyệt</a>
                </li>
               <!--  <li data-menu=""><a class="dropdown-item" href="../horizontal-top-icon-menu-template"
                  data-toggle="dropdown">Top Icon</a>
                </li> -->
              </ul>
            </li>
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="fa fa-clipboard"></i><span data-i18n="nav.templates.main">Kế toán</span></a>
          <ul class="dropdown-menu">
            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Ví tiền nội bộ</a>
              <ul class="dropdown-menu">
                <li data-menu=""><a class="dropdown-item" href="{{route('muc-quy-doi')}}" data-toggle="dropdown">Cập nhật mức quy đổi</a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="{{route('cac-quy-doi')}}"
                  data-toggle="dropdown">Quy đổi hạt - tiền</a>
                </li>
              <!--   <li data-menu=""><a class="dropdown-item" href=""
                  data-toggle="dropdown">Quy đổi tiền - hạt</a>
                </li> -->
              </ul>
            </li><!-- 
            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Horizontal</a>
              <ul class="dropdown-menu">
                <li data-menu=""><a class="dropdown-item" href="../horizontal-menu-template" data-toggle="dropdown">Classic</a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="../horizontal-top-icon-menu-template"
                  data-toggle="dropdown">Top Icon</a>
                </li>
              </ul>
            </li> -->
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="fa fa-th-list"></i><span data-i18n="nav.templates.main">Mở rộng tính năng</span></a>
          <ul class="dropdown-menu">
            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Thanh lý giá trị</a>
                <ul class="dropdown-menu">
                  <li data-menu=""><a class="dropdown-item" href="{{route('cac-san-pham-tl')}}" data-toggle="dropdown">Các sản phẩm thanh lý</a>
                  </li>
                  <li data-menu=""><a class="dropdown-item" href="{{route('dang-ky-thanh-ly')}}"
                    data-toggle="dropdown">Đăng ký thanh lý giá trị</a>
                  </li>
                </ul>
              </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  @yield('body')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
 <footer class="footer footer-static footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout">
      <span class="float-md-left d-block d-md-inline-block">Made by Super Developers Team Viễn Đông<a class="text-bold-800 grey darken-2" target="_blank"> </a> </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="{{URL::asset('template/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="{{URL::asset('template/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>

  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{URL::asset('template/app-assets/vendors/js/charts/d3.min.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/vendors/js/charts/c3.min.js')}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN ROBUST JS-->
  <script src="{{URL::asset('template/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <!-- END ROBUST JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{URL::asset('template/app-assets/js/scripts/extensions/block-ui.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  @yield('js')
</body>
</html>