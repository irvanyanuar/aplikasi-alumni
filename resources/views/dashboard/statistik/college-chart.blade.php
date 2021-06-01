@extends('template.master')

@section('header')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

@endsection

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Statistik Perguruan Tinggi</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Statistik Perguruan Tinggi</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="col-12">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h5><i class="nav-icon fas fa-user-graduate fa-xs"></i> Statistik Jumlah Alumni di Perguruan Tinggi</h5>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <canvas id="pieChart" style="min-height: 250px; height: 400px; max-height: 700px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
        

    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>

<script>
    $(function() {
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.

        var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            // var a = 0.1;
            return "rgb(" + r + "," + g + "," + b + ")";
         };

        <?php
            $coloR = array();
            function dynamicColor()
            {
                $r = rand(0, 255);
                $g = rand(0, 255);
                $b = rand(0, 255);
                return "rgb($r, $g, $b)";
            }

            foreach($query as $data) {
               array_push($coloR, dynamicColor());
            }
        ?>
        
        var dataJumlah = [
            <?php foreach ($query as $data) { ?>
                {{$data->jumlah}},
            <?php } ?>
        ];

        var donutData = {
            labels: [
                <?php foreach ($query as $data) { ?>
                    "{{$data->name}}",
                <?php } ?>
            ],
            datasets: [{
                data: dataJumlah,
                backgroundColor: [
                    <?php for ($i=0; $i < count($coloR); $i++) { ?>
                        "{{$coloR[$i]}}",
                    <?php } ?>
                ]
                // ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }

        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = donutData;
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'doughnut',
            data: pieData,
            options: pieOptions
        })

    });
</script>

@endsection