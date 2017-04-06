<?php

namespace App\Http\Controllers;



use Auth;
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
        $username = Auth::getUser()->username;

        $teamhours = DB::table("services")
            ->select("users_username", "worked", "required")
            ->where("date", "2017-01-01 00:00:00")
            ->get();

        $storyPoints = DB::table("issues")
            ->select("users_username", "custom_field")
            ->where("closed_at", "2017-01-28")
            ->get();

        $teamStoryPoints = 0;
        $totalStoryPoints = 0;
        $userReq = 0;
        $userWork = 0;

        for ($i = 0; $i < count($teamhours); $i++) {
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

        JavaScript::put([
            'spTeam' => $teamStoryPoints,
            'spTotal' => $totalStoryPoints,
            'userReq' => $userReq,
            'userWork' => $userWork
        ]);
        return view('home');
    }
}
