<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function test()
    {
        $user = DB::select('');
    }
}
