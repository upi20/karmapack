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
                                    onerror="this.src='{{ asset('assets/templates/admin/main/assets/images/profile.png') }}';this.onerror='';"
                                    src="{{ asset('assets/pengurus/profile/' . $user->foto) }}" class="brround"
                                    id="img_profile"
                                    style="height: 80px; width: 80px; object-fit: cover; object-position: center; border-radius: 50%;">

                                <label for="profile"><span class="badge rounded-pill avatar-icons bg-primary"><i
                                            class="fe fe-edit fs-12"></i></span></label>
                            </div>
                            <div class="text-center">
                                <h5 class="mb-1 text-dark fw-semibold">{{ $user->name }}</h5>
                                @if ($user->username)
                                    <p class="text-muted mt-0 mb-0 pt-0 fs-13">@{{ $user - > username }}</p>
                                @endif
                            </div>
                        </div>

                        {{-- angkatan --}}
                        <div class="text-left mt-3">
                            <h5 class="mb-1 text-dark fw-semibold">Angkatan:</h5>
                            <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{ $user->angkatan }}</p>
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
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email"
                                value="{{ $user->email }}" required>
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
                <div class="col-12">
                    {{-- kontak --}}
                    <div class="card panel-theme">
                        <div class="card-header">
                            <div class="float-start">
                                <h3 class="card-title">Kontak/Media Sosial</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group">
                                <div class="list-group-item list-group-item-action flex-column align-items-start active">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <div class="btn-group mt-2 mb-2">
                                            <button type="button" class="btn btn-facebook btn-pill dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                                <i class="fa fa-facebook"></i> <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li class="dropdown-plus-title">
                                                    Dropdown
                                                    <b class="fa fa-angle-up" aria-hidden="true"></b>
                                                </li>
                                                <li><a href="javascript:void(0)">Action</a></li>
                                                <li><a href="javascript:void(0)">Another action</a></li>
                                                <li><a href="javascript:void(0)">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="javascript:void(0)">Separated link</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus.
                                        Maecenas sed diam eget risus varius blandit.</p>
                                    <small class="text-muted">Donec id elit non mi porta.</small>
                                </div>
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus.
                                        Maecenas sed diam eget risus varius blandit.</p>
                                    <small class="text-muted">Donec id elit non mi porta.</small>
                                </div>
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus.
                                        Maecenas sed diam eget risus varius blandit.</p>
                                    <small class="text-muted">Donec id elit non mi porta.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Riwayat Pendidikan</div>
                        </div>
                        <div class="card-body">
                            Riwayat Pendidikan
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Pengalaman Organisasi</div>
                        </div>
                        <div class="card-body">
                            Pengalaman Organisasi
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Pengalaman Lain</div>
                        </div>
                        <div class="card-body">
                            Pengalaman Lain
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Hobi</div>
                        </div>
                        <div class="card-body">
                            Hobi
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 CLOSED -->
@endsection

@section('javascript')
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
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
                    url: "{{ route('admin.user.select2.profesi') }}",
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




            // ==============================================================================================
            $("#username").keyup(function() {
                var Text = $(this).val();
                var result = Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');

                $('#username_preview').html(`{{ env('APP_URL') }}/${result}`);
                $('#username_slug').val(result);
            });

            // insertForm ===================================================================================
            // Basic Profile
            $('#basic_profile').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit][form=basic_profile]', 'Save Changes');
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
                            title: 'Data saved successfully',
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
                            '<li class="fa fa-save mr-1"></li> Save changes',
                            false);
                    }
                });
            });

            // Address Profile
            $('#address_profile').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit][form=address_profile]', 'Save Changes');
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
                            title: 'Data saved successfully',
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
                            '<li class="fa fa-save mr-1"></li> Save changes',
                            false);
                    }
                });
            });

            // Detail Profile
            $('#detail_profile').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit][form=detail_profile]', 'Save Changes');
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
                            title: 'Data saved successfully',
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
                            '<li class="fa fa-save mr-1"></li> Save changes',
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
    </script>
@endsection
