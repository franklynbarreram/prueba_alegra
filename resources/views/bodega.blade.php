@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Ingredientes Disponibles</h3>
                            </div><!--
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>-->
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            @if(count($ingredientes) == 0)
                                <th scope="col"><strong>No hay ingredientes disponibles</strong></th>
                            @else
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col" class="text-center">Nombre</th>
                                    <th scope="col" class="text-center">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ingredientes as $i)
                                    <tr>
                                        <th scope="row" class="text-center">
                                            {{$i->id}}
                                        </th>
                                        <td class="text-center">
                                            {{$i->nombre}}
                                        </td>
                                        <td class="text-center">
                                            {{$i->cantidad}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Compras</h3>
                            </div><!--
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>-->
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        @if(count($compras) == 0)
                            <th scope="col"><strong>No hay compras disponibles</strong></th>
                        @else
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Ingrediente</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($compras as $compra)
                                <tr>
                                    <th scope="row">
                                        {{$compra->id}}
                                    </th>
                                    <td>
                                        {{$compra->ingrediente->nombre}}
                                    </td>
                                    <td>
                                    {{$compra->cantidad}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                            </tbody>
                        </table>
                            {{ $compras->links() }}
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