<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function QRvalidation(Request $request)
    {
        // var_dump($request->test);
    }
}