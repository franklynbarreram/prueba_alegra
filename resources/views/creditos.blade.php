@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <style>.header .header-body{display:none}</style>
    <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0 text-center">
                <img src="{{ asset('franklyn.jpg') }}" alt="" class="foto-carnet">
            </div>
            
        </div>

        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0 text-center">
                <a href="/curriculum" class="btn btn-outline-danger">Curriculum <i class="fas fa-download"></i></a>
            </div>
            
        </div>

        <div class="row mt-5">
            <div class="col-8 offset-2">
            <div class="card shadow">
                    <div class="card-header border-0 text-center">
                        <span> Desarrollado por <strong>Franklyn Eduardo Barrera Medina</strong> para <strong>Alegra</strong> prueba para oportunidad de trabajo backend</span>
                        <br>
                        <br>
                        <strong><i>¡Esperando la mejor respuesta por parte de ustedes!</i></strong>
                    </div>
                   
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush