    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/dashboard/assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/pnb-logo.png') }}">
        <title>
            Hasil Prediksi
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />

        <!-- <link href="assets/dashboard/assets/css/nucleo-icons.css" rel="stylesheet" /> -->
        <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
        <link href="assets/dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="assets/dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
        <link href="assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">





    </head>

    <body class="g-sidenav-show   bg-gray-100">
        <!-- <div class="min-height-300 position-absolute w-100" style="background-image: linear-gradient(to top, #00c6fb 0%, #005bea 100%);"></div> -->
        <div class="min-height-300 position-absolute w-100" style="background-image: linear-gradient(to top, #00c6fb 0%, #005bea 100%);"></div>
        <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="{{ route('dashboard')}}">
                    <img src="assets/img/pnb-logo.png" class="navbar-brand-img h-100" alt="main_logo">
                    <span class="ms-1 font-weight-bold">SPKM</span>
                </a>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('dashboard')}}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-gauge-high text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('data-mahasiswa')}}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-calendar-grid-58 text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Data Mahasiswa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('data-prediksi-mhs')}}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-list-check text-warning text-sm opacity-10"></i>
                                <!-- <i class="fa-solid fa-list-check"></i> -->
                            </div>
                            <span class="nav-link-text ms-1">Prediksi</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('tambah-data')}}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-solid fa-square-plus text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Tambah Data Mahasiswa</span>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('hasil-prediksi')}}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Hasil Prediksi</span>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link " href="../pages/profile.html">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-address-card text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Profile</span>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <form id="logout-form" action="{{ ('logout')}}" method="POST">
                            @csrf
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-right-from-bracket text-danger text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Logout</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
            </div>
        </aside>
        <main class="main-content position-relative border-radius-lg ">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">SPKM</a></li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Halaman Prediksi</li>
                        </ol>
                        <h6 class="font-weight-bolder text-white mb-0">Data Prediksi</h6>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <!-- <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div> -->
                        </div>
                        <ul class="navbar-nav  justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">{{ $user->username }}</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white p-0">
                                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell cursor-pointer"></i>
                                </a>
                                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="assets/dashboard/assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New message</span> from Laur
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        13 minutes ago
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="assets/dashboard/assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New album</span> by Travis Scott
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        1 day
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                    <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>credit-card</title>
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(453.000000, 454.000000)">
                                                                        <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        Payment successfully completed
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        2 days
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">

                            <!-- <div class="card-header pb-0">

                                @if(session('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <p style="color: whitesmoke;">{{ session('success') }}</p>
                                    </ul>
                                </div>
                                @endif
                                <h6>Tabel Data Mahasiswa</h6>
                            </div> -->
                            <!-- <hr class="horizontal dark"> -->

                            <div class="card-body pt-3">
                                <!-- <a><small>Dibawah ini anda dapat melakukan Tambah Data Monitoring dan Download Data Monitoring secara keseluruhan</small></a><br> -->
                                <h5 class="mb-3"><small><b>Tabel Hasil Prediksi</b></small></h5>

                                <!-- <form action="{{ route('upload.dataset') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="dataset">Upload Dataset (Excel):</label>
                                    <input type="file" name="dataset" accept=".xlsx" required>
                                    <button type="submit">Upload dan Retrain Model</button>
                                </form> -->

                                <!-- <form action="{{ route('upload.dataset') }}" method="POST" enctype="multipart/form-data" class="col-md-6 d-flex align-items-center gap-2">
                                    @csrf
                                    <input class="form-control form-control-sm" type="file" name="dataset" accept=".xlsx" required>
                                    <button class="btn btn-success btn-sm mt-3" type="submit">Upload</button>
                                </form> -->

                                <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="btn btn-success btn-sm mt-3" href="{{ route('tambah-data') }}">Tambah Data</a>

                                    <form action="{{ route('impor-data') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center gap-2">
                                        @csrf
                                        <input class="form-control form-control-sm" type="file" name="file" required>
                                        <button class="btn btn-secondary btn-sm mt-3" type="submit">Import</button>
                                    </form>
                                </div> -->





                                <!-- <a href="" class="btn btn-secondary btn-sm ms-auto">Import Data</a> -->
                                <!-- <a href="" class="btn btn-success btn-sm ms-auto">Download Semua Data</a>

                                <form action="" method="GET">
                                    <label for="month">Pilih Bulan:</label>
                                    <div class="col-md-2">
                                        <input class="form-control mb-1 text-center" type="month" id="month" name="month" required>
                                    </div>

                                    <button class="btn btn-warning btn-sm ms-auto" type="submit">Download Data</button>
                                </form> -->

                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert" style="color: whitesmoke;">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama</th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Jenis Kelamin</th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status Bekerja</th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Umur</th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status Menikah</th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">IPS 1</th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">IPS 2</th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">IPS 3</th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">IPS 4</th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">IPK</th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status Kelulusan</th>
                                                <!-- <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">OPSI</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->nama}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->jenis_kelamin}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->status_bekerja}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->umur}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->status_menikah}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->ips1}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->ips2}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->ips3}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->ips4}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->ipk}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->hasil_prediksi}}</span>
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer pt-3  ">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">
                                    © <script>
                                        document.write(new Date().getFullYear())
                                    </script>,
                                    made with <i class="fa fa-heart"></i> by
                                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                                    for a better web.
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </main>
        <div class="fixed-plugin">
            <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
                <i class="fa fa-cog py-2"> </i>
            </a>
            <div class="card shadow-lg">
                <div class="card-header pb-0 pt-3 ">
                    <div class="float-start">
                        <h5 class="mt-3 mb-0">Pengaturan Tambahan</h5>
                        <!-- <p>See our dashboard options.</p> -->
                    </div>
                    <div class="float-end mt-4">
                        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <!-- End Toggle Button -->
                </div>
                <hr class="horizontal dark my-1">
                <div class="card-body pt-sm-3 pt-0 overflow-auto">
                    <!-- Sidebar Backgrounds -->
                    <div>
                        <h6 class="mb-0">Sidebar Colors</h6>
                    </div>
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="badge-colors my-2 text-start">
                            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                        </div>
                    </a>
                    <!-- Sidenav Type -->
                    <div class="mt-3">
                        <h6 class="mb-0">Sidenav Type</h6>
                        <p class="text-sm">Choose between 2 different sidenav types.</p>
                    </div>
                    <div class="d-flex">
                        <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                        <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
                    </div>
                    <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                    <!-- Navbar Fixed -->
                    <div class="d-flex my-3">
                        <h6 class="mb-0">Navbar Fixed</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                        </div>
                    </div>
                    <hr class="horizontal dark my-sm-4">
                    <div class="mt-2 mb-5 d-flex">
                        <h6 class="mb-0">Light / Dark</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery (hanya sekali) -->
        <script src="assets/dashboard/vendor/jquery/jquery.min.js"></script>

        <!-- DataTables Core + Bootstrap -->
        <script src="assets/dashboard/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- DataTables Buttons -->
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

        <!-- Inisialisasi DataTables -->
        <script>
            $(document).ready(function() {
                const table = $('#dataTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excelHtml5',
                        text: 'Download Excel',
                        title: 'Data Mahasiswa',
                        className: 'btn btn-success btn-sm mt-3'
                    }]
                });

                // Hapus class tambahan dari DataTables Button
                table.buttons().container().find('.dt-button').removeClass('dt-button buttons-excel buttons-html5');
            });
        </script>



    </body>

    </html>