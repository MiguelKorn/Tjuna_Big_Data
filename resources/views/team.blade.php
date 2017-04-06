@extends('layouts.app')

@section('content')
    @include('components.nav')
    <div class="main">
        <div class="container">
            <div class="row min-height">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 border">
                    <h2 class="center-text">Team Hours</h2>
                    <div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-1 col-xs-5 col-xs-offset-2">
                        <div class="chart-pie-small">
                            <canvas id="canvas-team-hours"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div id="pie-legend"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-gutter-6 border">
                    <h3 class="center-text">Hours required vs hours worked</h3>
                    <div class="chart-legend">
                        <canvas id="canvas-reqVsWorked"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 border">
                    <h2 class="center-text">Personal stats</h2>
                    <div class="col-lg-6">
                        <h3 class="center-text">Story points team vs personal story points</h3>
                        <div class="chart-legend">
                            <canvas id="canvas-storyPoints"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="center-text">Hours required vs hours worked</h3>
                        <div class="chart-legend">
                            <canvas id="canvas-personalReqVsWorked"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 border">
                    <h2 class="center-text">January 2017</h2>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Worked</th>
                                <th>Billed</th>
                                <th>Planned</th>
                                <th>Required</th>
                                <th>Progress</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dbData['thJAN'] as $user)
                                <tr>
                                    <th>{{ $user->firstname }} {{ $user->lastname }}</th>
                                    <th>{{ $user->users_username }}</th>
                                    <th>{{ $user->worked }}</th>
                                    <th>{{ $user->billed }}</th>
                                    <th>{{ $user->planned }}</th>
                                    <th>{{ $user->required }}</th>
                                    <th>{{ $user->progress }}</th>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 border">
                    <h2 class="center-text">February 2017</h2>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Worked</th>
                                <th>Billed</th>
                                <th>Planned</th>
                                <th>Required</th>
                                <th>Progress</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dbData['thFEB'] as $user)
                                <tr>
                                    <th>{{ $user->firstname }} {{ $user->lastname }}</th>
                                    <th>{{ $user->users_username }}</th>
                                    <th>{{ $user->worked }}</th>
                                    <th>{{ $user->billed }}</th>
                                    <th>{{ $user->planned }}</th>
                                    <th>{{ $user->required }}</th>
                                    <th>{{ $user->progress }}</th>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
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

        var barStoryData = {
            labels: ["Story points team vs personal story points"],
            datasets: [
                {
                    label: "Personal story points",
                    backgroundColor: [
                        'rgba(109, 65, 178, 0.2)'
                    ],
                    borderColor: [
                        'rgba(109, 65, 178,1)'
                    ],
                    borderWidth: 1,
                    data: [ctrlVars.spTotal]
                },
                {
                    label: "Team story points",
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1,
                    data: [ctrlVars.spTeam]
                }
            ]
        };

        barChartNoMax("canvas-storyPoints", barStoryData);

        var barPersonalData = {
            labels: ["Hours required vs hours worked"],
            datasets: [
                {
                    label: "Hours required",
                    backgroundColor: [
                        'rgba(109, 65, 178, 0.2)'
                    ],
                    borderColor: [
                        'rgba(109, 65, 178,1)'
                    ],
                    borderWidth: 1,
                    data: [ctrlVars.userReq]
                },
                {
                    label: "Hours logged",
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1,
                    data: [ctrlVars.userWork]
                }
            ]
        };

        barChartNoMax("canvas-personalReqVsWorked", barPersonalData);
    </script>
@endsection