@extends('templates.admin.master')

@section('content')
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

                                <div class="row mb-4">
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
    @include('admin.menu.js', $compact)
@endsection

@section('stylesheet')
    @include('admin.menu.css')
@endsection
