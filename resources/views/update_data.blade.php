<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/dashboard/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/pnb-logo.png')}}">
    <title>
        Update Data Mahasiswa
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- <link href="assets/dashboard/assets/css/nucleo-icons.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css')}}">
    <link href="{{ asset('assets/dashboard/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/dashboard/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/dashboard/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
    <link href="{{ asset('assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 position-absolute w-100" style="background-image: linear-gradient(to top, #00c6fb 0%, #005bea 100%);"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('dashboard')}}">
                <img src="{{ asset('assets/img/pnb-logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
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
                            <!-- <i class="fa-solid fa-gauge-high"></i> -->
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data-mahasiswa')}}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-success text-sm opacity-10"></i>
                            <!-- <i class="fa-solid fa-table"></i> -->
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
                    <a class="nav-link" href="{{ route('hasil-prediksi')}}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Hasil Prediksi</span>
                    </a>
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
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Halaman Update Data Mahasiswa</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Update Data Mahasiswa</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">{{ $user->username}}</span>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- <div class="d-flex align-items-center"> -->
                                <p class="mb-0"><b>Form Tambah Data Mahasiswa</b></p>
                                <a class="btn btn-primary btn-sm ms-auto mt-3" href="{{ route('data-mahasiswa')}}">Kembali</a>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <p class="text-uppercase text-sm">User Information</p> -->
                            <form action="{{ route('proses-update', $mahasiswa_update->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <p class="text-uppercase text-sm">Informasi Data Diri</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama</label>
                                            <input class="form-control" type="text" name="nama" value="{{ old('nama', $mahasiswa_update->nama) }}">
                                            @error('nama') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin">
                                                <option value="" class="text-center" selected>- Pilih Jenis Kelamin -</option>
                                                <option value="laki-laki" {{ old('jenis_kelamin', $mahasiswa_update->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="perempuan" {{ old('jenis_kelamin', $mahasiswa_update->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlSelect1">Status Bekerja</label>
                                            <select class="form-control" name="status_bekerja">
                                                <option value="" class="text-center" selected>- Pilih Status Bekerja -</option>
                                                <option value="bekerja" {{ old('status_bekerja', $mahasiswa_update->status_bekerja) == 'bekerja' ? 'selected' : '' }}>Bekerja</option>
                                                <option value="tidak" {{ old('status_bekerja', $mahasiswa_update->status_bekerja) == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                            @error('status_bekerja') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Umur</label>
                                            <input class="form-control" type="text" value="{{ old('umur', $mahasiswa_update->umur) }}" name="umur">
                                            @error('umur') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlSelect1">Status Menikah</label>
                                        <select class="form-control" name="status_menikah">
                                            <option value="" class="text-center" selected>- Pilih Status Menikah -</option>
                                            <option value="menikah" {{ old('status_menikah', $mahasiswa_update->status_menikah) == 'menikah' ? 'selected' : '' }}>Menikah</option>
                                            <option value="belum" {{ old('status_menikah', $mahasiswa_update->status_menikah) == 'belum' ? 'selected' : '' }}>Belum</option>
                                        </select>
                                        @error('status_menikah') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                                    </div>
                                </div>

                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Informasi Akademik</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">IPS 1</label>
                                            <input class="form-control" type="text" id="ips1" value="{{ old('ips1', $mahasiswa_update->ips1) }}" name="ips1">
                                            @error('ips1') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">IPS 2</label>
                                            <input class="form-control" type="text" id="ips2" value=" {{ old('ips2', $mahasiswa_update->ips2) }}" name="ips2">
                                            @error('ips2') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">IPS 3</label>
                                            <input class="form-control" type="text" id="ips3" value=" {{ old('ips3', $mahasiswa_update->ips3) }}" name="ips3">
                                            @error('ips3') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">IPS 4</label>
                                            <input class="form-control" type="text" id="ips4" value="{{ old('ips4', $mahasiswa_update->ips4) }} " name="ips4">
                                            @error('ips4') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">IPK</label>
                                        <input class="form-control" type="text" id="ipk" value="{{ old('ipk', $mahasiswa_update->ipk) }} " name="ipk">
                                        @error('ipk') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm ms-auto">Update Data</button>
                            </form>
                            <script>
                                function calculateIPK() {
                                    const ips1 = parseFloat(document.getElementById('ips1').value) || 0;
                                    const ips2 = parseFloat(document.getElementById('ips2').value) || 0;
                                    const ips3 = parseFloat(document.getElementById('ips3').value) || 0;
                                    const ips4 = parseFloat(document.getElementById('ips4').value) || 0;

                                    const ipk = (ips1 + ips2 + ips3 + ips4) / 4;

                                    document.getElementById('ipk').value = ipk.toFixed(2); // tampilkan 2 angka desimal
                                }

                                document.getElementById('ips1').addEventListener('input', calculateIPK);
                                document.getElementById('ips2').addEventListener('input', calculateIPK);
                                document.getElementById('ips3').addEventListener('input', calculateIPK);
                                document.getElementById('ips4').addEventListener('input', calculateIPK);
                            </script>
                            <!-- <script>
                                document.getElementById('ips4').addEventListener('input', function() {
                                    const ips1 = parseFloat(document.getElementById('ips1').value);
                                    const ips2 = parseFloat(document.getElementById('ips2').value);
                                    const ips3 = parseFloat(document.getElementById('ips3').value);
                                    const ips4 = parseFloat(document.getElementById('ips4').value);

                                    // Cek apakah semua IPS sudah diisi dengan angka valid
                                    if (!isNaN(ips1) && !isNaN(ips2) && !isNaN(ips3) && !isNaN(ips4)) {
                                        const ipk = (ips1 + ips2 + ips3 + ips4) / 4;
                                        document.getElementById('ipk').value = ipk.toFixed(2);
                                    } else {
                                        document.getElementById('ipk').value = '';
                                    }
                                });
                            </script> -->
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
    <!--   Core JS Files   -->
    <script src="assets/dashboard/assets/js/core/popper.min.js"></script>
    <script src="assets/dashboard/assets/js/core/bootstrap.min.js"></script>
    <script src="assets/dashboard/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/dashboard/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/dashboard/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
    <script src="assets/dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="assets/dashboard/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="assets/dashboard/vendor/js/demo/datatables-demo.js"></script>
</body>

</html>