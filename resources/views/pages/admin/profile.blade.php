@extends('layouts.admin.master')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ auth()->user()->fotoUrl() }}" alt="Admin" class="rounded-circle p-1 bg-primary"
                            width="110">
                        <div class="mt-3">
                            <h4>{{ auth()->user()->name }}</h4>
                            <p class="text-secondary mb-1">
                                {{ ucfirst(implode(', ',auth()->user()->roles->map(function ($v) {return $v->name;})->toArray())) }}
                            </p>
                        </div>
                    </div>
                    <hr />

                    <form id="form_profile">
                        <label for="foto" class="form-label mb-0">Foto Profile</label>
                        <div class="input-group password-toggle">
                            <span class="input-group-text toggle"><i class='far fa-user-circle'></i></span>
                            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
                        </div>
                        <div class="input-group password-toggle mt-3">
                            <span class="input-group-text toggle"><i class='fas fa-user'></i></span>
                            <input type="text" class="form-control" id="name" name="name" required=""
                                placeholder="Nama Lengkap" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="input-group password-toggle mt-3">
                            <span class="input-group-text toggle"><i class='fas fa-envelope'></i></span>
                            <input type="email" class="form-control" id="email" name="email" required=""
                                placeholder="Email" value="{{ auth()->user()->email }}">
                        </div>
                    </form>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary" form="form_profile">
                            <li class="fas fa-save mr-1"></li> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h6 class="mt-2 text-uppercase">Ganti Password</h6>
                    <hr>
                    <form id="form_password">
                        <div class="row mb-3">
                            <label for="current_password" class="col-xl-3 col-form-label">Password Lama</label>
                            <div class="col-xl-9">
                                <div class="input-group password-toggle">
                                    <span class="input-group-text toggle"><i class='fas fa-eye'></i></span>
                                    <input type="password" class="form-control" id="current_password"
                                        name="current_password" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="new_password" class="col-xl-3 col-form-label">Password Baru</label>
                            <div class="col-xl-9">
                                <div class="input-group password-toggle">
                                    <span class="input-group-text toggle"><i class='fas fa-eye'></i></span>
                                    <input type="password" class="form-control" id="new_password" name="new_password"
                                        required="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="repeat_password" class="col-xl-3 col-form-label">Ulangi Password Baru</label>
                            <div class="col-xl-9">
                                <div class="input-group password-toggle">
                                    <span class="input-group-text toggle"><i class='fas fa-eye'></i></span>
                                    <input type="password" class="form-control" id="repeat_password" name="repeat_password"
                                        required="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-xl-3 col-form-label"></label>
                            <div class="col-xl-9">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary" form="form_password">
                                        <li class="fas fa-save mr-1"></li> Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('stylesheet')
    <style>
        .password-toggle>.toggle {
            cursor: pointer;
        }
    </style>
@endsection

@section('javascript')
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js', name: 'sash') }}"></script>
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
