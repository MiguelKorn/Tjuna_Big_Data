<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use JavaScript;

class TeamController extends Controller
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
        $username = Auth::getUser()->username;

        $teamhours = DB::table("services")
            ->select("users_username", "worked", "required")
            ->where("date", "2017-01-01 00:00:00")
            ->get();

        $teamhoursJAN = DB::table("services")
            ->join('users', 'services.users_username', '=', 'users.username')
            ->select('services.*', 'users.firstname', 'users.lastname')
            ->where("date", "2017-01-01 00:00:00")
            ->get();
        $teamhoursFEB = DB::table("services")
            ->join('users', 'services.users_username', '=', 'users.username')
            ->select('services.*', 'users.firstname', 'users.lastname')
            ->where("date", "2017-01-02 00:00:00")
            ->get();

        $storyPoints = DB::table("issues")
            ->select("users_username", "custom_field")
            ->where("closed_at", "2017-01-28")
            ->get();

        $teamHourNames = [];
        $teamHourValues = [];
        $totalWorkHours = 0;
        $totalReqHours = 0;
        $teamStoryPoints = 0;
        $totalStoryPoints = 0;
        $userReq = 0;
        $userWork = 0;

        for ($i = 0; $i < count($teamhours); $i++) {
            array_push($teamHourNames, $teamhours[$i]->users_username);
            array_push($teamHourValues, $teamhours[$i]->worked);
            $totalWorkHours += $teamhours[$i]->worked;
            $totalReqHours += $teamhours[$i]->required;

            if($teamhours[$i]->users_username == $username) {
                $userReq = $teamhours[$i]->required;
                $userWork = $teamhours[$i]->worked;
            }
        }

        foreach ($storyPoints as $point) {
            if ($point->users_username == $username) {
                $totalStoryPoints += $point->custom_field;
            }
            $teamStoryPoints += $point->custom_field;
        }

        $dbData = [
            'thJAN' => $teamhoursJAN,
            'thFEB' => $teamhoursFEB,
        ];

        JavaScript::put([
            'teamHourNames' => $teamHourNames,
            'teamHourValues' => $teamHourValues,
            'totalWorkHours' => $totalWorkHours,
            'totalReqHours' => $totalReqHours,
            'spTeam' => $teamStoryPoints,
            'spTotal' => $totalStoryPoints,
            'userReq' => $userReq,
            'userWork' => $userWork
        ]);
        return view('team', compact('dbData'));
    }
}
