@extends('templates.admin.master')

@section('content')
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">User Table</h3>
                    <div>
                        <button class="btn btn-success" onclick="exportExcel()">
                            <i class="fa fa-file-excel-o"></i> Excel
                        </button>
                        <button type="button" class="btn btn-rounded btn-primary" data-bs-effect="effect-scale"
                            data-bs-toggle="modal" href="#modal-default" onclick="add()" data-target="#modal-default">
                            <i class="bi bi-plus-lg"></i> Add
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="h5">Filter Data</h5>
                    <form action="javascript:void(0)" class="form-inline ml-md-3 mb-md-3" id="FilterForm">
                        <div class="form-group me-md-3">
                            <label for="filter_role">User Role</label>
                            <select class="form-control" id="filter_role" name="filter_role" style="max-width: 200px">
                                <option value="">All User Role</option>
                                @foreach ($user_role as $role)
                                    <option value="{{ $role }}">
                                        {{ ucfirst(implode(' ', explode('_', $role))) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group me-md-3">
                            <label for="filter_active">User Active</label>
                            <select class="form-control" id="filter_active" name="filter_active" style="max-width: 200px">
                                <option value="">All User Active</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-md btn-info" title="Refresh Filter Table">
                            <i class="bi bi-arrow-repeat"></i> Refresh
                        </button>
                    </form>
                    <div class="table-responsive table-striped">
                        <table class="table table-bordered text-nowrap border-bottom" id="tbl_main">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Generation</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>DOB</th>
                                    <th>BIRTHDAY</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-default-title"></h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="UserForm" name="UserForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="form-label" for="angkatan">Generation <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="angkatan" name="angkatan"
                                placeholder="Enter Generation" required="" min="2003" max="2999" />

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                required="" />

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email Address"
                                required="" />
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="date_of_birth">Date Of Birth <span
                                    class="text-danger">*</span></label>
                            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control"
                                placeholder="Date Of Birth" required="" />
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group ">
                            <label class="form-label" for="password">Password <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Enter Password" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="role">User Role</label>
                            <select class="form-control" style="width: 100%;" required="" id="role" name="role">
                                @foreach ($user_role as $role)
                                    <option value="{{ $role }}">
                                        {{ ucfirst(implode(' ', explode('_', $role))) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="active">Active</label>
                            <select class="form-control" style="width: 100%;" required="" id="active" name="active">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="UserForm">
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

@section('javascript')
    <!-- DATA TABLE JS-->
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/jquery.dataTables.min.js') }}">
    </script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/dataTables.bootstrap5.js') }}">
    </script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}">
    </script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}">
    </script>


    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>

    <script>
        const table_html = $('#tbl_main');
        $(document).ready(function() {
            // datatable ====================================================================================
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const new_table = table_html.DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                // responsive: true,
                scrollX: true,
                aAutoWidth: false,
                bAutoWidth: false,
                type: 'GET',
                ajax: {
                    url: "{{ route('admin.user') }}",
                    data: function(d) {
                        d['filter[active]'] = $('#filter_active').val();
                        d['filter[role]'] = $('#filter_role').val();
                    }
                },
                columns: [{
                        data: null,
                        name: 'id',
                        orderable: false,
                    },
                    {
                        data: 'angkatan',
                        name: 'angkatan'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role_str',
                        name: 'role_str'
                    },
                    {
                        data: 'date_of_birth',
                        name: 'date_of_birth'
                    },
                    {
                        data: 'birthday_countdown',
                        name: 'birthday_countdown',
                        render(data, type, full, meta) {
                            return data == 0 ? 'Hari ini' : `${data} Hari Lagi`;
                        },
                    },
                    {
                        data: 'active_str',
                        name: 'active',
                        render(data, type, full, meta) {
                            const class_el = full.active == 1 ? 'badge bg-success' :
                                'badge bg-danger';
                            return `<span class="${class_el} p-2">${full.active_str}</span>`;
                        },
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            return ` <a class="btn btn-rounded btn-info btn-sm my-1" title="Edit Profile"
                                href="{{ route('member.profile') }}?id=${data}" >
                                <i class="fa fa-user" aria-hidden="true"></i> Profile
                                </a>
                                <button type="button" class="btn btn-rounded btn-primary btn-sm" title="Edit Data"
                                data-id="${full.id}"
                                data-name="${full.name}"
                                data-email="${full.email}"
                                data-role="${full.role}"
                                data-active="${full.active}"
                                data-date_of_birth="${full.date_of_birth}"
                                data-angkatan="${full.angkatan}"
                                onClick="editFunc(this)">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                                <button type="button" class="btn btn-rounded btn-danger btn-sm" title="Delete Data" onClick="deleteFunc('${data}')">
                                <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                </button>
                                `;
                        },
                        orderable: false
                    },
                ],
                order: [
                    [6, 'asc']
                ]
            });

            new_table.on('draw.dt', function() {
                var PageInfo = table_html.DataTable().page.info();
                new_table.column(0, {
                    page: 'current'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                });
            });

            $('#FilterForm').submit(function(e) {
                e.preventDefault();
                var oTable = table_html.dataTable();
                oTable.fnDraw(false);
            });

            // insertForm ===================================================================================
            $('#UserForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                setBtnLoading('#btn-save', 'Save Changes');
                resetErrorAfterInput();
                const route = ($('#id').val() == '') ? "{{ route('admin.user.store') }}" :
                    "{{ route('admin.user.update') }}";
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
                        $("#modal-default").modal('hide');
                        var oTable = table_html.dataTable();
                        oTable.fnDraw(false);
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
                        setBtnLoading('#btn-save',
                            '<li class="fa fa-save mr-1"></li> Save changes',
                            false);
                    }
                });
            });
        });

        function add() {
            $('#UserForm').trigger("reset");
            $('#modal-default-title').html("Add User");
            $('#modal-default').modal('show');
            $('#id').val('');
            resetErrorAfterInput();
            $('#password').attr('required', true);
        }


        function editFunc(datas) {
            const data = datas.dataset;
            $('#modal-default-title').html("Edit User");
            $('#modal-default').modal('show');
            $('#UserForm').trigger("reset");
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#date_of_birth').val(data.date_of_birth);
            $('#angkatan').val(data.angkatan);
            $('#role').val(data.role);
            $('#active').val(data.active);
            $('#password').removeAttr('required');
        }

        function deleteFunc(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to proceed ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url('admin/user') }}/${id}`,
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
                                position: 'top-end',
                                icon: 'success',
                                title: 'Data deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            var oTable = table_html.dataTable();
                            oTable.fnDraw(false);
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

        function exportExcel() {
            const base = "{{ route('admin.user.excel') }}";
            const active = $('#filter_active').val();
            const role = $('#filter_role').val();
            const search = $('[type=search]').val();
            let arg = `?active=${active}&role=${role}&search=${search}`;
            window.location.href = base + arg;
        }
    </script>
@endsection
