<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Sunny Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="/assets/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/skin_color.css">

    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">
        @include('include.header')

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar">

                <div class="user-profile">
                    <div class="ulogo">
                        <a href="index.html">
                            <!-- logo for regular state and mobile devices -->
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="../images/logo-dark.png" alt="">
                                <h3><b>Sunny</b> Admin</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- sidebar menu-->
                @include('include.sidebar')
            </section>


        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <section class="content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Ubah Club
                                    </h3>
                                </div>
                                <div class="box-body">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <form method="post" action="{{ route('update.club', $clubs->id) }}" enctype="multipart/form-data">
                                                @csrf

                                                {{-- mengambil data berdasarkan id yg diambil --}}
                                                <input type="hidden" name="id" id="" value="{{ $clubs->id }}">

                                                <div class="form-group">
                                                    <h5>Nama Club <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="nama_club" id="" class="form-control" placeholder="Nama Club" value="{{ $clubs->nama_club }}">
                                                        @error('brand_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Kota Club <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="kota_club" id="" class="form-control" placeholder="Kota Club" value="{{ $clubs->kota_club }}">
                                                        @error('brand_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="text-xs-right">
                                                    <input type="submit" class="btn btn-md btn-primary mb-5" value="Perbaharui">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
        <!-- /.content -->
    </div>
    </div>
    <!-- /.content-wrapper -->
    @include('include.footer')

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="/assets/js/vendors.min.js"></script>
    <script src="/assets/icons/feather-icons/feather.min.js"></script>
    <script src="/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
    <script src="/assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
    <script src="/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

    <!-- Sunny Admin App -->
    <script src="/assets/js/template.js"></script>
    <script src="/assets/js/pages/dashboard.js"></script>


    {{-- toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.info("{{ Session::get('message') }}");
                break;
        }
        @endif

    </script>

</body>
</html>
