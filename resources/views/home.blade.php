@extends('layouts.app')

@section('content')
    @include('components.nav')
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 border" id="team-hours">
                    <h1 class="center-text">Team Hours</h1>
                    <div class="col-lg-3 col-lg-offset-3">
                        <div class="chart-pie">
                            <canvas id="canvas-team-hours"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div id="pie-legend"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 border">
                    <h3 class="center-text">Hours required vs hours worked</h3>
                    <div class="chart-legend">
                        <canvas id="canvas-reqVsWorked"></canvas>
                    </div>
                </div>

                <div class="col-lg-3 col-gutter-3 border">
                    <div class="center">
                        <a href="" class="home-icon">
                            <i class="fa fa-area-chart" aria-hidden="true"></i>
                            <h5>Dashboard</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-gutter-3 border">
                    <div class="center">
                        <a href="" class="home-icon">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <h5>Home</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-gutter-6 border">
                    <a href="" class="large-text">January 2017</a>
                </div>
                <div class="col-lg-6 col-gutter-6 border">
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
                    "#FFE135",
                    "#3B5323",
                    "#fc6c85",
                    "#ffec89",
                    "#021c3d",
                    "#3B5323",
                    "#046b00",
                    "#cef45a",
                    "#6b1913"
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
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1,
                    data: [ctrlVars.totalReqHours]
                },
                {
                    label: "Total hours logged",
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
