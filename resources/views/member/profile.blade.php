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
                            <input type="hidden" name="id" value="{{ $anggota->id }}">
                            <input type="file" hidden="" id="profile" name="profile" accept="image/*">
                            <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                <img alt="avatar" onclick="{$('#profile').trigger('click')}"
                                    onerror="this.src='{{ asset('assets/templates/admin/profile.png') }}';this.onerror='';"
                                    src="{{ $anggota->fotoUrl() }}" class="brround" id="img_profile"
                                    style="height: 80px; width: 80px; object-fit: cover; object-position: center; border-radius: 50%;">

                                <label for="profile">
                                    <span class="badge rounded-pill avatar-icons bg-primary">
                                        <i class="fas fa-edit fs-12"></i></span>
                                </label>
                            </div>
                            <div class="text-center">
                                <h5 class="mb-1 text-dark fw-semibold">{{ $anggota->nama }}</h5>
                                @if ($user->username)
                                    <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{ '@' . $user->username }}</p>
                                @endif
                            </div>
                        </div>

                        {{-- riwayat kepengurusan --}}
                        @php
                            $kepengurusans = $anggota->profileKepengurusans();
                        @endphp
                        @if ($kepengurusans)
                            <div class="text-left mt-3">
                                <h5 class="mb-1 text-dark fw-semibold">Riwayat Kepengurusan:</h5>
                                @foreach ($kepengurusans as $kepengurusan)
                                    <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{ $kepengurusan }}</p>
                                @endforeach
                            </div>
                        @endif

                        {{-- angkatan --}}
                        <div class="form-group  mt-3">
                            <label for="angkatan">Angkatan</label>
                            @if (config('app.user_input_angkatan'))
                                <input type="number" min="2003" max="9999" class="form-control" id="angkatan"
                                    name="angkatan" placeholder="Tahun Masuk" value="{{ $anggota->angkatan }}" required>
                            @else
                                <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{ $anggota->angkatan }}</p>
                                <input type="hidden" min="2003" max="9999" id="angkatan" name="angkatan"
                                    value="{{ $anggota->angkatan }}" required>
                            @endif
                        </div>
                        <hr>

                        {{-- form profile --}}
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki" {{ $anggota->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                                    Laki-Laki
                                </option>
                                <option value="perempuan" {{ $anggota->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tentang Saya</label>
                            <textarea class="form-control" rows="6" name="bio" id="bio" placeholder="My bio.........">{{ $anggota->bio }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="profesi">Profesi</label>
                            <select class="form-control select2" id="profesi" name="profesi" style="width: 100%">
                                @if ($anggota->profesi)
                                    <option value="{{ $anggota->profesi }}" selected>{{ $anggota->profesi }}</option>
                                @endif
                            </select>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" form="basic_profile" class="btn btn-success my-1">
                        <li class="fas fa-save mr-1"></li> Simpan Perubahan
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
                        <input type="hidden" name="id" value="{{ $anggota->id }}">
                        <div class="form-group">
                            <label for="province_id" class="me-md-2">Provinsi</label>
                            <select class="form-control" id="province_id" name="province_id" style="width: 100%">
                                @foreach ($provinces as $province)
                                    @if (($anggota->province_id ?? 32) == $province->id)
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
                                @if ($anggota->regency_id)
                                    <option value="{{ $anggota->regency_id }}">{{ $anggota->regencie->name }}</option>
                                @else
                                    <option value="3203">KABUPATEN CIANJUR</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district_id" class="me-md-2">Kecamatan</label>
                            <select class="form-control" id="district_id" name="district_id" style="width: 100%">
                                @if ($anggota->district_id)
                                    <option value="{{ $anggota->district_id }}">{{ $anggota->district->name }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="village_id" class="me-md-2">Desa/Kelurahan</label>
                            <select class="form-control" id="village_id" name="village_id" style="width: 100%">
                                @if ($anggota->village_id)
                                    <option value="{{ $anggota->village_id }}">{{ $anggota->village->name }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="alamat_lengkap">Alamat Lengkap</label>
                            <textarea class="form-control" rows="3" name="alamat_lengkap" id="alamat_lengkap"
                                placeholder="Nama jalan, Rt/Rw, Patokan, Nomor Rumah Dan lain lain.">{{ $anggota->alamat_lengkap }}</textarea>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" form="address_profile" class="btn btn-success my-1">
                        <li class="fas fa-save mr-1"></li> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            {{-- Ubah Profil --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ubah Profil</h3>
                </div>
                <div class="card-body">
                    <form action="" id="detail_profile">
                        <input type="hidden" name="id" value="{{ $anggota->id }}">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Nama Lengkap" value="{{ $anggota->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Nama Profil</label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" id="username" placeholder="Ex: iseplutpinur"
                                    value="{{ $user->username }}">
                                <input type="hidden" id="username_slug" name="username" value="{{ $user->username }}">
                            </div>
                            <small id="username_preview">{{ url('') . '/' . $user->username }}</small>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control date-input-str" id="tanggal_lahir"
                                name="tanggal_lahir" title="Tanggal Lahir" value="{{ $anggota->tanggal_lahir }}"
                                required>
                            <br>
                            <small class="text-danger">Tanggal lahir hanya di gunakan oleh admin untuk pengingat ulang
                                tahun anggota dan tidak akan di tampilkan/akses di halaman depan/utama.</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Alamat Email" value="{{ $user->email }}" required>
                            <small class="text-danger">Email hanya digunakan untuk login anggota dan tidak akan di
                                tampilkan/akses di halaman depan/utama.</small>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon"
                                title="Nomor telepon yang bisa di hubungi" placeholder="Nomor telepon"
                                value="{{ $anggota->telepon }}">
                        </div>
                        <div class="form-group">
                            <label for="whatsapp">WhatsApp</label>
                            <div class="input-group">
                                <span class="input-group-text" id="whatsapp">+62</span>
                                <input type="number" class="form-control" id="basic-url" aria-describedby="whatsapp"
                                    name="whatsapp" title="Nomor Whatsapp" placeholder="85798132505"
                                    value="{{ $anggota->whatsapp }}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" form="detail_profile" class="btn btn-success my-1">
                        <li class="fas fa-save mr-1"></li> Simpan Perubahan
                    </button>
                </div>
            </div>

            {{-- Other information --}}
            <div class="row">
                @if ($google_accounts->count())
                    {{-- google akun --}}
                    <div class="col-12" id="google_account_container">
                        <div class="card panel-theme">
                            <div class="card-header  d-flex flex-row justify-content-between">
                                <div class="float-start">
                                    <h3 class="card-title">Akun Google</h3>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush" id="akun-google-body">
                                    @foreach ($google_accounts as $akun)
                                        @php
                                            $detail = $akun->getProviderData();
                                        @endphp

                                        <div
                                            class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                                            <div>
                                                @if ($detail != null)
                                                    <div class="d-flex flex-row">
                                                        <img src="{{ $detail->avatar }}" alt="{{ $detail->name }}"
                                                            style="width: 45px; height: 45px; object-fit: cover; border-radius: 50%;">
                                                        <div class="ms-3">
                                                            <h5 class="mb-1">{{ $detail->name }}</h5>
                                                            <a href="mailto:{{ $detail->email }}"
                                                                class="link-primary">{{ $detail->email }}</a>
                                                        </div>
                                                    </div>
                                                @else
                                                    {{ $akun->provider_id }}
                                                @endif
                                            </div>

                                            <div>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="googleHapus({{ $akun->id }})" data-toggle="tooltip"
                                                    title="Hapus Data">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- kontak --}}
                <div class="col-12">
                    <div class="card panel-theme">
                        <div class="card-header  d-flex flex-row justify-content-between">
                            <div class="float-start">
                                <h3 class="card-title">Kontak/Media Sosial</h3>
                            </div>
                            <button class="btn btn-info btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                href="#modal-kontak" onclick="kontakAdd()" data-target="#modal-kontak"
                                data-toggle="tooltip" title="Tambah Data"><i class="fa fa-plus"></i></button>
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
                                href="#modal-pendidikan" onclick="pendidikanAdd()" data-target="#modal-pendidikan"
                                data-toggle="tooltip" title="Tambah Data"><i class="fa fa-plus"></i></button>
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
                                data-target="#modal-pengalaman_organisasi" data-toggle="tooltip" title="Tambah Data"><i
                                    class="fa fa-plus"></i></button>
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
                                data-target="#modal-pengalaman_lain"data-toggle="tooltip" title="Tambah Data">
                                <i class="fa fa-plus"></i>
                            </button>
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
                                <li class="fas fa-save mr-1"></li> Simpan Perubahan
                            </button>
                        </div>
                        <div class="card-body">
                            <form action="" id="hobi_form">
                                <input type="hidden" name="anggota_id" value="{{ $anggota->id }}">
                                <select class="form-control" style="width: 100%;" required="" id="hobis" multiple
                                    name="hobis[]">
                                    @foreach ($anggota->hobis->sortBy('nama') ?? [] as $hobi)
                                        <option value="{{ $hobi->nama }}" selected>{{ $hobi->nama }}</option>
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
                    <h6 class="modal-title" id="modal-kontak-title"></h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="kontak_form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="anggota_id" value="{{ $anggota->id }}">
                        <input type="hidden" name="id" id="kontak_id">
                        <div class="form-group">
                            <label class="form-label" for="kontak_jenis">Kontak Jenis/Tipe</label>
                            <select class="form-control" style="width: 100%;" required="" id="kontak_jenis"
                                name="jenis">
                                @foreach ($kontak_jenis as $kontak)
                                    <option value="{{ $kontak->id }}">{{ $kontak->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="kontak_nilai">Kontak
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="kontak_nilai" name="nilai"
                                placeholder="Ex: https://facebook.com/iseplutpinur7" required="" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="kontak_form">
                        <li class="fas fa-save mr-1"></li> Simpan Perubahan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
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
                        <input type="hidden" name="anggota_id" value="{{ $anggota->id }}">
                        <input type="hidden" name="id" id="pendidikan_id">
                        <div class="form-group">
                            <label class="form-label" for="pendidikan_jenis_id">Pendidikan Jenis/Tipe</label>
                            <select class="form-control" style="width: 100%;" required="" id="pendidikan_jenis_id"
                                name="jenis_id">
                                @foreach ($pendidikan_jenis as $pendidikan)
                                    <option value="{{ $pendidikan->id }}">{{ $pendidikan->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="pendidikan_instansi">Instansi <span
                                    class="text-danger">*</span></label>
                            <select style="width: 100%;" class="form-control" id="pendidikan_instansi" name="instansi"
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
                        <li class="fas fa-save mr-1"></li> Simpan Perubahan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
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
                        <input type="hidden" name="anggota_id" value="{{ $anggota->id }}">
                        <input type="hidden" name="id" id="pengalaman_organisasi_id">
                        <div class="form-group">
                            <label class="form-label" for="pengalaman_organisasi_nama">Nama Organisasi<span
                                    class="text-danger">*</span></label>
                            <select style="width: 100%;" class="form-control" id="pengalaman_organisasi_nama"
                                name="nama" placeholder="Nama Organisasi" required="">
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="pengalaman_organisasi_dari">Dari <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="pengalaman_organisasi_dari"
                                        name="dari" placeholder="Tahun Dari" required="" />
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
                        <li class="fas fa-save mr-1"></li> Simpan Perubahan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
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
                    <form action="javascript:void(0)" id="pengalaman_lain_form" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="anggota_id" value="{{ $anggota->id }}">
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
                        <li class="fas fa-save mr-1"></li> Simpan Perubahan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('stylesheet')
@endsection

@section('javascript')
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>
    <script>
        const anggota_id = {{ $anggota->id }};

        function showPreview(event, image_id) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById(image_id);
                preview.src = src;
            }
        }

        $(document).ready(() => {
            // select 2 =====================================================================================
            $('#profesi').select2({
                ajax: {
                    url: "{{ route('member.profile.profesi_select2') }}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                        }
                        return query;
                    }
                }
            });

            $('#province_id').select2();

            // initial
            $('#regency_id').select2({
                ajax: {
                    url: "{{ route('admin.address.regencie.select2') }}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                            province_id: $('#province_id').val()
                        }
                        return query;
                    }
                }
            });

            $('#district_id').select2({
                ajax: {
                    url: "{{ route('admin.address.district.select2') }}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                            regency_id: $('#regency_id').val()
                        }
                        return query;
                    }
                }
            });

            $('#village_id').select2({
                ajax: {
                    url: "{{ route('admin.address.village.select2') }}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                            district_id: $('#district_id').val()
                        }
                        return query;
                    }
                }
            });


            // clear child
            $('#province_id').on('select2:select', function(e) {
                clearRegency();
                clearDistrict();
                clearVillage();
            });

            $('#regency_id').on('select2:select', function(e) {
                clearDistrict();
                clearVillage();
            });

            $('#district_id').on('select2:select', function(e) {
                clearVillage();
            });

            // Crud
            $('#kontak_jenis').select2({
                dropdownParent: $('#modal-kontak')
            });

            $('#pendidikan_jenis_id').select2({
                dropdownParent: $('#modal-pendidikan')
            });


            $('#pendidikan_instansi').select2({
                ajax: {
                    url: "{{ route(h_prefix('pendidikan_select2')) }}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                            jenis_id: $('#pendidikan_jenis_id').val()
                        }
                        return query;
                    }
                },
                dropdownParent: $('#modal-pendidikan')
            });

            $('#pengalaman_organisasi_nama').select2({
                ajax: {
                    url: "{{ route('member.profile.pengalaman_organisasi_select2') }}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                        }
                        return query;
                    }
                },
                dropdownParent: $('#modal-pengalaman_organisasi')
            });

            $('#hobis').select2({
                ajax: {
                    url: "{{ route(h_prefix('hobi_select2')) }}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                        }
                        return query;
                    }
                }
            });

            // ==============================================================================================
            $("#username").keyup(function() {
                var Text = $(this).val();
                var result = Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');

                $('#username_preview').html(`{{ url('') }}/${result}`);
                $('#username_slug').val(result);
            });

            // insertForm ===================================================================================
            // Basic Profil
            $('#basic_profile').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit][form=basic_profile]', 'Simpan Perubahan');
                const route = "{{ route('member.profile.save_basic') }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#header_foto_profile').attr('src', ($('#img_profile').attr('src')));
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit][form=basic_profile]',
                            '<li class="fa fa-save mr-1"></li> Simpan Perubahan',
                            false);
                    }
                });
            });

            // Address Profil
            $('#address_profile').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit][form=address_profile]', 'Simpan Perubahan');
                const route = "{{ route('member.profile.save_address') }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#header_foto_profile').attr('src', ($('#img_profile').attr('src')));
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit][form=address_profile]',
                            '<li class="fa fa-save mr-1"></li> Simpan Perubahan',
                            false);
                    }
                });
            });

            // Detail Profil
            $('#detail_profile').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit][form=detail_profile]', 'Simpan Perubahan');
                const route = "{{ route('member.profile.save_detail') }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#header_foto_profile').attr('src', ($('#img_profile').attr('src')));
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit][form=detail_profile]',
                            '<li class="fa fa-save mr-1"></li> Simpan Perubahan',
                            false);
                    }
                });
            });

            $("body").on("change", "#profile", function(e) {
                var file = e.target.files[0];
                var mediabase64data;
                getBase64(file).then(
                    mediabase64data => $('#img_profile').attr('src', mediabase64data)
                );
            });

            // kontak insert/update
            $('#kontak_form').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit][form=kontak_form]', 'Simpan Perubahan');
                const route = ($('#kontak_id').val() == '') ?
                    "{{ route(h_prefix('kontak_insert')) }}" :
                    "{{ route(h_prefix('kontak_update')) }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#modal-kontak").modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        kontakRender();
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit][form=kontak_form]',
                            '<li class="fa fa-save mr-1"></li> Simpan Perubahan',
                            false);
                    }
                });
            });

            // hobis save
            $('#hobi_form').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit][form=hobi_form]', 'Simpan Perubahan');
                const route = "{{ route(h_prefix('hobi_save')) }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#header_foto_profile').attr('src', ($('#img_profile').attr('src')));
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit][form=hobi_form]',
                            '<li class="fa fa-save mr-1"></li> Simpan Perubahan',
                            false);
                    }
                });
            });

            // pendidikan insert/update
            $('#pendidikan_form').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit][form=pendidikan_form]', 'Simpan Perubahan');
                const route = ($('#pendidikan_id').val() == '') ?
                    "{{ route(h_prefix('pendidikan_insert')) }}" :
                    "{{ route(h_prefix('pendidikan_update')) }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#modal-pendidikan").modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        pendidikanRender();
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit][form=pendidikan_form]',
                            '<li class="fa fa-save mr-1"></li> Simpan Perubahan',
                            false);
                    }
                });
            });

            // pengalaman_organisasi insert/update
            $('#pengalaman_organisasi_form').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit][form=pengalaman_organisasi_form]', 'Simpan Perubahan');
                const route = ($('#pengalaman_organisasi_id').val() == '') ?
                    "{{ route(h_prefix('pengalaman_organisasi_insert')) }}" :
                    "{{ route(h_prefix('pengalaman_organisasi_update')) }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#modal-pengalaman_organisasi").modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        pengalaman_organisasiRender();
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit][form=pengalaman_organisasi_form]',
                            '<li class="fa fa-save mr-1"></li> Simpan Perubahan',
                            false);
                    }
                });
            });

            // pengalaman_lain insert/update
            $('#pengalaman_lain_form').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit][form=pengalaman_lain_form]', 'Simpan Perubahan');
                const route = ($('#pengalaman_lain_id').val() == '') ?
                    "{{ route(h_prefix('pengalaman_lain_insert')) }}" :
                    "{{ route(h_prefix('pengalaman_lain_update')) }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#modal-pengalaman_lain").modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        pengalaman_lainRender();
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit][form=pengalaman_lain_form]',
                            '<li class="fa fa-save mr-1"></li> Simpan Perubahan',
                            false);
                    }
                });
            });

        })

        function getBase64(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => resolve(reader.result);
                reader.onerror = error => reject(error);
            });
        }

        function clearRegency() {
            $('#regency_id')
                .append((new Option('', '', true, true)))
                .trigger('change');
        }

        function clearDistrict() {
            $('#district_id')
                .append((new Option('', '', true, true)))
                .trigger('change');
        }

        function clearVillage() {
            $('#village_id')
                .append((new Option('', '', true, true)))
                .trigger('change');
        }

        function isValidURL(string) {
            // https://stackoverflow.com/questions/5717093/check-if-a-javascript-string-is-a-url | Vikasdeep Singh
            var res = string.match(
                /(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
            return (res !== null)
        };

        // Kontak =================================================================================
        function kontakAdd() {
            $('#modal-kontak-title').html('Tambah Kontak');
            $('#kontak_form').trigger("reset");
            $('#kontak_id').val('');
        }

        function kontakUbah(datas) {
            const data = datas.dataset;
            $('#modal-kontak-title').html("Ubah Kontak");
            $('#modal-kontak').modal('show');
            $('#kontak_form').trigger("reset");
            $('#kontak_id').val(data.id);
            $('#kontak_nilai').val(data.nilai);
            $('#kontak_jenis').val(data.jenis_id).trigger('change');;
        }

        function kontakHapus(id) {
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Untuk menghapus Kontak ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url(h_prefix_uri('kontak_delete')) }}/${id}`,
                        type: 'DELETE',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            swal.fire({
                                title: 'Please Wait..!',
                                text: 'Is working..',
                                onOpen: function() {
                                    Swal.showLoading()
                                }
                            })
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Kontak berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            kontakRender();
                        },
                        complete: function() {
                            swal.hideLoading();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal.hideLoading();
                            swal.fire("!Opps ", "Something went wrong, try again later", "error");
                        }
                    });
                }
            });
        }

        function kontakRender() {
            const kontak_body = $('#kontak-body');
            kontak_body.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: "{{ route(h_prefix('kontak')) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    anggota_id
                },
                success: (data) => {
                    kontak_body.html('');
                    data.datas.forEach(e => {
                        const nilai = isValidURL(e.nilai) ?
                            `<a href="${e.nilai}" class="link-primary">${e.nilai}</a>` :
                            `<p class="mb-1">${e.nilai}</p>`;
                        kontak_body.append(`
                        <div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                                <div>
                                    <div class="d-flex w-100">
                                        <i class="${e.icon} me-3"></i>
                                        <h5 class="mb-1">${e.kontak}</h5>
                                    </div>
                                    ${nilai}
                                </div>

                                <div>
                                    <button class="btn btn-primary btn-sm"
                                        data-nilai="${e.nilai}"
                                        data-id="${e.id}"
                                        data-jenis_id="${e.kontak_id}"
                                        onclick="kontakUbah(this)"
                                        data-toggle="tooltip"
                                        title="Ubah Data">
                                        <i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="kontakHapus('${e.id}')"
                                        data-toggle="tooltip"
                                        title="Hapus Data">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        `);
                    });

                    tooltip_refresh();
                },
                error: function(data) {
                    const res = data.responseJSON ?? {};
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res.message ?? 'Something went wrong',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                complete: function() {
                    kontak_body.LoadingOverlay("hide");
                }
            });
        }

        // pendidikan =================================================================================
        function pendidikanAdd() {
            $('#modal-pendidikan-title').html('Tambah Pendidikan');
            $('#pendidikan_form').trigger("reset");
            $('#pendidikan_id').val('');
        }

        function pendidikanUbah(datas) {
            const data = datas.dataset;
            $('#modal-pendidikan-title').html("Ubah Kontak");
            $('#modal-pendidikan').modal('show');
            $('#pendidikan_form').trigger("reset");
            $('#pendidikan_id').val(data.id);
            $('#pendidikan_dari').val(data.dari);
            $('#pendidikan_sampai').val(data.sampai);
            $('#pendidikan_jurusan').val(data.jurusan);
            $('#pendidikan_keterangan').val(data.keterangan);

            $('#pendidikan_instansi').append((new Option(data.instansi, data.instansi, true, true))).trigger('change');
            $('#pendidikan_jenis_id').val(data.jenis_id).trigger('change');
        }

        function pendidikanHapus(id) {
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Untuk menghapus data Pendidikan ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url(h_prefix_uri('pendidikan_delete')) }}/${id}`,
                        type: 'DELETE',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            swal.fire({
                                title: 'Please Wait..!',
                                text: 'Is working..',
                                onOpen: function() {
                                    Swal.showLoading()
                                }
                            })
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data Pendidikan berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            pendidikanRender();
                        },
                        complete: function() {
                            swal.hideLoading();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal.hideLoading();
                            swal.fire("!Opps ", "Something went wrong, try again later", "error");
                        }
                    });
                }
            });
        }

        function pendidikanRender() {
            const element = $('#pendidikan-body');
            element.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: "{{ route(h_prefix('pendidikan')) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    anggota_id
                },
                success: (data) => {
                    element.html('');
                    data.datas.forEach(e => {
                        const jurusan = e.jurusan ? `<p class="my-0">${e.jurusan}</p>` : '';
                        const keterangan = e.keterangan ? `<p class="my-0">${e.keterangan}</p>` : '';

                        element.append(`
                                <div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                                    <div>
                                        <div class="d-flex w-100">
                                            <h5 class="mb-1 fw-bold">${e.jenis_nama}</h5>
                                        </div>
                                        <p class="my-0">${e.dari}-${e.sampai ?? 'Sekarang'} | ${e.instansi}</p>
                                        ${jurusan}
                                        ${keterangan}
                                    </div>

                                    <div class="text-md-center">
                                        <button class="btn btn-primary btn-sm my-1"
                                            data-id="${e.id}"
                                            data-instansi="${e.instansi}"
                                            data-dari="${e.dari}"
                                            data-jurusan="${e.jurusan ?? ''}"
                                            data-sampai="${e.sampai ?? ''}"
                                            data-keterangan="${e.keterangan ?? ''}"
                                            data-jenis_id="${e.jenis_id}"
                                            data-jenis_nama="${e.jenis_nama}"
                                            onclick="pendidikanUbah(this)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm my-1" onclick="pendidikanHapus('${e.id}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                        `);
                    });
                },
                error: function(data) {
                    const res = data.responseJSON ?? {};
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res.message ?? 'Something went wrong',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                complete: function() {
                    element.LoadingOverlay("hide");
                }
            });
        }

        // pengalaman_organisasi ==================================================================
        function pengalaman_organisasiAdd() {
            $('#modal-pengalaman_organisasi-title').html('Tambah Pengalaman Organisasi');
            $('#pengalaman_organisasi_form').trigger("reset");
            $('#pengalaman_organisasi_id').val('');
            $('#pengalaman_organisasi_nama').append((new Option('Nama Organisasi', '', true, true)))
                .trigger('change');
        }

        function pengalaman_organisasiUbah(datas) {
            const data = datas.dataset;
            $('#modal-pengalaman_organisasi-title').html("Ubah Pengalaman Organisasi");
            $('#modal-pengalaman_organisasi').modal('show');
            $('#pengalaman_organisasi_form').trigger("reset");
            $('#pengalaman_organisasi_id').val(data.id);
            $('#pengalaman_organisasi_keterangan').val(data.keterangan);
            $('#pengalaman_organisasi_dari').val(data.dari);
            $('#pengalaman_organisasi_sampai').val(data.sampai);
            $('#pengalaman_organisasi_jabatan').val(data.jabatan);
            $('#pengalaman_organisasi_nama').append((new Option(data.nama, data.nama, true, true)))
                .trigger('change');
        }

        function pengalaman_organisasiHapus(id) {
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Untuk menghapus data Pengalaman Organisasi ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url(h_prefix_uri('pengalaman_organisasi_delete')) }}/${id}`,
                        type: 'DELETE',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            swal.fire({
                                title: 'Please Wait..!',
                                text: 'Is working..',
                                onOpen: function() {
                                    Swal.showLoading()
                                }
                            })
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data Pengalaman Organisasi berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            pengalaman_organisasiRender();
                        },
                        complete: function() {
                            swal.hideLoading();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal.hideLoading();
                            swal.fire("!Opps ", "Something went wrong, try again later", "error");
                        }
                    });
                }
            });
        }

        function pengalaman_organisasiRender() {
            const element = $('#pengalaman_organisasi-body');
            element.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: "{{ route('member.profile.pengalaman_organisasi') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    anggota_id
                },
                success: (data) => {
                    element.html('');
                    data.datas.forEach(e => {
                        const keterangan = e.keterangan ? `<p class="my-0">${e.keterangan}</p>` : '';

                        element.append(`
                                <div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                                    <div>
                                        <div class="d-flex w-100">
                                            <h5 class="mb-1 fw-bold">${e.nama}</h5>
                                        </div>
                                        <p class="my-0">${e.dari}-${e.sampai ?? 'Sekarang'} | ${e.jabatan}</p>
                                        ${keterangan}
                                    </div>

                                    <div class="text-md-center">
                                        <button class="btn btn-primary btn-sm my-1"
                                            data-id="${e.id}"

                                            data-nama="${e.nama}"
                                            data-dari="${e.dari}"
                                            data-jabatan="${e.jabatan ?? ''}"
                                            data-sampai="${e.sampai ?? ''}"
                                            data-keterangan="${e.keterangan ?? ''}"
                                            onclick="pengalaman_organisasiUbah(this)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm my-1" onclick="pengalaman_organisasiHapus('${e.id}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                        `);
                    });
                },
                error: function(data) {
                    const res = data.responseJSON ?? {};
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res.message ?? 'Something went wrong',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                complete: function() {
                    element.LoadingOverlay("hide");
                }
            });
        }


        // pengalaman_lain ==================================================================
        function pengalaman_lainAdd() {
            $('#modal-pengalaman_lain-title').html('Tambah Pengalaman Lain');
            $('#pengalaman_lain_form').trigger("reset");
            $('#pengalaman_lain_id').val('');
        }

        function pengalaman_lainUbah(datas) {
            const data = datas.dataset;
            $('#modal-pengalaman_lain-title').html("Ubah Pengalaman Lain");
            $('#modal-pengalaman_lain').modal('show');
            $('#pengalaman_lain_form').trigger("reset");
            $('#pengalaman_lain_id').val(data.id);
            $('#pengalaman_lain_keterangan').val(data.keterangan);
            $('#pengalaman_lain_pengalaman').val(data.pengalaman);
        }

        function pengalaman_lainHapus(id) {
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Untuk menghapus data Pengalaman Lain ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url('member/profile/pengalaman_lain_delete') }}/${id}`,
                        type: 'DELETE',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            swal.fire({
                                title: 'Please Wait..!',
                                text: 'Is working..',
                                onOpen: function() {
                                    Swal.showLoading()
                                }
                            })
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data Pengalaman Lain berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            pengalaman_lainRender();
                        },
                        complete: function() {
                            swal.hideLoading();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal.hideLoading();
                            swal.fire("!Opps ", "Something went wrong, try again later", "error");
                        }
                    });
                }
            });
        }

        function pengalaman_lainRender() {
            const element = $('#pengalaman_lain-body');
            element.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: "{{ route(h_prefix('pengalaman_lain')) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    anggota_id
                },
                success: (data) => {
                    element.html('');
                    data.datas.forEach(e => {
                        element.append(`
                                <div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                                    <div>
                                        <p class="my-0">${e.pengalaman}</p>
                                        <small>${e.keterangan ?? ''}</small>
                                    </div>

                                    <div class="text-md-center">
                                        <button class="btn btn-primary btn-sm my-1"
                                            data-id="${e.id}"

                                            data-pengalaman="${e.pengalaman}"
                                            data-keterangan="${e.keterangan ?? ''}"
                                            onclick="pengalaman_lainUbah(this)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm my-1" onclick="pengalaman_lainHapus('${e.id}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                        `);
                    });
                },
                error: function(data) {
                    const res = data.responseJSON ?? {};
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res.message ?? 'Something went wrong',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                complete: function() {
                    element.LoadingOverlay("hide");
                }
            });
        }

        function googleHapus(id) {
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Untuk menghapus data akun google ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url('member/profile/google_delete') }}/${id}`,
                        type: 'DELETE',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            swal.fire({
                                title: 'Please Wait..!',
                                text: 'Is working..',
                                onOpen: function() {
                                    Swal.showLoading()
                                }
                            })
                        },
                        success: function(data) {
                            renderGoogle(data);
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data Pengalaman Lain berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            pengalaman_lainRender();
                        },
                        complete: function() {
                            swal.hideLoading();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal.hideLoading();
                            swal.fire("!Opps ", "Something went wrong, try again later", "error");
                        }
                    });
                }
            });
        }

        function renderGoogle(datas) {
            const body = $('#akun-google-body');
            body.html('');
            datas.forEach(e => {
                if (e.detail != null) {
                    const detail = e.detail;
                    body.append(`<div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                                    <div>
                                        <div class="d-flex flex-row">
                                            <img src="${detail.avatar}" alt="${ detail.name }"
                                                style="width: 45px; height: 45px; object-fit: cover; border-radius: 50%;">
                                            <div class="ms-3">
                                                <h5 class="mb-1">${ detail.name }</h5>
                                                <a href="mailto:${ detail.email }"
                                                    class="link-primary">${ detail.email }</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="googleHapus(${ e.id })" data-toggle="tooltip"
                                            title="Hapus Data">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>`);

                } else {
                    body.append(`<div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                                    <div>
                                        ${ e.provider_id }
                                    </div>

                                    <div>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="googleHapus(${ e.id })" data-toggle="tooltip"
                                            title="Hapus Data">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div`);
                }
            });
        }

        // initial function
        kontakRender();
        pendidikanRender();
        pengalaman_organisasiRender();
        pengalaman_lainRender();
    </script>
@endsection

{{-- INSERT INTO `social_accounts` (`id`, `user_id`, `provider_id`, `provider_name`, `provider_data`, `created_at`, `updated_at`) VALUES (NULL, '1', '111291161449881637624', 'google', '{\"id\":\"111291161449881637624\",\"nickname\":null,\"name\":\"Isep Lutpi Nur (upi)\",\"email\":\"iseplutpinur7@gmail.com\",\"avatar\":\"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZdwkAeMu6tgf95EzVDIiZPwijo5jBB3yzRDwe8=s96-c\",\"user\":{\"sub\":\"111291161449881637624\",\"name\":\"Isep Lutpi Nur (upi)\",\"given_name\":\"Isep\",\"family_name\":\"Lutpi Nur\",\"picture\":\"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZdwkAeMu6tgf95EzVDIiZPwijo5jBB3yzRDwe8=s96-c\",\"email\":\"iseplutpinur7@gmail.com\",\"email_verified\":true,\"locale\":\"id\",\"id\":\"111291161449881637624\",\"verified_email\":true,\"link\":null},\"attributes\":{\"id\":\"111291161449881637624\",\"nickname\":null,\"name\":\"Isep Lutpi Nur (upi)\",\"email\":\"iseplutpinur7@gmail.com\",\"avatar\":\"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZdwkAeMu6tgf95EzVDIiZPwijo5jBB3yzRDwe8=s96-c\",\"avatar_original\":\"https:\\/\\/lh3.googleusercontent.com\\/a\\/AGNmyxZdwkAeMu6tgf95EzVDIiZPwijo5jBB3yzRDwe8=s96-c\"},\"token\":\"ya29.a0AVvZVsqEs_Jb8m7mGikJZVIoAbCVHI9YwX1iPanxlRrz0kmeBYhidWNPTyyVQNEdO_3IvlfEUoUGeK97GkEUXI789nPix7sbnrQRfUf2AexzX5akjYKcRN3Q8wZtqSP3l1RtWwtDyLFVLKeK2Ayjkb8hi833zQaCgYKAegSARMSFQGbdwaIIDz7C0laJXfrF3AOr-LAEw0165\",\"refreshToken\":null,\"expiresIn\":3599,\"approvedScopes\":[\"openid\",\"https:\\/\\/www.googleapis.com\\/auth\\/userinfo.email\",\"https:\\/\\/www.googleapis.com\\/auth\\/userinfo.profile\"]}', '2023-03-16 02:13:21', '2023-03-16 02:13:21') --}}
