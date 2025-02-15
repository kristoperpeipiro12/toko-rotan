@extends('admin.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Stock </div>
                            <div class="stat-digit"> <i></i>{{ $stok }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Terjual</div>
                            <div class="stat-digit"> <i class="fa fa-usd"></i>7800</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Terkirim</div>
                            <div class="stat-digit"> <i class=" "></i> 500</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Pemasukan</div>
                            <div class="stat-digit"> <i class="fa fa-money"></i>650</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Penjualan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-8">
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
