@extends('templates.admin.master')

@section('content')
    <div class="card">
        <div class="card-header d-md-flex flex-row justify-content-between">
            <h3 class="card-title">{{ $page_attr['title'] }}</h3>
            <a type="button" class="btn btn-rounded btn-success btn-sm" href="{{ route(h_prefix(null, 2)) }}">
                <i class="fe fe-arrow-left"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Name" required="" value="{{ $model->name }}" />
                            <input type="hidden" id="id" name="id" value="{{ $model->id }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="guard_name">Guard <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="guard_name" name="guard_name"
                                placeholder="Enter Guard" required="" value="{{ $model->guard_name }}" />
                        </div>
                    </div>
                </div>
                <div class="form-label">Permission <span class="text-danger">*</span></div>
                <label for="">Description:
                    <i class="fas fa-square text-success"></i> = Page,
                    <i class="fas fa-square"></i> = Feature
                </label>
                <div class="custom-controls-stacked">
                    @foreach ($permissions as $k => $p)
                        @php
                            $current = $p->name;
                            $next = isset($permissions[$k + 1]) ? $permissions[$k + 1]->name : '';
                            $color = count(explode('.', $current)) == count(explode('.', $next)) - 1 && str_contains($next, $current);
                        @endphp
                        <label class="custom-control custom-checkbox-md float-start me-2" style="min-width: 320px">
                            <input type="checkbox" class="custom-control-input" name="permissions[]"
                                value="{{ $p->name }}" {{ in_array($p->name, $roles) ? 'checked' : '' }}>
                            <span
                                class="custom-control-label {{ $p->page || $color ? 'fw-bold text-success' : '' }}">{{ $p->name }}</span>
                        </label>
                    @endforeach
                </div>
            </form>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary" id="btn-save" form="MainForm">
                <li class="fas fa-save mr-1"></li> Save changes
            </button>
        </div>
    </div>
@endsection
@section('javascript')
    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>

    <script>
        const reload = {{ $reload == 1 ? 'true' : 'false' }};
        $(document).ready(function() {
            $('#MainForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                setBtnLoading('#btn-save', 'Save Changes');
                $.ajax({
                    type: "POST",
                    url: $('#id').val() == '' ? `{{ route(h_prefix('store', 2)) }}` :
                        `{{ route(h_prefix('update', 2)) }}`,
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

                        if (reload) {
                            setTimeout(() => {
                                window.location.href =
                                    `{{ route(h_prefix(null, 2)) }}`;
                            }, 1500);
                        }
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
                        setBtnLoading('#btn-save',
                            '<li class="fas fa-save mr-1"></li> Save changes',
                            false);
                    }
                });
            });
        });
    </script>
@endsection
