@extends('layouts.admin.master')

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
                <div class="card-body">
                    <div id="nestable-menu">
                        <div class="btn-group">
                            <button class="btn me-1 btn-info btn-sm tree-tools" data-action="expand" title="Expand"
                                style="border: 0; border-radius: 4px">
                                <i class="fas fa-stream"></i>&nbsp;Expand
                            </button>
                            <button class="btn me-1 btn-info btn-sm tree-tools" data-action="collapse" title="Collapse"
                                style="border: 0; border-radius: 4px">
                                <i class="fas fa-th-list"></i>&nbsp;Collapse
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
                                <i class="fas fa-sync-alt"></i><span class="hidden-xs">&nbsp;Refresh</span>
                            </button>
                        </div>
                    </div>
                    <hr>

                    <div class="dd" style="width: 100%" id="nested-menu"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6" id="form-container">
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-md-flex flex-row justify-content-between">
                                <div>
                                    <h6 class="mt-2 text-uppercase"id="menu-title">Tambah Menu</h6>
                                </div>
                                @if ($can_insert)
                                    <div>
                                        <button class="btn btn-rounded btn-danger btn-sm" id="menu-btn-cancel"
                                            onclick="isEdit(false)" style="display: none">
                                            <i class="fas fa-times"></i> Cancel
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <hr class="mt-0" />

                            <form class="form-horizontal" id="menu-form">

                                <input type="hidden" id="id" name="id">

                                <div class="row mb-2">
                                    <label for="parent" class="col-md-3 form-label">Parent</label>
                                    <div class="col-md-9">
                                        <select name="parent_id" id="parent_id" class="form-control" style="width: 100%">
                                            <option value="0" selected>ROOT</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="active" class="col-md-3 form-label">Active</label>
                                    <div class="col-md-9">
                                        <select name="active" id="active" class="form-control" style="width: 100%">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Nonactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="type" class="col-md-3 form-label">Type</label>
                                    <div class="col-md-9">
                                        <select name="type" id="type" class="form-control" style="width: 100%">
                                            <option value="1" selected>Menu</option>
                                            <option value="0">Separator</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="icon" class="col-md-3 form-label">Icon</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="icon" name="icon"
                                            placeholder="Icon">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="title" class="col-md-3 form-label">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" required>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="route" class="col-md-3 form-label">Route</label>
                                    <div class="col-md-9">
                                        <select name="route" id="route" class="form-control" style="width: 100%">
                                            <option value="">#</option>
                                            @foreach ($routes as $route)
                                                @if ($route)
                                                    <option value="{{ $route }}">{{ $route }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="roles" class="col-md-3 form-label">Roles</label>
                                    <div class="col-md-9">
                                        <select name="roles[]" id="roles" class="form-control" style="width: 100%"
                                            multiple required>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary" id="btn-save" form="menu-form">
                                    <li class="fas fa-save mr-1"></li> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js" integrity="sha512-7bS2beHr26eBtIOb/82sgllyFc1qMsDcOOkGK3NLrZ34yTbZX8uJi5sE0NNDYFNflwx1TtnDKkEq+k2DCGfb5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.all.min.js" integrity="sha512-1RuT3Xs+fbL5f+4MCot2I8PpBFRu4flycFf5s2x4PoBMTKbPgHBEEwQ1LovEIhrMaR3S8bJfnlBTbWJbKdj8Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js" integrity="sha512-hktawXAt9BdIaDoaO9DlLp6LYhbHMi5A36LcXQeHgVKUH6kJMOQsAtIw2kmQ9RERDpnSTlafajo6USh9JUXckw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.min.js" integrity="sha512-PZUUFofP00wI366Au6XSNyN4Zg8M8Kma4JKIG7ywt8FEY1+Ur0H+FAlH6o0fKoCrdmM4+ZzMyW30msp8Z2zDaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2-custom.js') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'can_insert' => $can_insert ? 'true' : 'false',
                'can_update' => $can_update ? 'true' : 'false',
                'can_delete' => $can_delete ? 'true' : 'false',
                'page_title' => $page_attr['title'],
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection

@section('stylesheet')
    @php $resource = resource_loader(blade_path: 'pages.admin.menu', type: 'css'); @endphp
    <link rel="stylesheet" href="{{ $resource }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" integrity="sha512-aD9ophpFQ61nFZP6hXYu4Q/b/USW7rpLCQLX6Bi0WJHXNO7Js/fUENpBQf/+P4NtpzNX0jSgR5zVvPOJp+W2Kg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/select2/css/select2-bootstrap-5-theme.min.css') }}" />
@endsection
