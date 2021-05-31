@extends('template.master')

@section('header')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

@endsection

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Statistik Alumni</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Statistik Alumni</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="col-12">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h4><i class="nav-icon fas fa-user-graduate fa-xs"></i> Statistik Alumni Lulus Per Tahun</h4>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <div class="chart">
                <canvas id="barChart" style="min-height: 250px; height: 350px; max-height: 700px; max-width: 100%;"></canvas>
            </div>
        </div>
        <!-- /.card-body -->


    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>

<script>
    $(function() {
        var areaChartData = {
            labels: [
                <?php foreach($query as $data) {?>
                    {{$data->graduation_year}},
                <?php }?>
            ],
            datasets: [{
                    label: 'Jumlah Alumni Per Tahun',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [
                        <?php foreach($query as $data) {?>
                            {{$data->jumlah}},
                        <?php }?>
                    ]
                },
            ]
        }

        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        
        barChartData.datasets[0] = areaChartData.datasets[0]

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: true,
            datasetFill: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
            }
        }]
    }
        }

        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    });
</script>

@endsection