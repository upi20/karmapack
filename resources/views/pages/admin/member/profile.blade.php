@extends('layouts.admin.master')

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
                            <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                <img alt="avatar" onclick="{$('#profile').trigger('click')}"
                                    onerror="this.src='{{ asset('assets/templates/admin/profile.png') }}';this.onerror='';"
                                    src="{{ $anggota->fotoUrl() }}" class="brround" id="img_profile"
                                    style="height: 80px; width: 80px; object-fit: cover; object-position: center; border-radius: 50%;">
                            </div>
                            <div class="text-center">
                                <h6 class="mb-1">{{ $anggota->nama }}</h6>
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
                                <h6 class="mb-1">Riwayat Kepengurusan:</h6>
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

                        <label for="foto" class="form-label mb-0">Foto Profile</label>
                        <div class="input-group password-toggle">
                            <span class="input-group-text toggle"><i class='far fa-user-circle'></i></span>
                            <input type="file" class="form-control" id="profile" name="profile" accept="image/*"
                                form="basic_profile">
                        </div>

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
                        <div class="text-end mt-3">
                            <button type="submit" form="basic_profile" class="btn btn-primary my-1">
                                <li class="fas fa-save mr-1"></li> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- profile address --}}
            <div class="card">
                <div class="card-body">
                    <h6 class="mt-2 text-uppercase">Alamat</h6>
                    <hr>
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
                    <div class="text-end mt-3">
                        <button type="submit" form="address_profile" class="btn btn-primary my-1">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            {{-- Ubah Profil --}}
            <div class="card">
                <div class="card-body">
                    <h6 class="mt-2 text-uppercase">Ubah Profil</h6>
                    <hr>
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
                    <div class="text-end mt-3">
                        <button type="submit" form="detail_profile" class="btn btn-primary my-1">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>

            {{-- Other information --}}
            <div class="row">
                @if ($google_accounts->count())
                    {{-- google akun --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="card-title d-md-flex flex-row justify-content-between mx-3 mt-3">
                                    <div>
                                        <h6 class="mt-2 text-uppercase">Akun Google</h6>
                                    </div>
                                </div>
                                <hr class="m-0">

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
                                                            <h6 class="mb-1">{{ $detail->name }}</h6>
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
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="card-title d-md-flex flex-row justify-content-between mx-3 mt-3">
                                <div>
                                    <h6 class="mt-2 text-uppercase">Kontak/Media Sosial</h6>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm" data-bs-effect="effect-scale"
                                        data-bs-toggle="modal" href="#modal-kontak" onclick="kontakAdd()"
                                        data-target="#modal-kontak" data-toggle="tooltip" title="Tambah Data">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="list-group list-group-flush" id="kontak-body"> </div>
                        </div>
                    </div>
                </div>

                {{-- Riwayat Pendidikan --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="card-title d-md-flex flex-row justify-content-between mx-3 mt-3">
                                <div>
                                    <h6 class="mt-2 text-uppercase">Riwayat Pendidikan</h6>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm" data-bs-effect="effect-scale"
                                        data-bs-toggle="modal" href="#modal-pendidikan" onclick="pendidikanAdd()"
                                        data-target="#modal-pendidikan" data-toggle="tooltip" title="Tambah Data"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="list-group list-group-flush" id="pendidikan-body"> </div>
                        </div>
                    </div>
                </div>

                {{-- Pengalaman Organisasi --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="card-title d-md-flex flex-row justify-content-between mx-3 mt-3">
                                <div>
                                    <h6 class="mt-2 text-uppercase">Pengalaman Organisasi</h6>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm" data-bs-effect="effect-scale"
                                        data-bs-toggle="modal" href="#modal-pengalaman_organisasi"
                                        onclick="pengalaman_organisasiAdd()" data-target="#modal-pengalaman_organisasi"
                                        data-toggle="tooltip" title="Tambah Data"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="list-group list-group-flush" id="pengalaman_organisasi-body"> </div>
                        </div>
                    </div>
                </div>

                {{-- Pengalaman Lain --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="card-title d-md-flex flex-row justify-content-between mx-3 mt-3">
                                <div>
                                    <h6 class="mt-2 text-uppercase">Pengalaman Lain</h6>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm" data-bs-effect="effect-scale"
                                        data-bs-toggle="modal" href="#modal-pengalaman_lain"
                                        onclick="pengalaman_lainAdd()"
                                        data-target="#modal-pengalaman_lain"data-toggle="tooltip" title="Tambah Data">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="list-group list-group-flush" id="pengalaman_lain-body"> </div>
                        </div>
                    </div>
                </div>

                {{-- Hobi --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-md-flex flex-row justify-content-between">
                                <div>
                                    <h6 class="mt-2 text-uppercase">Hobi</h6>
                                </div>
                                <div>
                                    <button type="submit" form="hobi_form" class="btn btn-primary btn-sm">
                                        <li class="fas fa-save mr-1"></li> Simpan Perubahan
                                    </button>
                                </div>
                            </div>

                            <form action="" id="hobi_form">
                                <input type="hidden" name="anggota_id" value="{{ $anggota->id }}">
                                <select class="form-control" data-role="tagsinput" id="hobis" multiple
                                    name="hobis[]">
                                    @foreach ($anggota->hobis->sortBy('nama') ?? [] as $hobi)
                                        <option value="{{ $hobi->nama }}" selected>{{ $hobi->nama }}</option>
                                    @endforeach
                                </select>
                                <p>*Tekan enter untuk menambahkan</p>
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
                        data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
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
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
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
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
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
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
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
    <link rel="stylesheet" href="{{ asset_admin('plugins/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset_admin('plugins/select2/css/select2-bootstrap-5-theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset_admin('plugins/input-tags/css/tagsinput.css') }}" />
@endsection

@section('javascript')
    <script src="{{ asset_admin('plugins/loading/loadingoverlay.min.js', name: 'sash') }}"></script>
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js', name: 'sash') }}"></script>
    <script src="{{ asset_admin('plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/select2/js/select2-custom.js') }}"></script>
    <script src="{{ asset_admin('plugins/input-tags/js/tagsinput.js') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'anggota_id' => $anggota->id,
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
