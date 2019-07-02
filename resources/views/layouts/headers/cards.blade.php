<?php

$ordenes  = App\Orden::all()->count();
$ordenes_completadas = App\Orden::where('id_estado',1)->count();
$ordenes_en_espera = App\Orden::where('id_estado',2)->count();
$compras = App\Compra::all()->count();
//return $ordenes;

?>

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Platos pedidos</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$ordenes}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                </div>
                            </div><!--
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Platos completados</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$ordenes_completadas}}</span>
                                </div>
                                <div class="col-4">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                            </div><!--
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                <span class="text-nowrap">Since last week</span>
                            </p>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Platos en espera</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$ordenes_en_espera}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="far fa-clock"></i>
                                    </div>
                                </div>
                            </div><!--
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                <span class="text-nowrap">Since yesterday</span>
                            </p>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Compras en el mercado</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$compras}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-store-alt"></i>
                                    </div>
                                </div>
                            </div><!--
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>