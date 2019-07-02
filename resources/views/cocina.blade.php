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
                                <h3 class="mb-0">Platos pedidos</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('crear_orden') }}" class="btn btn-outline-danger btn-sm">Pedir plato +</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                @if(count($ordenes) == 0)
                                <th scope="col"><strong>No hay platos pedidos</strong></th>
                                @else
                                <tr>
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col" class="text-center">Receta</th>
                                    <th scope="col" class="text-center">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($ordenes as $orden)
                                        <tr>
                                            <th scope="row" class="text-center">
                                                {{$orden->id}}
                                            </th>
                                            <td class="text-center">
                                                {{$orden->receta->nombre}}
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-<?php if($orden->id_estado==1){echo "success";}else{echo "danger";}?>"> {{$orden->estado->nombre}}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $ordenes->links() }}
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Platos</h3>
                            </div><!--
                            <div class="col text-right">
                                <a href="" class="btn btn-sm btn-primary">See all</a>
                            </div>-->
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            @if(count($recetas)==0)
                                <th scope="col">No hay platos pedidos</th>
                            @else
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Ingredientes</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($recetas as $receta)
                                    <tr>
                                        <th scope="row">
                                            {{$receta['nombre']}}
                                        </th>
                                        <td>
                                            </ul>
                                            @foreach($receta['ingredientes'] as $ingrediente)
                                                <li>{{$ingrediente['cantidad']}} {{$ingrediente['nombre']}}</li> 
                                            @endforeach
                                            <ul>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
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