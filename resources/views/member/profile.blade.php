@extends('templates.admin.master')

@section('content')
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-xl-4">
            {{-- profile basic --}}
            <div class="card">
                <div class="card-body">
                    <form action="" id="basic_profile">
                        {{-- Poto profile --}}
                        <div class="text-center chat-image mb-5">
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input type="file" hidden="" id="profile" name="profile" accept="image/*">
                            <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                <img alt="avatar" onclick="{$('#profile').trigger('click')}"
                                    onerror="this.src='{{ asset('assets/templates/admin/images/profile.png') }}';this.onerror='';"
                                    src="{{ asset('assets/pengurus/profile/' . $user->foto) }}" class="brround"
                                    id="img_profile"
                                    style="height: 80px; width: 80px; object-fit: cover; object-position: center; border-radius: 50%;">

                                <label for="profile"><span class="badge rounded-pill avatar-icons bg-primary"><i
                                            class="fe fe-edit fs-12"></i></span></label>
                            </div>
                            <div class="text-center">
                                <h5 class="mb-1 text-dark fw-semibold">{{ $user->name }}</h5>
                                @if ($user->username)
                                    <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{ '@' . $user->username }}</p>
                                @endif
                            </div>
                        </div>

                        {{-- riwayat kepengurusan --}}
                        @if ($kepengurusan)
                            <div class="text-left mt-3">
                                <h5 class="mb-1 text-dark fw-semibold">Riwayat Kepengurusan:</h5>
                                @foreach ($kepengurusan as $p)
                                    <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{ $p['jabatan'] }}</p>
                                @endforeach
                            </div>
                        @endif

                        {{-- angkatan --}}
                        <div class="form-group  mt-3">
                            <label for="angkatan">Angkatan</label>
                            <input type="number" min="2003" max="9999" class="form-control" id="angkatan" name="angkatan"
                                placeholder="Tahun Masuk" value="{{ $user->angkatan }}" required>
                        </div>
                        <hr>

                        {{-- form profile --}}
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki" {{ $user->gender == 'laki-laki' ? 'selected' : '' }}>Laki-Laki
                                </option>
                                <option value="perempuan" {{ $user->gender == 'perempuan' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tentang Saya</label>
                            <textarea class="form-control" rows="6" name="bio" id="bio"
                                placeholder="My bio.........">{{ $user->bio }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="profesi">Profesi</label>
                            <select class="form-control select2" id="profesi" name="profesi" style="width: 100%">
                                @if ($user->profesi)
                                    <option value="{{ $user->profesi }}" selected>{{ $user->profesi }}</option>
                                @endif
                            </select>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" form="basic_profile" class="btn btn-success my-1">
                        <li class="fa fa-save mr-1"></li> Save changes
                    </button>
                </div>
            </div>

            {{-- profile address --}}
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Alamat</div>
                </div>
                <div class="card-body">
                    <form action="" id="address_profile">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group">
                            <label for="province_id" class="me-md-2">Provinsi</label>
                            <select class="form-control" id="province_id" name="province_id" style="width: 100%">
                                @foreach ($provinces as $province)
                                    @if (($user->province_id ?? 32) == $province->id)
                                        <option value="{{ $province->id }}" selected>
                                            {{ $province->name }}
                                        </option>
                                    @else
                                        <option value="{{ $province->id }}">
                                            {{ $province->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="regency_id" class="me-md-2">Kabupaten/Kota</label>
                            <select class="form-control" id="regency_id" name="regency_id" style="width: 100%">
                                @if ($user->regency_id)
                                    <option value="{{ $user->regency_id }}">{{ $user->regencie }}</option>
                                @else
                                    <option value="3203">KABUPATEN CIANJUR</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district_id" class="me-md-2">Kecamatan</label>
                            <select class="form-control" id="district_id" name="district_id" style="width: 100%">
                                @if ($user->district_id)
                                    <option value="{{ $user->district_id }}">{{ $user->district }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="village_id" class="me-md-2">Desa/Kelurahan</label>
                            <select class="form-control" id="village_id" name="village_id" style="width: 100%">
                                @if ($user->village_id)
                                    <option value="{{ $user->village_id }}">{{ $user->village }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="alamat_lengkap">Alamat Lengkap</label>
                            <textarea class="form-control" rows="3" name="alamat_lengkap" id="alamat_lengkap"
                                placeholder="Nama jalan, Rt/Rw, Patokan, Nomor Rumah Dan lain lain.">{{ $user->alamat_lengkap }}</textarea>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" form="address_profile" class="btn btn-success my-1">
                        <li class="fa fa-save mr-1"></li> Save changes
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            {{-- Edit Profile --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>
                <div class="card-body">
                    <form action="" id="detail_profile">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap"
                                value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Nama Profile</label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" id="username" placeholder="Ex: iseplutpinur"
                                    value="{{ $user->username }}">
                                <input type="hidden" id="username_slug" name="username">
                            </div>
                            <small id="username_preview">{{ env('APP_URL') . '/' . $user->username }}</small>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                title="Tanggal Lahir" value="{{ $user->date_of_birth }}" required>
                            <small class="text-danger">Tanggal lahir hanya di gunakan oleh admin untuk pengingat ulang
                                tahun anggota dan tidak akan di tampilkan/akses di halaman depan/utama.</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email"
                                value="{{ $user->email }}" required>
                            <small class="text-danger">Email hanya digunakan untuk login anggota dan tidak akan di
                                tampilkan/akses di halaman depan/utama.</small>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon"
                                title="Nomor telepon yang bisa di hubungi" placeholder="Nomor telepon"
                                value="{{ $user->telepon }}">
                        </div>
                        <div class="form-group">
                            <label for="whatsapp">WhatsApp</label>
                            <div class="input-group">
                                <span class="input-group-text" id="whatsapp">+62</span>
                                <input type="number" class="form-control" id="basic-url" aria-describedby="whatsapp"
                                    name="whatsapp" title="Nomor Whatsapp" placeholder="85798132505"
                                    value="{{ $user->whatsapp }}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" form="detail_profile" class="btn btn-success my-1">
                        <li class="fa fa-save mr-1"></li> Save changes
                    </button>
                </div>
            </div>

            {{-- Other information --}}
            <div class="row">
                {{-- kontak --}}
                <div class="col-12">
                    <div class="card panel-theme">
                        <div class="card-header  d-flex flex-row justify-content-between">
                            <div class="float-start">
                                <h3 class="card-title">Kontak/Media Sosial</h3>
                            </div>
                            <button class="btn btn-info btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                href="#modal-kontak" onclick="kontakAdd()" data-target="#modal-kontak"><i
                                    class="fa fa-plus me-2"></i>Tambah</button>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush" id="kontak-body">

                            </div>
                        </div>
                    </div>
                </div>

                {{-- Riwayat Pendidikan --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex flex-row justify-content-between">
                            <div class="card-title">Riwayat Pendidikan</div>
                            <button class="btn btn-info btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                href="#modal-pendidikan" onclick="pendidikanAdd()" data-target="#modal-pendidikan"><i
                                    class="fa fa-plus me-2"></i>Tambah</button>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush" id="pendidikan-body"> </div>
                        </div>
                    </div>
                </div>

                {{-- Pengalaman Organisasi --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex flex-row justify-content-between">
                            <div class="card-title">Pengalaman Organisasi</div>
                            <button class="btn btn-info btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                href="#modal-pengalaman_organisasi" onclick="pengalaman_organisasiAdd()"
                                data-target="#modal-pengalaman_organisasi"><i class="fa fa-plus me-2"></i>Tambah</button>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush" id="pengalaman_organisasi-body"> </div>
                        </div>
                    </div>
                </div>

                {{-- Pengalaman Lain --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex flex-row justify-content-between">
                            <div class="card-title">Pengalaman Lain</div>
                            <button class="btn btn-info btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                href="#modal-pengalaman_lain" onclick="pengalaman_lainAdd()"
                                data-target="#modal-pengalaman_lain"><i class="fa fa-plus me-2"></i>Tambah</button>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush" id="pengalaman_lain-body"> </div>
                        </div>
                    </div>
                </div>

                {{-- Hobi --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header  d-flex flex-row justify-content-between">
                            <div class="float-start">
                                <h3 class="card-title">Hobi</h3>
                            </div>
                            <button type="submit" form="hobi_form" class="btn btn-info btn-sm">
                                <li class="fa fa-save mr-1"></li> Save changes
                            </button>
                        </div>
                        <div class="card-body">
                            <form action="" id="hobi_form">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <select class="form-control" style="width: 100%;" required="" id="hobbies" multiple
                                    name="hobbies[]">
                                    @foreach ($hobbies as $hobby)
                                        <option value="{{ $hobby->name }}" selected>{{ $hobby->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 CLOSED -->

    {{-- modal --}}
    {{-- modal kontak --}}
    <div class="modal fade" id="modal-kontak">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-kontak-title"></h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="kontak_form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="id" id="kontak_id">
                        <div class="form-group">
                            <label class="form-label" for="kontak_tipe">Kontak Jenis/Tipe</label>
                            <select class="form-control" style="width: 100%;" required="" id="kontak_tipe" name="tipe">
                                @foreach ($kontak_tipe as $kontak)
                                    <option value="{{ $kontak->id }}">{{ $kontak->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="kontak">Kontak <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="kontak" name="kontak"
                                placeholder="Ex: https://facebook.com/iseplutpinur7" required="" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="kontak_form">
                        <li class="fa fa-save mr-1"></li> Save changes
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal pendidikan --}}
    <div class="modal fade" id="modal-pendidikan">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-pendidikan-title"></h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <form action="javascript:void(0)" id="pendidikan_form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="id" id="pendidikan_id">
                        <div class="form-group">
                            <label class="form-label" for="pendidikan_jenis">Pendidikan Jenis/Tipe</label>
                            <select class="form-control" style="width: 100%;" required="" id="pendidikan_jenis"
                                name="jenis">
                                @foreach ($pendidikan_jenis as $pendidikan)
                                    <option value="{{ $pendidikan->id }}">{{ $pendidikan->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="pendidikan">Instansi <span
                                    class="text-danger">*</span></label>
                            <select style="width: 100%;" class="form-control" id="pendidikan" name="pendidikan"
                                placeholder="Nama Tempat belajar, Sekolah DLL" required="">
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="pendidikan_dari">Dari <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="pendidikan_dari" name="dari"
                                        placeholder="Tahun Masuk" required="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="pendidikan_sampai">Sampai</label>
                                    <input type="number" class="form-control" id="pendidikan_sampai" name="sampai"
                                        placeholder="Tahun Keluar" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="pendidikan_jurusan">Jurusan </label>
                            <input type="text" class="form-control" id="pendidikan_jurusan" name="jurusan"
                                placeholder="Jika tidak ada bisa di kosongkan." />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="pendidikan_keterangan">Keterangan/Lainnya </label>
                            <input type="text" class="form-control" id="pendidikan_keterangan" name="keterangan"
                                placeholder="Contoh nama, kode, kelas DLL" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="pendidikan_form">
                        <li class="fa fa-save mr-1"></li> Save changes
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal pengalaman_organisasi --}}
    <div class="modal fade" id="modal-pengalaman_organisasi">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-pengalaman_organisasi-title"></h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <form action="javascript:void(0)" id="pengalaman_organisasi_form" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="id" id="pengalaman_organisasi_id">
                        <div class="form-group">
                            <label class="form-label" for="pengalaman_organisasi_nama">Nama Organisasi<span
                                    class="text-danger">*</span></label>
                            <select style="width: 100%;" class="form-control" id="pengalaman_organisasi_nama" name="nama"
                                placeholder="Nama Organisasi" required="">
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="pengalaman_organisasi_dari">Dari <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="pengalaman_organisasi_dari" name="dari"
                                        placeholder="Tahun Dari" required="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="pengalaman_organisasi_sampai">Sampai</label>
                                    <input type="number" class="form-control" id="pengalaman_organisasi_sampai"
                                        name="sampai" placeholder="Tahun Sampai" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="pengalaman_organisasi_jabatan">Jabatan <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="pengalaman_organisasi_jabatan" name="jabatan"
                                placeholder="Nama jabatan" required="" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="pengalaman_organisasi_keterangan">Keterangan/Lainnya
                            </label>
                            <input type="text" class="form-control" id="pengalaman_organisasi_keterangan"
                                name="keterangan" placeholder="Keterangan" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="pengalaman_organisasi_form">
                        <li class="fa fa-save mr-1"></li> Save changes
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal pengalaman_lain --}}
    <div class="modal fade" id="modal-pengalaman_lain">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-pengalaman_lain-title"></h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <form action="javascript:void(0)" id="pengalaman_lain_form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="id" id="pengalaman_lain_id">
                        <div class="form-group">
                            <label class="form-label" for="pengalaman_lain_pengalaman">Pengalaman <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" rows="6" name="pengalaman" id="pengalaman_lain_pengalaman" placeholder=""
                                required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="pengalaman_lain_keterangan">Keterangan/Lainnya
                            </label>
                            <input type="text" class="form-control" id="pengalaman_lain_keterangan" name="keterangan"
                                placeholder="Keterangan" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="pengalaman_lain_form">
                        <li class="fa fa-save mr-1"></li> Save changes
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('stylesheet')
    <link rel="stylesheet"
        href="{{ asset('assets/templates/admin/plugins/fontawesome-free-5.15.4-web/css/all.min.css') }}">
@endsection

@section('javascript')
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>
    <script>
        {!! $javascript !!}
    </script>
@endsection
