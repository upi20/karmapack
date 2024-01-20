@extends('layouts.admin.master')

@section('content')
    <div class="card border-danger border-top border-3 border-0">
        <div class="card-body">
            <div class="card-title d-md-flex flex-row justify-content-between">
                <div>
                    <h6 class="mt-2 text-uppercase">Form {{ $page_attr['title'] }}</h6>
                </div>
            </div>
            <hr class="my-1">

            <form id="MainForm">
                <div class="mb-3">
                    <label class="form-label" for="rules">Nama profil yang tidak boleh digunakan</label>
                    <select multiple data-role="tagsinput" id="rules" multiple name="rules[]">
                        @foreach ($rules as $rule)
                            <option value="{{ $rule->rule }}" selected>
                                {{ $rule->rule }}
                            </option>
                        @endforeach
                    </select>
                    <p>*Tekan enter untuk menambahkan</p>
                </div>
            </form>
            @if (auth_can(h_prefix('save')))
                <button type="submit" class="btn btn-primary mt-3" id="btn-save" form="MainForm">
                    <li class="fas fa-save mr-1"></li> Simpan Perubahan
                </button>
            @endif
        </div>
    </div>
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/input-tags/css/tagsinput.css') }}" />
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.all.min.js" integrity="sha512-1RuT3Xs+fbL5f+4MCot2I8PpBFRu4flycFf5s2x4PoBMTKbPgHBEEwQ1LovEIhrMaR3S8bJfnlBTbWJbKdj8Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/templates/admin/plugins/input-tags/js/tagsinput.js') }}"></script>

    @php
        $resource = resource_loader(blade_path: $view);
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
