@extends('layouts.app')

@section('content')
    @include('components.nav')
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border" id="team-hours">
                    <h2 class="center-text">Team Hours</h2>
                    <div class="col-lg-3 col-lg-offset-3 col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-1 col-xs-5 col-xs-offset-2">
                        <div class="chart-pie">
                            <canvas id="canvas-team-hours"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div id="pie-legend"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 border">
                    <h3 class="center-text">Hours required vs hours worked</h3>
                    <div class="chart-legend">
                        <canvas id="canvas-reqVsWorked"></canvas>
                    </div>
                </div>

                <div class="col-lg-3 col-gutter-3 col-md-3 col-sm-3 col-xs-6 border">
                    <div class="center">
                        <a href="" class="home-icon">
                            <i class="fa fa-area-chart" aria-hidden="true"></i>
                            <h5>Dashboard</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-gutter-3 col-md-3 col-sm-3 col-xs-6 border">
                    <div class="center">
                        <a href="" class="home-icon">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <h5>Home</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-gutter-6 col-md-6 col-sm-6 col-xs-12 border">
                    <a href="" class="large-text">January 2017</a>
                </div>
                <div class="col-lg-6 col-gutter-6 col-md-6 col-sm-6 col-xs-12 border">
                    <a href="" class="large-text">February 2017</a>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('script')
    <script>
        var pieData = {
            labels: ctrlVars.teamHourNames,
            datasets: [{
                data: ctrlVars.teamHourValues,
                backgroundColor: [
                    "#34ffd6",
                    "#30dae8",
                    "#41beff",
                    "#3079e8",
                    "#344fff",
                    "#6d41b2",
                    "#bb90ff",
                    "#ff43c6",
                    "#a70e42"
                ]
            }]
        };
        pieChartExternalLegend("canvas-team-hours", "pie-legend", pieData);

        var barData = {
            labels: ["1"],
            datasets: [
                {
                    label: "Total required hours",
                    backgroundColor: [
                        'rgba(109, 65, 178, 0.2)'
                    ],
                    borderColor: [
                        'rgba(109, 65, 178,1)'
                    ],
                    borderWidth: 1,
                    data: [ctrlVars.totalReqHours]
                },
                {
                    label: "Total hours worked",
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1,
                    data: [ctrlVars.totalWorkHours]
                }
            ]
        };

        barChart("canvas-reqVsWorked", barData);
    </script>
@endsection
