<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <link rel="stylesheet" href="/assets/vendor_components/sweetalert2/sweetalert2.css">

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

                <!-- Main content -->
                <div class="container-full">
                    <section class="content">
                        <div class="row">
                            <div class="col-8">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Data Club
                                            <span class="badge badge-pill badge-primary">{{ count($clubs) }}</span>
                                        </h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th>Nama Club</th>
                                                        <th>Kota Club</th>
                                                        <th width="20%">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($clubs as $key => $club)

                                                    <tr>
                                                        <td>{{ $key +1 }}</td>
                                                        <td>{{ $club->nama_club }}</td>
                                                        <td>{{ $club->kota_club }}</td>
                                                        <td>
                                                            <a href="{{ route('edit.club', $club->id) }}" class="btn btn-sm btn-info" title="Edit Data">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('delete.club', $club->id) }}" class="btn btn-sm btn-info" title="Edit Data" id="delete">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Tambah Club</h3>
                                    </div>

                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <form method="post" action="{{ route('tambah.club') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <h5>Nama Club <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="nama_club" id="" class="form-control" placeholder="Nama Club" required>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Kota Club <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="kota_club" id="" class="form-control" placeholder="Kota Club" required>

                                                    </div>
                                                </div>

                                                <div class="text-xs-right">
                                                    <input type="submit" class="btn btn-md btn-primary mb-5" value="Tambah">
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

    {{-- pemberuithguan hapus --}}
    <script src="/assets/vendor_components/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Apakah Anda Yakin ?'
                    , text: "Data Yang Di Hapus Tidak Bisa Kembali"
                    , icon: 'warning'
                    , showCancelButton: true
                    , confirmButtomColor: '#3085d6'
                    , cancelButtomColor: '#d33'
                    , confirmButtomText: 'Ya, Hapus Saja'
                    , cancelButtomText: 'Batal'
                , }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!'
                            , 'Data Berhasil Dihapus.'
                            , 'success'
                        )
                    }
                });
            });
        });

    </script>

</body>
</html>
