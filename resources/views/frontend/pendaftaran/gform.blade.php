@extends('templates.frontend.master')
@section('content')
    <div id="element"></div>
    @if ($model->status == 1)
        <iframe id="myframe" src="{{ $link }}">
            Memuat…
        </iframe>
    @else
        <div class="d-flex justify-content-center align-items-center">
            <h6>Form Sudah Ditutup</h6>
        </div>
    @endif
@endsection

@section('stylesheet')
    <style>
        #myframe {
            height: 100vh;
            width: 100%;
        }
    </style>
@endsection

@section('javascript')
    @if ($model->status == 1)
        <script>
            $('#element').parent().parent().removeClass('mb-5');
            $('#element').parent().parent().removeClass('py-5');
        </script>
    @endif
@endsection
