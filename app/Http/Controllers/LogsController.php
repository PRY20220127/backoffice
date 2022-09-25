<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class LogsController extends Controller
{
    public function list()
    {
        $logs = Http::get("http://localhost:9988/logs")["results"];

        return view('logs.list', ["logs" => $logs]);
    }
}
