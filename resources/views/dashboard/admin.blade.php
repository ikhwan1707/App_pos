@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <i class="fa fa-cubes"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Product</span>
                <span class="info-box-number">
                    {{$countproduct}}
                </span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1">
                <i class="fas fa-user"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number">{{$countuser}}</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-dark elevation-1">
                <i class="fa fa-users"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Customer</span>
                <span class="info-box-number">{{$countcustomer}}</span>
            </div>
        </div>
    </div>

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1">
                <i class="fas fa-shopping-cart"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Transaction</span>
                <span class="info-box-number">Rp. {{number_format($conttotal)}}</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Year Recap Report</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="myChartyear"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!--chartjs-->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctxMonthly = document.getElementById('myChart');
    
    new Chart(ctxMonthly, {
        type: 'line',
        data: {
          labels:{!! json_encode($months) !!},
          datasets: [{
            label: 'Total Transaksi',
            data: {!! json_encode($totals) !!},
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            fill: true,
            borderWidth: 2
          }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true, // Mulai dari 0 pada sumbu Y
                    suggestedMax: Math.max(...{!! json_encode($totals) !!}) + 1000, // Set batas atas grafik
                }
            },
            plugins: {
                tooltip: {
                    enabled: true, // Menampilkan tooltip saat hover
                }
            },
            responsive: true, // Agar grafik responsif
            //maintainAspectRatio: false, // Agar tinggi grafik bisa disesuaikan
        }
    });

    const ctxYearly = document.getElementById('myChartyear').getContext('2d');
    
    new Chart(ctxYearly, {
        type: 'line',
        data: {
            labels:{!! json_encode($years) !!},
            datasets: [{
            label: 'Total Transaksi',
            data: {!! json_encode($totalyear) !!},
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            fill: true,
            borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true, // Mulai dari 0 pada sumbu Y
                    suggestedMax: Math.max(...{!! json_encode($totalyear) !!}) + 1000, // Set batas atas grafik
                }
            },
            plugins: {
                tooltip: {
                    enabled: true, // Menampilkan tooltip saat hover
                }
            },
            responsive: true, // Agar grafik responsif
            //maintainAspectRatio: false, // Agar tinggi grafik bisa disesuaikan
        }
    });
</script>
@endsection