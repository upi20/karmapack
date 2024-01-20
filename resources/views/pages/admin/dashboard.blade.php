@extends('layouts.admin.master')

@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <a href="{{ route('admin.anggota') }}">
                <div class="card radius-10 border-start border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Jumlah Anggota</p>
                                <h4 class="my-1 text-info">{{ $total_anggota }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto">
                                <i class='fas fa-users'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('admin.artikel.data') }}">
                <div class="card radius-10 border-start border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Jumlah Artikel</p>
                                <h4 class="my-1 text-danger">{{ $total_artikel }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                                <i class='bx bx-laptop'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('admin.kontak.message') }}">
                <div class="card radius-10 border-start border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Jumlah Pesan Diterima</p>
                                <h4 class="my-1 text-success">{{ $total_pesan }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                <i class='bx bx-mail-send'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col"> <a href="{{ route('admin.password') }}">
                <div class="card radius-10 border-start border-4 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Ganti Password</p>
                                <h4 class="my-1 text-warning"><br></h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto">
                                <i class='bx bxs-key'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <form action="javascript:void(0)" id="FilterForm" class="d-md-flex flex-row justify-content-start  align-items-end">
        <div class="form-group">
            <label for="limit">Maksimal Jumlah Hari</label>
            <input class="form-control" type="number" min="1" name="limit" id="limit" max="366"
                value="7">
        </div>

        <div class="ms-md-3">
            <button type="submit" form="FilterForm" class="btn btn-rounded btn-md btn-secondary" data-toggle="tooltip"
                title="Refresh Filter">
                <i class="fas fa-sync-alt me-1"></i> Terapkan filter
            </button>
        </div>
    </form>

    <div class="row mt-3">
        <div class="col-lg-6" id="hbn_container">
            <div class="card m-lg-0">
                <div class="card-body">
                    <h6 class="card-title">Hari Besar Nasional Terdekat</h6>
                    <hr>
                    <div class="list-group" id="hbn_body">

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6" id="ulang_tahun_container">
            <div class="card m-lg-0">
                <div class="card-body">
                    <h6 class="card-title">Ulang Tahun Anggota Terdekat</h6>
                    <hr>
                    <div class="list-group" id="ulang_tahun_body">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3" id="penghitung-container">
        <div class="card-header d-md-flex flex-row justify-content-between">
            <div>
                <h6 class="mt-2 text-uppercase">Penghitung Pengunjung</h6>
            </div>
            <div>
                <div id="datepicker" style="width: 100%" class="form-control">
                    <i class="fadeIn animated bx bx-calendar-star"></i>
                    <span></span>
                    <i class="fadeIn animated bx bx-caret-down-circle"></i>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="chart-pengunjung" class="chartsh"></div>
            <br>
            <div class="row">
                <div class="col-lg-6 text-center">
                    <h6 class="card-title">Platform</h6>
                    <div id="chart-platform" class="chartsh"></div>
                </div>
                <div class="col-lg-6 text-center">
                    <h6 class="card-title">Browser</h6>
                    <div id="chart-browser" class="chartsh"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('stylesheet')
    <style>
        .card-main {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
            margin: 3px;
        }

        .card-main:hover {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/daterangepicker/daterangepicker.css') }}">
    @vite(['resources/css/_c3-chart.scss']);
@endsection

@section('javascript')
    <script src="{{ asset('assets/templates/admin/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/charts-c3/d3.v5.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/charts-c3/c3-chart.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/input-mask/jquery.mask.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js" integrity="sha512-hktawXAt9BdIaDoaO9DlLp6LYhbHMi5A36LcXQeHgVKUH6kJMOQsAtIw2kmQ9RERDpnSTlafajo6USh9JUXckw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/templates/admin/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'page_title' => $page_attr['title'],
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
