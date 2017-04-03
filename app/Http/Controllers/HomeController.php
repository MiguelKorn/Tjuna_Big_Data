<?php

namespace App\Http\Controllers;



use DB;
use JavaScript;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamhours = DB::table("services")
            ->select("users_username", "worked", "required")
            ->where("date", "2017-01-01 00:00:00")
//            ->where("worked", "<>", 0 )
            ->get();

        $teamHourNames = [];
        $teamHourValues = [];
        $totalWorkHours = 0;
        $totalReqHours = 0;

        for($i = 0; $i < count($teamhours); $i++) {
            array_push($teamHourNames, $teamhours[$i]->users_username);
            array_push($teamHourValues, $teamhours[$i]->worked);
            $totalWorkHours += $teamhours[$i]->worked;
            $totalReqHours += $teamhours[$i]->required;
        }

        JavaScript::put([
            'teamHourNames' => $teamHourNames,
            'teamHourValues' => $teamHourValues,
            'totalWorkHours' => $totalWorkHours,
            'totalReqHours' => $totalReqHours
        ]);
        return view('home');
    }
}
