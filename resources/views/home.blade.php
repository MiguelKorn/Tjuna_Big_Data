@extends('layouts.app')

@section('content')
    @include('components.nav')
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h1 class="center-text">Home</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 img-bar">
                    <img src="{{asset('img/user.png')}}" alt="user-img">
                </div>
                <div class="col-lg-3 username-bar">
                    <h3>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h3>
                </div>
            </div>
            <div class="row min-height">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="border">
                            <h3 class="center-text">Story points team vs personal story points</h3>
                            <div class="chart-legend">
                                <canvas id="canvas-storyPoints"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="border">
                            <h3 class="center-text">Hours required vs hours worked</h3>
                            <div class="chart-legend">
                                <canvas id="canvas-personalReqVsWorked"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
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
