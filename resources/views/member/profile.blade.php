@extends('templates.admin.master')

@section('content')
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <form action="" id="basic_profile">
                        {{-- Poto profile --}}
                        <div class="text-center chat-image mb-5">
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input type="file" hidden="" id="profile" name="profile" accept="image/*"
                                onchange="showPreview(event, 'img_profile');">
                            <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                <img alt="avatar" onclick="{$('#profile').trigger('click')}"
                                    data-src="{{ asset('assets/templates/admin/main/assets/images/profile.png') }}"
                                    src="{{ asset('assets/templates/admin/main/assets/images/profile.png') }}"
                                    class="brround" id="img_profile"
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

            {{-- kontak --}}
            <div class="card panel-theme">
                <div class="card-header">
                    <div class="float-start">
                        <h3 class="card-title">Kontak/Media Sosial</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    Kontak here
                </div>
            </div>


        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="username">Nama Profile</label>
                        <div class="input-group">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Ex: iseplutpinur">
                            <input type="hidden" id="username_slug" name="username_slug">
                        </div>
                        <small id="username_preview">{{ env('APP_URL') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Alamat Email">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Nomor Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon"
                            title="Nomor telepon yang bisa di hubungi" placeholder="Nomor telepon">
                    </div>
                    <div class="form-group">
                        <label for="whatsapp">WhatsApp</label>
                        <div class="input-group">
                            <span class="input-group-text" id="whatsapp">+62</span>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="whatsapp"
                                name="whatsapp" title="Nomor Whatsapp" placeholder="85798132505">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-success my-1">Save</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Alamat</div>
                        </div>
                        <div class="card-body">
                            Address Here
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

            $("#username").keyup(function() {
                var Text = $(this).val();
                var result = Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');

                $('#username_preview').html(`{{ env('APP_URL') }}/${result}`);
                $('#username_slug').val(result);
            });

            // insertForm ===================================================================================
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
        })
    </script>
@endsection
