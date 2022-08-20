@extends('templates.admin.master')
@section('content')
    @php
    $can_insert = auth_can(h_prefix('insert'));
    $can_update = auth_can(h_prefix('update'));
    $can_delete = auth_can(h_prefix('delete'));
    $can_save = auth_can(h_prefix('save'));
    @endphp
    <div class="row">
        <div class="col-lg-6">
            <div class="card" id="card-menu">
                <div id="nestable-menu" class="card-header">
                    <div class="btn-group">
                        <button class="btn me-1 btn-info btn-sm tree-tools" data-action="expand" title="Expand"
                            style="border: 0; border-radius: 4px">
                            <i class="fe fe-list"></i>&nbsp;Expand
                        </button>
                        <button class="btn me-1 btn-info btn-sm tree-tools" data-action="collapse" title="Collapse"
                            style="border: 0; border-radius: 4px">
                            <i class="fe fe-align-justify"></i>&nbsp;Collapse
                        </button>
                    </div>
                    @if ($can_save)
                        <div class="btn-group">
                            <button class="btn me-1 btn-primary btn-sm save" data-action="save" title="Save"
                                onclick="save()" style="border: 0; border-radius: 4px">
                                <i class="fas fa-save"></i><span class="hidden-xs">&nbsp;Save</span>
                            </button>
                        </div>
                    @endif

                    <div class="btn-group">
                        <button class="btn me-1 btn-warning btn-sm refresh" data-action="refresh" title="Refresh"
                            style="border: 0; border-radius: 4px" onclick="menu()">
                            <i class="fe fe-refresh-cw"></i><span class="hidden-xs">&nbsp;Refresh</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dd" style="width: 100%" id="menu"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6" id="form-container">
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-md-flex flex-row justify-content-between">
                            <h3 class="card-title" id="menu-title">Add Menu</h3>
                            <button class="btn btn-rounded btn-danger btn-sm" id="menu-btn-cancel" onclick="isEdit(false)"
                                style="display: none">
                                <i class="fe fe-arrow-left"></i> Cancel
                            </button>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" id="menu-form">

                                <input type="hidden" id="id" name="id">

                                <div class="row mb-4">
                                    <label for="parent" class="col-md-3 form-label">Parent</label>
                                    <div class="col-md-9">
                                        <select name="parent_id" id="parent_id" class="form-control" style="width: 100%">
                                            <option value="0" selected>ROOT</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="active" class="col-md-3 form-label">Active</label>
                                    <div class="col-md-9">
                                        <select name="active" id="active" class="form-control" style="width: 100%">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Nonactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="type" class="col-md-3 form-label">Type</label>
                                    <div class="col-md-9">
                                        <select name="type" id="type" class="form-control" style="width: 100%">
                                            <option value="1" selected>Menu</option>
                                            <option value="0">Separator</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="icon" class="col-md-3 form-label">Icon</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="icon" name="icon"
                                            placeholder="Icon">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="title" class="col-md-3 form-label">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="route" class="col-md-3 form-label">Link</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="route" name="route"
                                            placeholder="Link" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary" id="btn-save" form="menu-form">
                                <li class="fas fa-save mr-1"></li> Save changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    {{-- nestable --}}
    <script src="{{ asset('assets/templates/admin/plugins/nestable2v1.6.0/jquery.nestable.min.js') }}"></script>
    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    {{-- loading --}}
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>
    {{-- select2 --}}
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    {{-- icon --}}
    <script>
        const can_insert = {{ $can_insert ? 'true' : 'false' }};
        const can_update = {{ $can_update ? 'true' : 'false' }};
        const can_delete = {{ $can_delete ? 'true' : 'false' }};
        let isUpdate = false;
        let sequence_max = 0;
        $(document).ready(function() {
            $('#type').select2({
                dropdownParent: $('#menu-form'),
            });

            $('#active').select2({
                dropdownParent: $('#menu-form'),
            });

            $('#parent_id').select2({
                ajax: {
                    url: `{{ route(h_prefix('parent_list')) }}`,
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
                dropdownParent: $('#menu-form'),
            });

            $('.tree-tools').on('click', function(e) {
                var action = $(this).data('action');
                if (action === 'expand') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse') {
                    $('.dd').nestable('collapseAll');
                }
            });

            $('#menu-form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('sequence', sequence_max++);
                setBtnLoading('#btn-save', 'Save Changes');
                resetErrorAfterInput();
                const route = isUpdate ? `{{ route(h_prefix('update')) }}` :
                    `{{ route(h_prefix('insert')) }}`;
                $.ajax({
                    type: 'POST',
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
                        menu();
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
        })

        function menu() {
            $('#card-menu').LoadingOverlay("show");
            $.ajax({
                url: `{{ route(h_prefix('list')) }}`,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if ($('#menu').html() != '') $('.dd').nestable('destroy');
                    $('.dd').nestable({
                        maxDepth: 2,
                        json: response.data,
                        contentCallback: (item) => {
                            sequence_max = Number(item.sequence) > Number(sequence_max) ?
                                Number(item.sequence) : Number(sequence_max);

                            const btn_update = can_update ?
                                `<button onclick="edit(${item.id})" class="btn btn-primary btn-sm"><span class="fas fa-edit"></span></button>` :
                                '';
                            const btn_delete = can_delete ?
                                `<button onclick="deleteFun(${item.id})" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></button>` :
                                '';
                            const btn = (can_update || can_delete) ? `<span class="float-end dd-nodrag">
                                ${btn_update}
                                ${btn_delete}
                            </span>` : '';
                            return `<i class="${item.icon}"></i>&nbsp;<strong>${item.title}${item.type == 0 ? ' | <span class="text-danger">separator</span>' : ''}</strong> ${btn}`;
                        }
                    });
                    isEdit(false)
                },
                complete: function() {
                    $('#card-menu').LoadingOverlay("hide");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        }
        menu();

        function save() {
            $.LoadingOverlay("hide");
            var serialize = $('#menu').nestable('toArray');
            $.ajax({
                url: `{{ route(h_prefix('save')) }}`,
                type: 'PUT',
                data: {
                    data: serialize
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data saved successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                complete: function() {
                    $.LoadingOverlay("hide");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        }

        function edit(id) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: `{{ route(h_prefix('find')) }}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id
                },
                success: (d) => {
                    isEdit(true);
                    const menu = d.data;
                    $('#id').val(menu.id);
                    $('#parent_id')
                        .append((new Option((menu.parent ?? "ROOT"), (menu.parent_id ?? 0), true, true)))
                        .trigger('change');
                    $('#active').val(menu.active).trigger('change');
                    $('#icon').val(menu.icon);
                    $('#title').val(menu.title);
                    $('#route').val(menu.route);
                    $('#type').val(menu.type).trigger('change');
                },
                error: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Something went wrong',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                complete: function() {
                    $.LoadingOverlay("hide");
                }
            });
        }

        function isEdit(edit) {
            const title = $('#menu-title');
            const btn_cancel = $('#menu-btn-cancel');
            const setContainer = view => {
                const container = $('#form-container');
                if (view) container.show();
                else container.fadeOut();
            }
            if (edit) {
                isUpdate = true;

                // edit attribute
                title.html('Edit Menu');
                btn_cancel.fadeIn();
                setContainer(can_update);
            } else {
                isUpdate = false;
                $('#id').val(menu.id);
                $('#parent_id')
                    .append((new Option("ROOT", 0, true, true)))
                    .trigger('change');
                $('#active').val(1).trigger('change');
                $('#type').val(1).trigger('change');
                $('#icon').val('');
                $('#title').val('');
                $('#route').val('');

                // edit attribute
                title.html('Add Menu');
                btn_cancel.fadeOut();
                setContainer(can_insert);
            }
        }

        function deleteFun(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to proceed ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url(h_prefix_uri()) }}/${id}`,
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
                                title: 'Data saved successfully.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            menu();
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
    </script>
@endsection

@section('stylesheet')
    <style>
        .dd {
            position: relative;
            display: block;
            margin: 0;
            padding: 0;
            max-width: 600px;
            list-style: none;
            font-size: 13px;
            line-height: 20px
        }

        .dd-list {
            display: block;
            position: relative;
            margin: 0;
            padding: 0;
            list-style: none
        }

        .dd-list .dd-list {
            padding-left: 30px
        }

        .dd-empty,
        .dd-item,
        .dd-placeholder {
            display: block;
            position: relative;
            margin: 0;
            padding: 0;
            min-height: 20px;
            font-size: 13px;
            line-height: 20px
        }

        .dd-handle {
            display: block;
            height: 35px;
            margin: 5px 0;
            padding: 5px 10px;
            color: #333;
            text-decoration: none;
            font-weight: 700;
            border: 1px solid #ccc;
            background: #fff;
            border-radius: 3px;
            box-sizing: border-box
        }

        .dd-handle:hover {
            color: #2ea8e5;
            background: #fff
        }

        .dd-item>button {
            position: relative;
            cursor: pointer;
            float: left;
            width: 25px;
            height: 20px;
            margin: 5px 0;
            padding: 0;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            border: 0;
            background: 0 0;
            font-size: 12px;
            line-height: 1;
            text-align: center;
            font-weight: 700
        }

        .dd-item>button:before {
            display: block;
            position: absolute;
            width: 100%;
            text-align: center;
            text-indent: 0
        }

        .dd-item>button.dd-expand:before {
            content: '+'
        }

        .dd-item>button.dd-collapse:before {
            content: '-'
        }

        .dd-expand {
            display: none
        }

        .dd-collapsed .dd-collapse,
        .dd-collapsed .dd-list {
            display: none
        }

        .dd-collapsed .dd-expand {
            display: block
        }

        .dd-empty,
        .dd-placeholder {
            margin: 5px 0;
            padding: 0;
            min-height: 30px;
            background: #f2fbff;
            border: 1px dashed #b6bcbf;
            box-sizing: border-box;
            -moz-box-sizing: border-box
        }

        .dd-empty {
            border: 1px dashed #bbb;
            min-height: 100px;
            background-color: #e5e5e5;
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px
        }

        .dd-dragel {
            position: absolute;
            pointer-events: none;
            z-index: 9999
        }

        .dd-dragel>.dd-item .dd-handle {
            margin-top: 0
        }

        .dd-dragel .dd-handle {
            box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1)
        }

        .dd-nochildren .dd-placeholder {
            display: none
        }
    </style>
@endsection
