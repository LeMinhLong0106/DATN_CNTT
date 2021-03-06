<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script> --}}

    <script src="https://kit.fontawesome.com/9315670d89.js" crossorigin="anonymous"></script>

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">



</head>

<body>
    <div id="app">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">MAJESTIC</div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                @if (Auth::user()->vaitro_id == 1)
                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <i class="fas fa-home"></i>
                            <span>Trang ch???</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Nh?? h??ng
                    </div>
                    <!-- b??n -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ban.index') }}">
                            <i class="fas fa-fw fa-table"></i>
                            <span>B??n</span></a>
                    </li>
                    <!-- th???c ????n -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_1"
                            aria-expanded="true" aria-controls="collapse_1">
                            <i class="fas fa-th-list"></i>
                            <span>Th???c ????n</span>
                        </a>
                        <div id="collapse_1" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="{{ route('danhmuc.index') }}">Danh m???c</a>
                                {{-- <a class="collapse-item" href="{{ route('donvitinh.index') }}">????n v???</a> --}}
                                <a class="collapse-item" href="{{ route('monan.index') }}">M??n ??n</a>
                            </div>
                        </div>
                    </li>
                    <!-- order  -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('order.index') }}">
                            <i class="fas fa-edit"></i>
                            <span>????n h??ng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('order.giaodienDB') }}">
                            <i class="fas fa-user-lock"></i>
                            <span>?????u b???p</span></a>
                    </li>
                    <!-- h??a ????n -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_3"
                            aria-expanded="true" aria-controls="collapse_3">
                            <i class="fas fa-file-invoice"></i>
                            <span>H??a ????n</span>
                        </a>
                        <div id="collapse_3" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="{{ route('hdtaiquay.indexHDTQ') }}">T???i ch???</a>
                                <a class="collapse-item" href="{{ route('hdonline.indexHDO') }}">Online</a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('baocao.index') }}">
                            <i class="fas fa-user-lock"></i>
                            <span>B??o c??o</span></a>
                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Ng?????i d??ng
                    </div>
                    <!-- kh??ch h??ng -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user-circle"></i>
                            <span>Kh??ch h??ng</span></a>
                    </li>
                    <!-- nh??n vi??n -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_4"
                            aria-expanded="true" aria-controls="collapse_4">
                            <i class="fas fa-user-lock"></i>
                            <span>Nh??n vi??n</span>
                        </a>
                        <div id="collapse_4" class="collapse">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="{{ route('nhanvien.index') }}">Th??ng tin</a>
                                <a class="collapse-item" href="{{ route('vaitro.index') }}">Vai tr??</a>
                                <a class="collapse-item" href="{{ route('quyen.index') }}">Quy???n</a>
                                <a class="collapse-item" href="{{ route('dsquyen.index') }}">Danh s??ch quy???n</a>
                            </div>
                        </div>
                    </li>
                @endif
                @if (Auth::user()->vaitro_id == 2)
                    <!-- h??a ????n -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_3"
                            aria-expanded="true" aria-controls="collapse_3">
                            <i class="fas fa-file-invoice"></i>
                            <span>H??a ????n</span>
                        </a>
                        <div id="collapse_3" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="{{ route('hdtaiquay.index') }}">T???i ch???</a>
                                <a class="collapse-item" href="{{ route('hdonline.index') }}">Online</a>
                            </div>
                        </div>
                    </li>
                @endif
                @if (Auth::user()->vaitro_id == 3)
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('order.index') }}">
                            <i class="fas fa-edit"></i>
                            <span>????n h??ng</span>
                        </a>
                    </li>
                @endif
                {{-- @if (Auth::user()->vaitro_id == 4)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('giaodienDB.index') }}">
                            <i class="fas fa-user-lock"></i>
                            <span>?????u b???p</span></a>
                    </li>
                @endif --}}

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>

            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-4">
                    <div class="container-fluid">
                        {{-- <a class="navbar-brand" href="#"> Laravel ADMIN </a> --}}
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            Ch??o, {{ Auth::user()->name }}
                                            {{-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> --}}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Th??ng tin t??i kho???n
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                                ?????i m???t kh???u
                                            </a>

                                            {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                ????ng xu???t
                                            </a> --}}

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Main Content -->
                <div id="content">
                    @yield('content_admin')
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2022</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">??</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('login') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    {{-- <script src="vendor/jquery/jquery.min.js"></script> --}}
    {{-- <script src="Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <!-- Core plugin JavaScript-->
    {{-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> --}}
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    {{-- <script src="public/jquery.table2excel.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> --}}

    {{-- {{ asset('datatables/dataTables.bootstrap4.min.css') }} --}}
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}

    <!-- Page level plugins -->
    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('js/datatables-demo.js') }}"></script>

    <script src="{{ asset('js/script.js') }}"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    @yield('js')
</body>

</html>
