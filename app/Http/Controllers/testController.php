<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function show()
    {
        $user = DB::table('users')->get();

        print '<pre>';
        print_r($user);
        print '</pre>';
    }
}
