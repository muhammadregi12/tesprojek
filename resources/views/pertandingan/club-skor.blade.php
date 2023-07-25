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
                    <div class="col-md-10">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Masukan Skor Pertandingan
                                </h3>
                            </div>
                            <div class="box-body">
                                <div class="box-body">

                                    <form method="post" action="{{ route('simpan.pertandingan') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h5>Nama Club 1 <span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select class="form-control" name="club1_id" id="club2_id">
                                                                        <option selected disabled>Pilih Club</option>
                                                                        @foreach ($clubs as $club)
                                                                        <option value="{{ $club->id }}">{{ $club->nama_club }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('category_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h5>Skor Pertandingan <span class="text-danger"> *</span></h5>
                                                                <div class="controls"> <input type="number" name="skor1" placeholder="Skor Pertandingan" class="form-control" value="0" min="0" max="10">
                                                                    @error('product_weight')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- mengambil data berdasarkan id yg diambil --}}
                                        {{-- <input type="hidden" name="id" id="" value="{{ $clubs->id }}"> --}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h5>Nama Club 2 <span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select class="form-control" name="club2_id" id="club2_id">
                                                                        <option selected disabled>Pilih Club</option>
                                                                        @foreach ($clubs as $club)
                                                                        @if ($club->id != old('club1_id'))
                                                                        <option value="{{ $club->id }}">{{ $club->nama_club }}</option>
                                                                        @endif
                                                                        @endforeach
                                                                    </select>
                                                                    @error('club2_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h5>Skor Pertandingan <span class="text-danger"> *</span></h5>
                                                                <div class="controls"> <input type="number" name="skor2" placeholder="Skor Pertandingan" class="form-control" value="0" min="0" max="10">
                                                                    @error('product_weight')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-md btn-primary mb-5" value="Simpan">
                                        </div>

                                        {{-- <div class="text-xs-right">
                                            <button type="button" class="btn btn-md btn-primary mb-5" id="addInput">Tambah Inputan</button>
                                        </div> --}}

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    {{-- <script>
        $(document).ready(function() {
            // Ketika pilihan klub pertama berubah
            $("#club1_id").on("change", function() {
                var selectedClubId = $(this).val();

                // Menghapus opsi klub kedua
                $("#club2_id").empty();

                // Memperbarui kembali opsi klub kedua dengan mengecualikan klub yang sudah dipilih di klub pertama
                @foreach($clubs as $club)
                if ({
                        {
                            $club - > id
                        }
                    } != selectedClubId) {
                    $("#club2_id").append('<option value="{{ $club->id }}">{{ $club->nama_club }}</option>');
    }
    @endforeach
    });
    });

    </script> --}}

    {{-- <script>
        $(document).ready(function() {
            // Fungsi untuk membuat baris input baru
            function createInputRow() {
                var newRow = `
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Nama Club <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select class="form-control" name="club_id[]" id="club2_id">
                                    <option selected disabled>Pilih Club</option>
                                    @foreach ($clubs as $club)
                                    <option value="{{ $club->id }}">{{ $club->nama_club }}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Skor Pertandingan <span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="number" name="skor[]" placeholder="Skor Pertandingan" class="form-control" value="0" min="0" max="10">
                                            </div>
                                        </div>
                                    </div>
                                    </div>

    `;
                $(".box-body").append(newRow); // Menambahkan baris input ke dalam box-body


            }


            // Ketika tombol "Tambah" diklik
            $("#addInput").on("click", function() {
                createInputRow();

            });
        });

    </script> --}}



</body>
</html>
