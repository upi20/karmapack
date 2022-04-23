@extends('templates.admin.master')

@section('content')
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Address Village Table</h3>
                    <button type="button" class="btn btn-rounded btn-success" data-bs-effect="effect-scale"
                        data-bs-toggle="modal" href="#modal-default" onclick="add()" data-target="#modal-default">
                        <i class="bi bi-plus-lg"></i> Add
                    </button>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="javascript:void(0)" class="form-inline ml-md-3 mb-md-3" id="FilterForm">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="h5">Filter Data</h5>
                                </div>
                                <div class="col-md-3 my-md-1">
                                    <div class="form-group">
                                        <label for="filter_province" class="me-md-2">Province</label>
                                        <select class="form-control" id="filter_province" name="filter_province"
                                            style="width: 100%">
                                            <option value="">All Province</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">
                                                    {{ $province->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 my-md-1">
                                    <div class="form-group">
                                        <label for="filter_regencie" class="me-md-2">Regencie</label>
                                        <select class="form-control" id="filter_regencie" name="filter_regencie"
                                            style="width: 100%">
                                            <option value="">All Regencie</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 my-md-1">
                                    <div class="form-group">
                                        <label for="filter_district" class="me-md-2">District</label>
                                        <select class="form-control" id="filter_district" name="filter_district"
                                            style="width: 100%">
                                            <option value="">All District</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-end my-md-1">
                                    <div>
                                        <button type="submit" class="btn btn-rounded btn-md btn-info"
                                            title="Refresh Filter Table">
                                            <i class="bi bi-arrow-repeat"></i> Refresh
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive table-striped">
                        <table class="table table-bordered text-nowrap border-bottom" id="tbl_main">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>District</th>
                                    <th>Regencie</th>
                                    <th>Province</th>
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
                    <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label" for="id">ID <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="id" name="id" placeholder="Enter ID"
                                required="" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                required="" />
                        </div>
                        <div class="form-group">
                            <label for="province_id">Province</label>
                            <select class="form-control" id="province_id" name="province_id" style="width: 100%">
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="regency_id">Regency</label>
                            <select class="form-control" id="regency_id" name="regency_id" style="width: 100%">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district_id">District</label>
                            <select class="form-control" id="district_id" name="district_id" style="width: 100%">
                            </select>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="MainForm">
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
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/select2/css/select2.min.css') }}">
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
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        const table_html = $('#tbl_main');
        let isUpdate = false;
        $(document).ready(function() {
            // select2 ======================================================================================
            $('#filter_province').select2();
            $('#province_id').select2({
                dropdownParent: $('#modal-default')
            });

            $('#province_id').on('select2:select', function(e) {
                clearRegency();
                clearDistrict();
            });

            $('#regency_id').on('select2:select', function(e) {
                clearDistrict();
            });

            // filter
            $('#filter_regencie').select2({
                ajax: {
                    url: "{{ route('admin.address.regencie.select2') }}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                            province_id: $('#filter_province').val(),
                            with_empty: true
                        }
                        return query;
                    }
                }
            });

            $('#filter_district').select2({
                ajax: {
                    url: "{{ route('admin.address.district.select2') }}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                            regency_id: $('#filter_regencie').val(),
                            with_empty: true
                        }
                        return query;
                    }
                }
            });

            // modal form
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
                },
                dropdownParent: $('#modal-default')
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
                },
                dropdownParent: $('#modal-default')
            });



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
                    url: "{{ route('admin.address.village') }}",
                    data: function(d) {
                        d['filter[province]'] = $('#filter_province').val();
                        d['filter[regencie]'] = $('#filter_regencie').val();
                        d['filter[district]'] = $('#filter_district').val();
                    }
                },
                columns: [{
                        data: null,
                        name: 'id',
                        orderable: false,
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'district',
                        name: 'district'
                    },
                    {
                        data: 'regencie',
                        name: 'regencie'
                    },
                    {
                        data: 'province',
                        name: 'province'
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            return ` <button type="button" class="btn btn-rounded btn-primary btn-sm" title="Edit Data"
                                data-id="${full.id}"
                                data-name="${full.name}"
                                data-province_id="${full.province_id}"
                                data-regency_id="${full.regency_id}"
                                data-regencie="${full.regencie}"
                                data-district_id="${full.district_id}"
                                data-district="${full.district}"
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
                    [1, 'asc']
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
            $('#MainForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                setBtnLoading('#btn-save', 'Save Changes');
                resetErrorAfterInput();
                const route = isUpdate ? "{{ route('admin.address.village.update') }}" :
                    "{{ route('admin.address.village.store') }}";
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
            isUpdate = false;
            $('#MainForm').trigger("reset");
            $('#modal-default-title').html("Add Address Village");
            $('#modal-default').modal('show');
            $('#id').val('');
            $('#id').removeAttr('readonly');
            resetErrorAfterInput();
            $('#password').attr('required', true);
            clearRegency();
            clearDistrict();
        }


        function editFunc(datas) {
            isUpdate = true;
            const data = datas.dataset;
            $('#modal-default-title').html("Edit Address Village");
            $('#modal-default').modal('show');
            $('#MainForm').trigger("reset");
            $('#id').val(data.id);
            $('#id').attr('readonly', true);
            $('#name').val(data.name);
            $('#province_id').val(data.province_id).trigger('change');
            $('#regency_id')
                .append((new Option(data.regencie, data.regency_id, true, true)))
                .trigger('change');
            $('#district_id')
                .append((new Option(data.district, data.district_id, true, true)))
                .trigger('change');
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
                        url: `{{ url('admin/address/village') }}/${id}`,
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
                                title: 'Address Village deleted successfully',
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

        function setErrorAfterInput(error, element) {
            // get element after input
            let after = $(element).next();
            if (after.length == 0) $(element).after('<div></div>');
            if (after.length == 0) after = $(element).next();

            // highlight
            $(element).addClass("is-invalid").removeClass("is-valid");
            let errors = Array.isArray(error) ? '' : `<li class="text-danger">${error}</li>`;
            if (Array.isArray(error)) {
                error.forEach(err => {
                    errors += `<li class="text-danger">${err}</li>`;
                });
            }

            after.html(`<div><ul style="padding-left: 20px;">${errors}</ul></div>`);
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
    </script>
@endsection
